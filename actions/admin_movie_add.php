<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $request = requireParams($_POST, ['title', 'release_date', 'director', 'duration', 'rating', 'description', 'poster_url', 'trailer_url', 'genre_id']);
    insertOrUpdateMovie($request, 0);
    
    redirect("/admin_movies.php");
?>