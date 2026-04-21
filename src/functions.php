<?php
    include 'db.php';
    
    function getMostRecentEvent() {
        global $db;
        $query = "SELECT * FROM events ORDER BY event_date ASC LIMIT 1;";
        $results = $db->query($query);
        return $results->fetchArray();
    }
?>