<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ["genre_id", "genre_name"]);
    insertOrUpdateGenre($request, 1);
    
    redirect("/admin_genres.php");
?>