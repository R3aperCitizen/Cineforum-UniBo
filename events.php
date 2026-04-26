<!DOCTYPE html>

<?php 
    include 'functions.php';
    const EVENTS_PER_PAGE = 12; // Deve essere multiplo di 4 per la griglia.

    $page = $_GET["page"] ?? 1;
    $events = getEventsCatalog($page, EVENTS_PER_PAGE);
    $count = getEventsCount()["events_count"] ?? 0;

    $pages = ceil($count / EVENTS_PER_PAGE);
?>

<html class="" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>UniBo Cineforum | Eventi</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
    <!-- Header -->
    <?php require "templates/header.php"; ?>
    <main class="max-w-screen-2xl flex-1 mx-auto px-12 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="md:col-span-2 bg-surface-container p-8 flex flex-col justify-between group">
                <h1 class="text-6xl font-medium">Gli Eventi</h1>
            </div>
            <div class="bg-surface-container p-8 flex flex-col justify-between group cursor-pointer" onclick="this.querySelector('form').submit()">
                <form class="hidden" action=""><input type="hidden" name="page" value="<?= $page > 1 ? $page - 1 : $page ?>"></form>
                <h3 class="text-2xl font-medium">Pagina precedente</h3>
            </div>
            <div class="bg-surface-container p-8 flex flex-col justify-between group cursor-pointer" onclick="this.querySelector('form').submit()">
                <form class="hidden" action=""><input type="hidden" name="page" value="<?= $page < $pages ? $page + 1 : $page ?>"></form>
                <h3 class="text-2xl font-medium">Pagina successiva</h3>
            </div>

            <?php
                foreach ($events as $event):
                    $event_small_id = $event['event_id'];
                    $event_small_date = formatDate($event['event_date']);
                    $event_small_name = $event['event_name'];
                    $event_small_location = $event['location'];
                    $event_small_is_special = $event['is_special'] == 1;
                    include "templates/event_small.php";
                endforeach;
            ?>
        </div>
    </main>
    <!-- Footer -->
    <?php require "templates/footer.php"; ?>
</body></html>