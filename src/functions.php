<?php
    include_once 'db.php';
    
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

    function getEventFromId($event_id) {
        global $db;
        $query = "SELECT * FROM events WHERE event_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $event_id, SQLITE3_INTEGER);
        $results = $stmt->execute();
        return $results->fetchArray();
    }

    function getEventsFromMovieId($movie_id) {
        global $db;
        $query = "SELECT events.event_id, events.event_name, events.event_description, events.event_date FROM events, event_movies, movies WHERE events.event_id=event_movies.event_id AND event_movies.movie_id=movies.movie_id AND movies.movie_id=?;";
        $stmt = $db->prepare($query);
        $stmt->bindValue(1, $movie_id, SQLITE3_INTEGER);
        $results = $stmt->execute();

        $events = [];
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $events[] = $row;
        }

        return $events;
    }

    function getEventsCount() {
        global $db;
        $query = "SELECT COUNT(*) AS events_count FROM events;";
        $results = $db->query($query);
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
?>