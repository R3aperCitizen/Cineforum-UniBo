<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ["genre_id"]);
    deleteGenreFromId($request["genre_id"]);
    
    redirect("/admin_genres.php");
?>