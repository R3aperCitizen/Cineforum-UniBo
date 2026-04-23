<!DOCTYPE html>
<?php 
    include 'src/functions.php';

    $event = getMostRecentEvent();
    $events = getLastThreeEvents();
    $special = getMostRecentSpecialEvent();

    $firstEvent = $events[0];
    $secondEvent = $events[1];
    $thirdEvent = $events[2];
?>
<html class="" lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Alma Mater Studiorum</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background selection:bg-primary-container selection:text-white">
    <!-- TopAppBar -->
    <?php include 'templates/header.php';?>
    <main>
        <!-- Hero Section: Featured Screening -->
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
                        <button class="bg-primary-container text-white px-10 py-4 font-body text-sm font-bold uppercase tracking-[0.2em] hover:opacity-90 transition-opacity">Riserva Posto</button>
                        <button class="border border-outline-variant text-on-background px-10 py-4 font-body text-sm font-bold uppercase tracking-[0.2em] hover:bg-surface-container-low transition-colors">Vedi Dettagli</button>
                    </div>
                </div>
                <div class="hidden md:block md:col-span-5 relative">
                    <div class="aspect-[2/3] w-full bg-surface-container-low overflow-hidden shadow-2xl">
                        <img class="w-full h-full object-cover" data-alt="high contrast minimalist film poster for the seventh seal featuring a knight and death on a desolate beach monochromatic style" src="<?= $event['event_poster']; ?>">
                    </div>
                </div>
            </div>
        </section>
        <!-- Upcoming Events: Bento Grid Layout -->
        <section class="py-24 bg-surface-container-low">
            <div class="max-w-screen-2xl mx-auto px-12">
                <div class="flex justify-between items-end mb-16">
                    <div>
                        <h2 class="text-5xl font-medium tracking-tight text-black mb-4">Programmazione Primaverile</h2>
                        <p class="font-body text-tertiary uppercase tracking-widest text-sm">Stagione 2025/26 • Cesena</p>
                    </div>
                    <a class="font-body text-primary-container font-bold text-sm uppercase tracking-widest border-b-2 border-primary-container pb-1 hover:opacity-90 transition-opacity" href="#">Calendario Completo</a>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <!-- Event 1: Large -->
                    <div class="md:col-span-2 md:row-span-2 bg-surface-container-lowest group cursor-pointer">
                        <div class="h-80 overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="vibrant neon lit urban street at night from a contemporary cinema scene rich saturated colors" src="<?= $firstEvent['event_poster']; ?>">
                        </div>
                        <div class="p-8">
                            <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= formatDate($firstEvent['event_date']); ?></span>
                            <h3 class="text-3xl font-medium mb-4"><?= $firstEvent['event_name']; ?></h3>
                            <p class="text-tertiary font-body text-sm leading-relaxed line-clamp-2"><?= $firstEvent['event_description']; ?></p>
                        </div>
                    </div>
                    <!-- Event 2: Tall -->
                    <div class="md:row-span-2 bg-surface-container-lowest group cursor-pointer border-l border-neutral-800">
                        <div class="h-[450px] overflow-hidden">
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" data-alt="cinematic close up of architectural brutalist concrete lines and shadows artistic photography" src="<?= $secondEvent['event_poster']; ?>">
                        </div>
                        <div class="p-8">
                            <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= formatDate($secondEvent['event_date']); ?></span>
                            <h3 class="text-2xl font-medium mb-4"><?= $secondEvent['event_name']; ?></h3>
                            <p class="text-tertiary font-body text-sm leading-relaxed"><?= $secondEvent['event_description']; ?></p>
                        </div>
                    </div>
                    <!-- Event 3: Square -->
                    <div class="bg-surface-container-lowest p-8 flex flex-col justify-between group cursor-pointer">
                        <div>
                            <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= formatDate($thirdEvent['event_date']); ?></span>
                            <h3 class="text-2xl font-medium"><?= $thirdEvent['event_name']; ?></h3>
                        </div>
                        <div class="mt-4 flex items-center gap-2 text-tertiary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-sm">location_on</span>
                            <span class="font-body text-xs uppercase tracking-widest"><?= $thirdEvent['location']; ?></span>
                        </div>
                    </div>
                    <!-- Event 4: Square -->
                    <div class="bg-primary-container p-8 flex flex-col justify-between group cursor-pointer">
                        <div>
                            <span class="text-white/80 font-body text-xs font-bold uppercase tracking-tighter mb-2 block">Special Event</span>
                            <h3 class="text-2xl font-medium text-white"><?= $special['event_name']; ?></h3>
                        </div>
                        <div class="mt-4">
                            <span class="material-symbols-outlined text-white">arrow_forward</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Academic Heritage / CTA Section -->
        <section class="py-32 bg-background border-t border-neutral-800/50">
            <div class="max-w-screen-2xl mx-auto px-12 flex flex-col md:flex-row gap-20 items-center">
                <div class="flex-1">
                    <img class="w-full h-[520px] object-cover grayscale opacity-80" data-alt="Università di Bologna sede di ingegneria e architettura di Cesena" src="assets/images/uni.jpg">
                </div>
                <div class="flex-1 space-y-8">
                    <h2 class="text-6xl font-medium leading-tight">Preservare l'<span class="text-primary-container">eredità</span> del cinema nel cuore di Bologna.</h2>
                    <p class="font-body text-lg text-secondary leading-relaxed">
                        Dal 1088, l'Alma Mater Studiorum è un faro di cultura. Il nostro Cineforum porta avanti questa tradizione proponendo una selezione variegata di film che stimolano, ispirano e formano la comunità accademica.
                    </p>
                    <div class="pt-6">
                        <button class="bg-primary-container text-white px-12 py-5 font-body text-sm font-bold uppercase tracking-[0.2em] hover:opacity-90 transition-opacity">Unisciti al Cineforum</button>
                    </div>
                </div>
            </div>
        </section>
        <!-- News Feed / Asymmetric Layout -->
        <section class="pb-32">
            <div class="max-w-screen-2xl mx-auto px-12">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-12">
                    <div class="md:col-span-12">
                        <div class="relative h-[600px] overflow-hidden group">
                            <img class="w-full h-full object-cover" data-alt="interior of a classic library or film archive with high shelves and soft warm atmospheric lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB0E3VnVm6SNJsr7OoMHgh-xNU_gzKXVDvX59ip9EnKsPZj0aI7Oso8dfrFreRQUL7yVUCeQWQ_ToQVGr7PJC10spmJLEXr5H0N_nBaTWVQlNNiUy0NS5JXGj0tqBZoqBKnO_7r-9H0ttYTcK2OXUO_s1Wx5Jltq31Vk8oP1ACvY30b7LnnSB_sAjlCsdpY4lcAdRDw9Nf0DyPKHC1bRc3lwoz67s_-RJDpZmx6ax5OLwcW3T_8GiXaOJXiKYiFIz835omJDAJHTgk">
                            <div class="absolute inset-0 bg-neutral-900/40 group-hover:bg-neutral-900/20 transition-all duration-500"></div>
                            <div class="absolute bottom-0 left-0 p-12 max-w-lg">
                                <h3 class="text-5xl text-white font-medium mb-6">Explore our curated collections</h3>
                                <button class="text-white font-body text-xs font-bold uppercase tracking-widest border-b border-white pb-1 flex items-center gap-3">
                                    Browse Archive <span class="material-symbols-outlined text-xs">arrow_forward</span>
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