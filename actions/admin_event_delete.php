<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ['event_id']);
    deleteEventFromId($request["event_id"]);
    
    redirect("/admin_events.php");
?>