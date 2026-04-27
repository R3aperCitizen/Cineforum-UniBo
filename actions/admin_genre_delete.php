<?php
    include '../functions.php';

    session_start();
    requireAuthorization();
    $request = requireParams($_POST, ["genre_id"]);
    if(hasGenreLinkedMovies($request["genre_id"]))
        throwError(400, "Impossibile rimuovere. Questo genere ha dei film collegati.");
    deleteGenreFromId($request["genre_id"]);
    
    redirect("/admin_genres.php");
?>