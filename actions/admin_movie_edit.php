<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $request = requireParams($_POST, ['movie_id', 'title', 'release_date', 'director', 'duration', 'rating', 'description', 'poster_url', 'trailer_url', 'genre_id']);
    insertOrUpdateMovie($request, 1);
    
    redirect("/admin_movies.php");
?>