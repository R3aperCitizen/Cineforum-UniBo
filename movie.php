<!DOCTYPE html>

<?php 
    include 'src/functions.php';

    $movie = getMovieFromId($_GET["movie_id"]);
?>
<html class="" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>UniBo Cineforum | <?= $movie["title"] ?></title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-surface selection:bg-primary-container selection:text-white">
    <!-- TopAppBar -->
    <?php require 'templates/header.php';?>
    <main class="max-w-screen-2xl mx-auto px-12 py-12">
        <!-- Hero Section: Movie Identity -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-24">
            <div class="lg:col-span-7 flex flex-col justify-end">
                <nav class="flex items-center space-x-2 text-xs font-['Epilogue'] uppercase tracking-[0.2em] text-[#000000] mb-8">
                    <span class="">Pellicole</span>
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-[#B31E24]"><?= $movie["title"] ?></span>
                </nav>
                <h1 class="text-7xl md:text-8xl font-medium tracking-tight mb-8 leading-none text-[#000000]"><?= $movie["title"] ?></h1>
                <p class="font-['Epilogue'] text-lg leading-relaxed text-[#000000] max-w-2xl mb-12">
                    <?= $movie["description"] ?>
                </p>
                <div class="flex items-center space-x-12">
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Release</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= date("Y", strtotime($movie["release_date"])) ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Regista</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $movie["director"] ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Durata</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $movie["duration"] ?>min</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Genere</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $movie["genre_name"] ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Rating</span>
                        <span class="font-['EB_Garamond'] text-xl text-primary-container"><?= $movie["rating"] ?></span>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="bg-surface-container-low overflow-hidden">
                    <img class="w-full h-full object-cover" data-alt="stark black and white cinematic still showing dramatic shadows on a geometric concrete staircase in post-war architectural style" src="<?= $movie["poster_url"] ?>"/>
                </div>
            </div>
        </section>
        <!-- Discussion Schedule -->
        <section class="bg-surface-container-low p-12">
            <h2 class="text-4xl font-medium mb-12 text-[#000000]">Discussion Schedule</h2>
            <div class="space-y-0">
                <div class="grid grid-cols-1 md:grid-cols-4 py-8 border-b border-neutral-800">
                    <span class="font-['Epilogue'] text-sm font-bold text-primary-container uppercase tracking-widest py-1">18:00 — 18:30</span>
                    <div class="md:col-span-3">
                        <h4 class="text-2xl mb-2 text-[#000000]">Introduction: The Void in the Frame</h4>
                        <p class="text-neutral-400 text-sm font-['Epilogue']">Opening remarks on the historical context of the selected films and the evolution of the UniBo film archive.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 py-8 border-b border-neutral-800">
                    <span class="font-['Epilogue'] text-sm font-bold text-primary-container uppercase tracking-widest py-1">18:30 — 20:15</span>
                    <div class="md:col-span-3">
                        <h4 class="text-2xl mb-2 text-[#000000]">Screening: Selected Fragments</h4>
                        <p class="text-neutral-400 text-sm font-['Epilogue']">A continuous loop of digital restorations from the Cineteca di Bologna, focusing on key sequences of shadow-play.</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 py-8">
                    <span class="font-['Epilogue'] text-sm font-bold text-primary-container uppercase tracking-widest py-1">20:15 — 21:30</span>
                    <div class="md:col-span-3">
                        <h4 class="text-2xl mb-2 text-[#000000]">Panel Debate &amp; Q&amp;A</h4>
                        <p class="text-neutral-400 text-sm font-['Epilogue']">An open forum for students and faculty to debate the intersection of aesthetics and political subtext.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php require 'templates/footer.php';?>
</body></html>