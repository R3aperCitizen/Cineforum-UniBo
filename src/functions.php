<?php
    include 'db.php';
    
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

    function formatDate($dateString) {
        $date = new DateTime($dateString);
        return $date->format('l • d M'); // l = full weekday, d = day, M = short month
    }
?>