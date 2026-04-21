<?php
$db = new SQLite3('database.db');

$results = $db->query('SELECT username FROM users');

while ($row = $results->fetchArray()) {
    var_dump($row);
}
?>