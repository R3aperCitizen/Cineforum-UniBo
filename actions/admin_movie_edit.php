<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ['movie_id', 'title', 'release_date', 'director', 'duration', 'rating', 'description', 'poster_url', 'trailer_url', 'genre_id']);
    insertOrUpdateMovie($request, 1);
    
    redirect("/admin_movies.php");
?>