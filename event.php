<!DOCTYPE html>

<?php 
    include 'src/functions.php';

    $event = getEventFromId($_GET["event_id"]);
?>
<html class="" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>UniBo Cineforum | <?= $event["title"] ?></title>
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
                    <span class="">Eventi</span>
                    <span class="material-symbols-outlined text-[10px]">chevron_right</span>
                    <span class="text-[#B31E24]"><?= $event["event_name"] ?></span>
                </nav>
                <h1 class="text-7xl md:text-8xl font-medium tracking-tight mb-8 leading-none text-[#000000]"><?= $event["event_name"] ?></h1>
                <p class="font-['Epilogue'] text-lg leading-relaxed text-[#000000] max-w-2xl mb-12">
                    <?= $event["event_description"] ?>
                </p>
                <div class="flex items-center space-x-12">
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Data</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= formatDate2($event["event_date"]) ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Località</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event["location"] ?></span>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest mb-1">Costo</span>
                        <span class="font-['EB_Garamond'] text-xl"><?= $event["ticket_price"] ?>€</span>
                    </div>
                    <?php if ($event["is_special"] == 1) include 'templates/special_event.php'; ?>
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="aspect-[4/5] bg-surface-container-low overflow-hidden">
                    <img class="w-full h-full object-cover grayscale opacity-80 hover:opacity-100 transition-opacity duration-700" data-alt="stark black and white cinematic still showing dramatic shadows on a geometric concrete staircase in post-war architectural style" src="<?= $event["event_poster"] ?>"/>
                </div>
            </div>
        </section>
        <!-- Asymmetric Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
            <!-- Synopsis -->
            <div class="lg:col-span-7">
                <h2 class="text-4xl font-medium mb-10 border-l-4 border-primary-container pl-6 text-[#000000]">Curatorial Synopsis</h2>
                <div class="space-y-6 font-['Epilogue'] leading-[1.8] text-lg max-w-3xl text-[#000000]">
                    <p>
                        This curated screening brings together three pivotal works of the 1950s that challenged the traditional boundaries of narrative structure. By examining these films through the lens of institutional critique, we aim to uncover how cinematic language adapted to the rapid urbanization of the Italian landscape.
                    </p>
                    <p>
                        The discussion will focus specifically on the "unseen" elements of the frame—how negative space serves as a psychological anchor for the audience. We will traverse the shift from neorealism to high-contrast psychological drama, emphasizing the technical innovations in celluloid processing that enabled these visual metaphors.
                    </p>
                </div>
            </div>
            <!-- Right Column: Meta Info & Actions -->
            <div class="sticky top-32 space-y-12 lg:col-span-5">
                <!-- Registration Card -->
                <div class="bg-primary-container p-8">
                    <h3 class="text-white text-3xl mb-6 text-[#000000]">Reserve Attendance</h3>
                    <p class="font-['Epilogue'] text-white/80 text-sm mb-8 leading-relaxed">
                        Access is limited to UniBo students and faculty members. Pre-registration is mandatory for security protocols and digital credit assignment.
                    </p>
                    <form class="space-y-4">
                        <input class="w-full bg-black/20 border-none placeholder-white/50 text-white font-['Epilogue'] text-sm focus:ring-1 focus:ring-white py-3" placeholder="Institutional Email" type="text"/>
                        <button class="w-full bg-white text-primary-container font-['Epilogue'] font-bold uppercase tracking-widest py-4 text-sm hover:bg-neutral-100 transition-colors" href="booking.php">
                            Book Seminar Seat
                        </button>
                    </form>
                    <div class="mt-6 pt-6 border-t border-white/20 flex justify-between items-center">
                        <span class="font-['Epilogue'] text-[10px] uppercase text-white/60 tracking-tighter">Academic Credits</span>
                        <span class="font-['EB_Garamond'] text-white text-lg">2 CFU</span>
                    </div>
                </div>
                <!-- Location Insight -->
                <div class="bg-surface-container-high p-8">
                    <h3 class="text-2xl mb-4 text-[#000000]">Venue Details</h3>
                    <div class="aspect-video bg-neutral-800 mb-6 overflow-hidden">
                        <img class="w-full h-full object-cover grayscale opacity-50" data-alt="interior of a classic university lecture hall with dark wood benches and large historical arched windows" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD-UyzGOyZdKIrqU8C1NYnQrw4d2DwzGTi-f5blljE6WnuDuKuUbIOOH3PNwrNMVBcDdWsfzURvTdq_GU0Oa5MObOMtHAca0lh_XGasb9mECmQwMK-NzPXMNTVbGcm4RYo5wwm5q19qdSODUdXHrTAxgzPULpvjmU-CHMDK55lgWE9AbiwNJQOpyp-3LxTcthcutobijC57KPjhzZCw0_FtnE6UPOQ-tkoEEILydcYT66LCAh3yY34es8kHm2Ld29J7VpGOYDYBkqI"/>
                    </div>
                    <p class="font-['Epilogue'] text-neutral-400 text-sm mb-4">
                        Aula Magna, Department of Arts<br/>
                        Via Zamboni 33, 40126 Bologna (BO)
                    </p>
                    <a class="text-primary-container font-['Epilogue'] text-xs font-bold uppercase tracking-widest inline-flex items-center group" href="#">
                        View on Campus Map
                        <span class="material-symbols-outlined ml-2 text-sm transition-transform group-hover:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php require 'templates/footer.php';?>
</body></html>