<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $request = requireParams($_POST, ['movie_id']);
    deleteMovieFromId($request["movie_id"]);
    
    redirect("/admin_movies.php");
?>