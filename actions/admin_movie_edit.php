<?php
    include '../functions.php';
    session_start();

    if (!isset($_SESSION["user"]))
        throwError(403, "Accesso non consentito.");

    // do the work

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
?>