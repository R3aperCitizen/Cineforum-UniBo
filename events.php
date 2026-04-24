<!DOCTYPE html>

<?php 
    include 'src/functions.php';

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
<body class="bg-background text-on-background">
    <!-- Header -->
    <?php require "templates/header.php"; ?>
    <main class="max-w-screen-2xl mx-auto px-12 py-16">
        <!-- Titolo -->
        <section class="mb-20 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
            <div class="md:col-span-8">
                <h1 class="font-['EB_Garamond'] text-7xl font-medium tracking-tight text-on-background mb-4">Gli Eventi</h1>
            </div>
        </section>
        <section class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Evento 1: Large -->
            <div class="md:col-span-2 md:row-span-2 bg-surface-container-lowest group cursor-pointer">
                <div class="h-80 overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="">
                </div>
                <div class="p-8">
                    <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"></span>
                    <h3 class="text-3xl font-medium mb-4"></h3>
                    <p class="text-tertiary font-body text-sm leading-relaxed line-clamp-2"></p>
                </div>
            </div>
            <!-- Evento 2: Tall -->
            <div class="md:row-span-2 bg-surface-container-lowest group cursor-pointer">
                <div class="h-[450px] overflow-hidden">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="">
                </div>
                <div class="p-8">
                    <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"></span>
                    <h3 class="text-2xl font-medium mb-4"></h3>
                    <p class="text-tertiary font-body text-sm leading-relaxed"></p>
                </div>
            </div>
            <!-- Evento 3: Square -->
            <div class="bg-surface-container-lowest p-8 flex flex-col justify-between group cursor-pointer">
                <div>
                    <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"></span>
                    <h3 class="text-2xl font-medium"></h3>
                </div>
                <div class="mt-4 flex items-center gap-2 text-tertiary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-sm">location_on</span>
                    <span class="font-body text-xs uppercase tracking-widest"></span>
                </div>
            </div>
            <!-- Evento 4: Square -->
            <div class="bg-surface-container-lowest p-8 flex flex-col justify-between group cursor-pointer">
                <div>
                    <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"></span>
                    <h3 class="text-2xl font-medium"></h3>
                </div>
                <div class="mt-4 flex items-center gap-2 text-tertiary group-hover:text-white transition-colors">
                    <span class="material-symbols-outlined text-sm">location_on</span>
                    <span class="font-body text-xs uppercase tracking-widest"></span>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php require "templates/footer.php"; ?>
</body></html>