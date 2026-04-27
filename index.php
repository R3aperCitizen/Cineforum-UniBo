<!DOCTYPE html>
<?php
    include 'functions.php';

    $event = getMostRecentEvent();
    $events = getLastThreeEvents();
    $special = getMostRecentSpecialEvent();

    $firstEvent = $events[0];
    $secondEvent = $events[1];
    $thirdEvent = $events[2];
?>
<html lang="it"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Home</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background selection:bg-primary-container selection:text-white min-h-screen flex flex-col">
    <!-- Header -->
    <?php include 'templates/header.php';?>
    <main class="flex-1">
        <!-- Evento in arrivo -->
        <section class="relative w-full min-h-[870px] flex items-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-r from-background via-background/80 to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-screen-2xl mx-auto px-12 grid grid-cols-1 md:grid-cols-12 gap-8 items-center">
                <div class="md:col-span-7">
                    <div class="flex items-center gap-4 mb-6">
                        <span class="bg-primary-container text-white px-3 py-1 font-body text-xs tracking-widest uppercase"><?= formatDate($event['event_date']); ?></span>
                        <span class="text-tertiary font-body text-xs tracking-widest uppercase"><?= $event['location']; ?></span>
                    </div>
                    <h1 class="text-7xl md:text-9xl font-medium tracking-tight mb-8 leading-none"><?= $event['event_name']; ?></h1>
                    <p class="max-w-xl font-body text-lg text-secondary leading-relaxed mb-10">
                        <?= $event['event_description']; ?>
                    </p>
                    <div class="flex items-center gap-6">
                        <a class="bg-primary-container text-white px-10 py-4 font-body text-sm font-bold uppercase tracking-[0.2em] hover:opacity-90 transition-opacity" href="event.php?event_id=<?= $event['event_id']; ?>">Vedi Dettagli</a>
                    </div>
                </div>
                <div class="hidden md:block md:col-span-5 relative">
                    <div class="aspect-[2/3] w-full bg-surface-container-low overflow-hidden shadow-2xl">
                        <img alt="<?= $event['event_name']; ?>" class="w-full h-full object-cover" src="<?= $event['event_poster']; ?>">
                    </div>
                </div>
            </div>
        </section>
        <!-- Griglia eventi in arrivo -->
        <section class="py-24 bg-surface-container-low">
            <div class="max-w-screen-2xl mx-auto px-12">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="text-5xl font-medium tracking-tight text-black mb-4">Programmazione</h2>
                        <p class="font-body text-tertiary uppercase tracking-widest text-sm">Stagione 2025/26 • Cesena</p>
                    </div>
                    <a class="font-body text-primary-container font-bold text-sm uppercase tracking-widest border-b-2 border-primary-container pb-1 hover:opacity-90 transition-opacity" href="events.php">Calendario Completo</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Evento 1: Large -->
                    <?php
                        $event_large_id = $firstEvent['event_id'];
                        $event_large_image = $firstEvent['event_poster'];
                        $event_large_date = formatDate($firstEvent['event_date']);
                        $event_large_name = $firstEvent['event_name'];
                        $event_large_description = $firstEvent['event_description'];
                        include "templates/event_large.php";
                    ?>
                    <!-- Evento 2: Tall -->
                    <?php
                        $event_tall_id = $secondEvent['event_id'];
                        $event_tall_image = $secondEvent['event_poster'];
                        $event_tall_date = formatDate($secondEvent['event_date']);
                        $event_tall_name = $secondEvent['event_name'];
                        $event_tall_description = $secondEvent['event_description'];
                        include "templates/event_tall.php";
                    ?>
                    <!-- Evento 3: Small -->
                    <?php
                        $event_small_id = $thirdEvent['event_id'];
                        $event_small_date = formatDate($thirdEvent['event_date']);
                        $event_small_name = $thirdEvent['event_name'];
                        $event_small_location = $thirdEvent['location'];
                        $event_small_is_special = $thirdEvent['is_special'];
                        include "templates/event_small.php";
                    ?>
                    <!-- Evento 4: Special -->
                    <?php
                        $event_small_id = $special['event_id'];
                        $event_small_date = formatDate($special['event_date']);
                        $event_small_name = $special['event_name'];
                        $event_small_location = $special['location'];
                        $event_small_is_special = $special['is_special'];
                        include "templates/event_small.php";
                    ?>
                </div>
            </div>
        </section>
        <!-- Banner Università -->
        <section class="py-32 bg-background border-t border-neutral-800/50">
            <div class="max-w-screen-2xl mx-auto px-12 flex flex-col md:flex-row gap-20 items-center">
                <div class="flex-1">
                    <img alt="Università di Bologna" class="w-full h-[520px] object-cover grayscale opacity-80" src="assets/images/uni.jpg">
                </div>
                <div class="flex-1 space-y-8">
                    <h2 class="text-6xl font-medium leading-tight">Preservare l'<span class="text-primary-container">eredità</span> del cinema nel cuore di Bologna.</h2>
                    <p class="font-body text-lg text-secondary leading-relaxed">
                        Dal 1088, l'Alma Mater Studiorum è un faro di cultura. Il nostro Cineforum porta avanti questa tradizione proponendo una selezione variegata di film che stimolano, ispirano e formano la comunità accademica.
                    </p>
                </div>
            </div>
        </section>
        <!-- Banner Collezione -->
        <section class="pb-32">
            <div class="max-w-screen-2xl mx-auto px-12">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                    <div class="md:col-span-12">
                        <div class="relative h-[600px] overflow-hidden group">
                            <img alt="Archivio Pellicole" class="w-full h-full object-cover" src="assets/images/archive.jpg">
                            <div class="absolute inset-0 bg-neutral-900/40 group-hover:bg-neutral-900/20 transition-all duration-500"></div>
                            <div class="absolute bottom-0 left-0 p-12 max-w-lg">
                                <h3 class="text-5xl text-white font-medium mb-6">Esplora la nostra collezione</h3>
                                <button class="text-white font-body text-xs font-bold uppercase tracking-widest border-b border-white pb-1 flex items-center gap-3" onclick="location.href='movies.php'">
                                    Naviga archivio <span class="material-symbols-outlined text-xs">arrow_forward</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'templates/footer.php';?>
</body></html>