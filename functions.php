<?php
    $db = new SQLite3(__DIR__ . '/database.db');

    function validate($str) {
        return htmlspecialchars($str ?? '', ENT_QUOTES, 'UTF-8');
    }

    function redirect($page, $args = []) {
        $location = $page;
        if (!empty($args))
            $location .= '?' . http_build_query($args);

        header('Location: ' . $location);
        exit;
    }

    function throwError($code, $message) {
        redirect('/error.php', ['code' => $code, 'message' => $message]);
    }

    function requireAuthorization() {
        if (!isset($_SESSION["user"]))
            throwError(403, "Accesso non consentito.");
    }

    function requireParams($params, array $keys) {
        foreach ($keys as $key)
            if (!isset($params[$key]))
                throwError(400, "Parametro mancante: '$key'.");
        return array_intersect_key($params, array_flip($keys));
    }
    
    function getMostRecentEvent() {
        global $db;
        $query = "SELECT * FROM events ORDER BY event_date ASC LIMIT 1;";
        $results = $db->query($query);
        return $results->fetchArray();
    }

    function getLastThreeEvents() {
        global $db;
        $query = "SELECT * FROM events WHERE is_special=0 ORDER BY event_date ASC LIMIT 3 OFFSET 1;";
        $results = $db->query($query);

        $events = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        return $events;
    }

    function getMostRecentSpecialEvent() {
        global $db;
        $query = "SELECT * FROM events WHERE is_special=1 ORDER BY event_date ASC LIMIT 1;";
        $results = $db->query($query);
        return $results->fetchArray();
    }

    function getMoviesCatalog($page_number, $number_of_movies, $genre_id, $director) {
        global $db;
        if (empty($genre_id) && empty($director)) {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $number_of_movies, SQLITE3_INTEGER);
            $stmt->bindValue(2, ($page_number * $number_of_movies) - $number_of_movies, SQLITE3_INTEGER);
        } elseif ($genre_id > 0 && !empty($genre_id) && empty($director)) {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id AND genres.genre_id=? LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
            $stmt->bindValue(2, $number_of_movies, SQLITE3_INTEGER);
            $stmt->bindValue(3, ($page_number * $number_of_movies) - $number_of_movies, SQLITE3_INTEGER);
        } elseif (empty($genre_id) && !empty($director)) {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id AND movies.director=? LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $director, SQLITE3_TEXT);
            $stmt->bindValue(2, $number_of_movies, SQLITE3_INTEGER);
            $stmt->bindValue(3, ($page_number * $number_of_movies) - $number_of_movies, SQLITE3_INTEGER);
        } else {
            return null;
        }
        $results = $stmt->execute();

        $movies = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $movies[] = $row;
        }

        return $movies;
    }

    function getEventsCatalog($page_number, $number_of_events) {
        global $db;
        $query = "SELECT * FROM events LIMIT ? OFFSET ?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $number_of_events, SQLITE3_INTEGER);
        $stmt->bindValue(2, ($page_number * $number_of_events) - $number_of_events, SQLITE3_INTEGER);

        $results = $stmt->execute();

        $events = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        return $events;
    }

    function getAllMovies() {
        global $db;
        $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id;";
        $results = $db->query($query);

        $movies = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $movies[] = $row;
        }

        return $movies;
    }

    function getAllGenres() {
        global $db;
        $query = "SELECT * FROM genres;";
        $results = $db->query($query);

        $genres = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $genres[] = $row;
        }

        return $genres;
    }

    function getAllEvents() {
        global $db;
        $query = "SELECT * FROM events;";
        $results = $db->query($query);

        $events = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        return $events;
    }

    function getMoviesGenreWithCount() {
        global $db;
        $query = "SELECT * FROM (
                SELECT g.genre_id, g.genre_name, COUNT(m.movie_id) as movie_count
                FROM genres g
                LEFT JOIN movies m ON g.genre_id = m.genre_id
                GROUP BY g.genre_id, g.genre_name
                ORDER BY movie_count DESC)
                WHERE movie_count > 0;";
        $results = $db->query($query);

        $movies_genres = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $movies_genres[] = $row;
        }

        return $movies_genres;
    }

    function getMoviesDirectorWithCount() {
        global $db;
        $query = "SELECT * FROM (
                SELECT director, COUNT(movie_id) as movie_count
                FROM movies
                GROUP BY director
                ORDER BY movie_count DESC)
                WHERE movie_count > 0;";
        $results = $db->query($query);

        $movies_directors = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $movies_directors[] = $row;
        }

        return $movies_directors;
    }

    function getMoviesCount($genre_id, $director) {
        global $db;
        if (empty($genre_id) && empty($director)) {
            $query = "SELECT COUNT(*) AS movie_count FROM movies;";
            $stmt = $db->prepare($query);
        } elseif (!empty($genre_id) && $genre_id > 0 && empty($director)) {
            $query = "SELECT COUNT(*) AS movie_count FROM movies WHERE genre_id=?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
        } elseif (empty($genre_id) && !empty($director)) {
            $query = "SELECT COUNT(*) AS movie_count FROM movies WHERE director=?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $director, SQLITE3_TEXT);
        } else {
            return null;
        }
        $results = $stmt->execute();
        return $results->fetchArray();
    }

    function getMovieFromId($movie_id) {
        global $db;
        $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id AND movies.movie_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $movie_id, SQLITE3_INTEGER);
        $results = $stmt->execute();
        return $results->fetchArray();
    }

    function getEventFromId($event_id) {
        global $db;
        $query = "SELECT * FROM events WHERE event_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $event_id, SQLITE3_INTEGER);
        $results = $stmt->execute();
        return $results->fetchArray();
    }

    function getGenreFromId($genre_id) {
        global $db;

        $query = "SELECT * FROM genres WHERE genre_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
        $results = $stmt->execute();
        return $results->fetchArray();
    }

    function getEventsFromMovieId($movie_id) {
        global $db;
        $query = "SELECT * FROM events WHERE events.movie_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $movie_id, SQLITE3_INTEGER);
        $results = $stmt->execute();

        $events = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        return $events;
    }

    function getEventOccupiedSeats($event_id) {
        global $db;
        $query = "SELECT COUNT(*) AS sub_count FROM events, event_subscriptions WHERE events.event_id=event_subscriptions.event_id AND events.event_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $event_id, SQLITE3_INTEGER);
        $results = $stmt->execute();
        return $results->fetchArray()["sub_count"];
    }

    function getEventsCount() {
        global $db;
        $query = "SELECT COUNT(*) AS events_count FROM events;";
        $results = $db->query($query);
        return $results->fetchArray();
    }
    
    function insertEventSubscription($email, $event_id) {
        global $db;

        if (isValidEmail($email)) {
            $select_query = "SELECT * FROM event_subscriptions WHERE email=? AND event_id=?;";
            $stmt = $db->prepare($select_query);
            $stmt->bindValue(1, $email, SQLITE3_TEXT);
            $stmt->bindValue(2, $event_id, SQLITE3_INTEGER);
            $results = $stmt->execute();
    
            if (!$results->fetchArray()) {
                $insert_query = "INSERT INTO event_subscriptions(email, event_id) VALUES (?, ?);";
                $stmt = $db->prepare($insert_query);
                $stmt->bindValue(1, $email, SQLITE3_TEXT);
                $stmt->bindValue(2, $event_id, SQLITE3_INTEGER);
                $stmt->execute();
                return true;
            }
        }

        return false;
    }

    function insertOrUpdateMovie($movie, $action) {
        global $db;

        if ($action == 0) {
            $query = "INSERT INTO movies(title, release_date, director, duration, rating, description, poster_url, trailer_url, genre_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
        } elseif ($action == 1) {
            $query = "UPDATE movies SET title = ?, release_date = ?, director = ?, duration = ?, rating = ?, description = ?, poster_url = ?, trailer_url = ?, genre_id = ? WHERE movie_id = ?;";
        }
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $movie["title"], SQLITE3_TEXT);
        $stmt->bindValue(2, $movie["release_date"], SQLITE3_TEXT);
        $stmt->bindValue(3, $movie["director"], SQLITE3_TEXT);
        $stmt->bindValue(4, $movie["duration"], SQLITE3_INTEGER);
        $stmt->bindValue(5, (float) $movie["rating"], 2);
        $stmt->bindValue(6, $movie["description"], SQLITE3_TEXT);
        $stmt->bindValue(7, $movie["poster_url"], SQLITE3_TEXT);
        $stmt->bindValue(8, $movie["trailer_url"], SQLITE3_TEXT);
        $stmt->bindValue(9, $movie["genre_id"], SQLITE3_INTEGER);

        if ($action == 1)
            $stmt->bindValue(10, $movie["movie_id"], SQLITE3_INTEGER);

        $stmt->execute();
    }

    function deleteMovieFromId($movie_id) {
        global $db;

        $query = "DELETE FROM movies WHERE movie_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $movie_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    function insertOrUpdateEvent($event, $action) {
        global $db;

        if ($action == 0) {
            $query = "INSERT INTO events(event_name, event_description, event_date, location, event_poster, capacity, ticket_price, is_special, event_status, movie_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        } elseif ($action == 1) {
            $query = "UPDATE events SET event_name = ?, event_description = ?, event_date = ?, location = ?, event_poster = ?, capacity = ?, ticket_price = ?, is_special = ?, event_status = ?, movie_id = ? WHERE event_id = ?;";
        }
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $event["event_name"], SQLITE3_TEXT);
        $stmt->bindValue(2, $event["event_description"], SQLITE3_TEXT);
        $stmt->bindValue(3, $event["event_date"], SQLITE3_TEXT);
        $stmt->bindValue(4, $event["location"], SQLITE3_TEXT);
        $stmt->bindValue(5, $event["event_poster"], SQLITE3_TEXT);
        $stmt->bindValue(6, $event["capacity"], SQLITE3_INTEGER);
        $stmt->bindValue(7, (float) $event["ticket_price"], 2);
        $stmt->bindValue(8, $event["is_special"], SQLITE3_INTEGER);
        $stmt->bindValue(9, $event["event_status"], SQLITE3_TEXT);
        $stmt->bindValue(10, $event["movie_id"] == -1 ? null : $event["movie_id"], SQLITE3_INTEGER);

        if ($action == 1)
            $stmt->bindValue(11, $event["event_id"], SQLITE3_INTEGER);

        $stmt->execute();
    }

    function deleteEventFromId($event_id) {
        global $db;

        $query = "DELETE FROM events WHERE event_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $event_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    function insertOrUpdateGenre($genre, $action) {
        global $db;

        if ($action == 0) {
            $query = "INSERT INTO genres(genre_name) VALUES (?);";
        } elseif ($action == 1) {
            $query = "UPDATE genres SET genre_name = ? WHERE genre_id = ?;";
        }
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $genre["genre_name"], SQLITE3_TEXT);

        if ($action == 1)
            $stmt->bindValue(2, $genre["genre_id"], SQLITE3_INTEGER);

        $stmt->execute();
    }

    function deleteGenreFromId($genre_id) {
        global $db;
        
        $query = "DELETE FROM genres WHERE genre_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
        $stmt->execute();
    }

    function hasGenreLinkedMovies($genre_id) {
        global $db;

        $query = "SELECT * FROM genres, movies WHERE genres.genre_id=movies.genre_id AND genres.genre_id=?";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
        $results = $stmt->execute();

        return $results->fetchArray();
    }

    function adminLogin($user, $pwd) {
        global $db;
        $query = "SELECT * FROM admin WHERE username=? AND pwd=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $user, SQLITE3_TEXT);
        $stmt->bindValue(2, $pwd, SQLITE3_TEXT);
        $results = $stmt->execute();

        return $results->fetchArray();
    }

    function formatDate($dateString) {
        $days = [
            'Monday'    => 'Lunedì',
            'Tuesday'   => 'Martedì',
            'Wednesday' => 'Mercoledì',
            'Thursday'  => 'Giovedì',
            'Friday'    => 'Venerdì',
            'Saturday'  => 'Sabato',
            'Sunday'    => 'Domenica'
        ];

        $date = new DateTime($dateString);
        $englishDay = $date->format('l'); // Prende il nome inglese
        $italianDay = $days[$englishDay];  // Lo traduce usando l'array
        
        return $italianDay . ' • ' . $date->format('d M');
    }

    function formatDate2($dateString) {
        $mesi = [
            1 => 'Gennaio', 2 => 'Febbraio', 3 => 'Marzo', 4 => 'Aprile',
            5 => 'Maggio', 6 => 'Giugno', 7 => 'Luglio', 8 => 'Agosto',
            9 => 'Settembre', 10 => 'Ottobre', 11 => 'Novembre', 12 => 'Dicembre'
        ];
        
        $time = strtotime($dateString);
        $giorno = date('j', $time);
        $mese = $mesi[(int)date('n', $time)];
        $anno = date('Y', $time);
        
        return "$giorno $mese $anno";
    }

    function formatDate3($dateString) {
        $mesi = [
            1 => 'Gennaio', 2 => 'Febbraio', 3 => 'Marzo', 4 => 'Aprile',
            5 => 'Maggio', 6 => 'Giugno', 7 => 'Luglio', 8 => 'Agosto',
            9 => 'Settembre', 10 => 'Ottobre', 11 => 'Novembre', 12 => 'Dicembre'
        ];
        
        $time = strtotime($dateString);
        $giorno = date('j', $time);
        $mese = $mesi[(int)date('n', $time)];
        $orario = date('H:i', $time);
        
        return "$giorno $mese - $orario";
    }

    function isValidEmail(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false
            && str_ends_with($email, '@studio.unibo.it');
    }
?>