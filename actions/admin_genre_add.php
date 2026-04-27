<?php
    include '../functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $request = requireParams($_POST, ["genre_name"]);
    insertOrUpdateGenre($request, 0);
    
    redirect("/admin_genres.php");
?>