<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $fields = ['movie_id', 'title', 'release_date', 'director', 'duration', 'rating', 'description', 'poster_url', 'trailer_url', 'genre_id'];
    isRequestValid('POST', $fields);

    $movie = array_intersect_key($_POST, array_flip($fields));

    insertOrUpdateMovie($movie, 1);
    
    redirect("/admin_movies.php");
?>