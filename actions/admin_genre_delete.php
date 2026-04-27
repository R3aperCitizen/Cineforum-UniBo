<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $request = requireParams($_POST, ["genre_id"]);
    deleteGenreFromId($request["genre_id"]);
    
    redirect("/admin_genres.php");
?>