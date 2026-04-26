<?php
    include '../functions.php';
    session_start();

    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    $movie_id = $_GET["movie_id"] ?? null;

    if(is_null($_GET["movie_id"]))
        throwError(400, "Richiesta malposta.");

    throwError("???", "Non ancora implementato.");

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>