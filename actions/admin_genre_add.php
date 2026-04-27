<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ["genre_name"]);
    insertOrUpdateGenre($request, 0);
    
    redirect("/admin_genres.php");
?>