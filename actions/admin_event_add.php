<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ['event_name', 'event_description', 'event_date', 'location', 'event_poster', 'capacity', 'ticket_price', 'is_special', 'event_status', 'movie_id']);
    insertOrUpdateEvent($request, 0);
    
    redirect("/admin_events.php");
?>