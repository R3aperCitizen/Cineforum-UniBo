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
        if ($genre_id == 0 || $director == "All") {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $number_of_movies, SQLITE3_INTEGER);
            $stmt->bindValue(2, ($page_number * $number_of_movies) - $number_of_movies, SQLITE3_INTEGER);
        } elseif($genre_id > 0 && $director == "All") {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id AND genres.genre_id=? LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $genre_id, SQLITE3_INTEGER);
            $stmt->bindValue(2, $number_of_movies, SQLITE3_INTEGER);
            $stmt->bindValue(3, ($page_number * $number_of_movies) - $number_of_movies, SQLITE3_INTEGER);
        } elseif($genre_id == 0 && $director != "All") {
            $query = "SELECT * FROM movies, genres WHERE movies.genre_id=genres.genre_id AND movies.director=? LIMIT ? OFFSET ?;";
            $stmt = $db->prepare($query);
            $stmt->bindValue(1, $director, SQLITE3_INTEGER);
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
                SELECT movie_id, director, COUNT(movie_id) as movie_count
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

    function getMoviesCount() {
        global $db;
        $query = "SELECT COUNT(*) AS movie_count FROM movies;";
        $results = $db->query($query);
        return $results->fetchArray();
    }

    function formatDate($dateString) {
        $date = new DateTime($dateString);
        return $date->format('l • d M'); // l = full weekday, d = day, M = short month
    }
?>