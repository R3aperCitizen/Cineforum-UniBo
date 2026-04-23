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

    function formatDate($dateString) {
        $date = new DateTime($dateString);
        return $date->format('l • d M'); // l = full weekday, d = day, M = short month
    }
?>