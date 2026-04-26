<!DOCTYPE html>

<?php 
    include 'src/functions.php';

    $event = getEventFromId($_GET["event_id"]);
    $sub_count = getEventOccupiedSeats($_GET["event_id"]);
    $event_name = $event["event_name"] ?? "Non trovato";
    $event_description = $event["event_description"] ?? "Non trovato";
    $event_date = isset($event["event_date"]) ? formatDate2($event["event_date"]) : "Non trovato";
    $event_location = $event["location"] ?? "Non trovato";
    $event_price = $event["ticket_price"] ?? 0;
    $event_capacity = $event["capacity"] ?? 0;
    $event_poster = $event["event_poster"] ?? "";
    $event_special = $event["is_special"] ?? 0;
    $event_status = $event["event_status"] ?? "Non trovato";
    $available_seats = $event_capacity - $sub_count;

    $seats_display = "Nessun Posto Disponibile";
    $sub_form = "hidden";

    if ($available_seats > 0) {
        $seats_display = "Posti Disponibili: ".$available_seats."/".$event_capacity;
        $sub_form = "";
    }
?>
<html class="" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>UniBo Cineforum | <?= $event_name ?></title>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-surface selection:bg-primary-container selection:text-white min-h-screen flex flex-col">
    <!-- TopAppBar -->
    <?php require 'templates/header.php';?>
    <main class="max-w-screen-2xl mx-auto flex-1 px-12 py-12">
        <!-- Hero Section: Movie Identity -->
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-24">
            <div class="lg:col-span-7 flex flex-col justify-end">
                <nav class="flex items-center space-x-2 text-xs font-['Epilogue'] uppercase tracking-[0.2em] text-[#000000] mb-8">
                    <span class="">Eventi</span>
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-[#B31E24]"><?= $event_name ?></span>
                </nav>
                <h1 class="text-7xl md:text-7xl font-medium tracking-tight mb-8 leading-none text-[#000000]"><?= $event_name ?></h1>
                <div class="flex items-center space-x-12">
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Data</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event_date ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Località</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event_location ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Costo</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event_price ?>€</span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Stato</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event_status ?></span>
                    </div>
                    <?php if ($event_special == 1) include 'templates/special_event.php'; ?>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="aspect-[4/5] bg-surface-container-low overflow-hidden">
                    <img class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 transition-grayscale duration-700" src="<?= $event_poster ?>"/>
                </div>
            </div>
        </section>
        <!-- Asymmetric Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Synopsis -->
            <div class="lg:col-span-7">
                <h2 class="text-4xl font-medium mb-10 border-l-4 border-primary-container pl-6 text-[#000000]">Sintesi Curatoriale</h2>
                <div class="space-y-6 font-['Epilogue'] leading-[1.8] text-lg max-w-3xl text-[#000000]">
                    <p>
                        <?= $event_description ?>
                    </p>
                </div>
            </div>
            <!-- Right Column: Meta Info & Actions -->
            <div class="sticky top-32 space-y-12 lg:col-span-5">
                <!-- Registration Card -->
                <div class="bg-primary-container p-8">
                    <h3 class="text-white text-3xl mb-6 text-[#000000]">Riserva un posto</h3>
                    <p class="font-['Epilogue'] text-white/80 text-sm mb-8 leading-relaxed">
                        Accesso limitato agli studenti UniBo e ai membri della facoltà. Pre-registrazione obbligatoria con e-mail istituzionale.
                    </p>
                    <h2 class="text-white text-xl mb-6 text-[#000000]"><?= $seats_display ?></h2>
                    <form class="space-y-4 <?= $sub_form ?>">
                        <input class="w-full bg-black/20 border-none placeholder-white/50 text-white font-['Epilogue'] text-sm focus:ring-1 focus:ring-white py-3" placeholder="Institutional Email (es. marco.rossi@studio.unibo.it)" type="text"/>
                        <button class="w-full bg-white text-primary-container font-['Epilogue'] font-bold uppercase tracking-widest py-4 text-sm hover:bg-neutral-100 transition-colors" href="booking.php">
                            Prenota posto
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php require 'templates/footer.php';?>
</body></html>