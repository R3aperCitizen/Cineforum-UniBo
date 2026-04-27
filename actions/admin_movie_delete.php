<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ['movie_id']);
    deleteMovieFromId($request["movie_id"]);
    
    redirect("/admin_movies.php");
?>