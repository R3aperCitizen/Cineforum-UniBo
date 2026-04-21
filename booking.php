<!DOCTYPE html>

<html class="" lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
<!-- TopAppBar -->
<?php include 'templates/header.php';?>
<main class="flex-grow w-full max-w-screen-2xl mx-auto px-6 md:px-12 py-12 flex flex-col md:flex-row gap-12">
<!-- Left Section: Transactional Login & Event Details -->
<section class="w-full md:w-5/12 flex flex-col justify-center">
<div class="mb-10">
<span class="text-[#B31E24] font-['Epilogue'] text-sm font-bold tracking-[0.2em] uppercase block mb-4" style="">Alma Mater Studiorum</span>
<h1 class="font-headline text-6xl md:text-7xl font-medium tracking-tight mb-6 leading-none" style="">Reservations Portal</h1>
<p class="font-body text-secondary text-lg leading-relaxed max-w-md" style="">
    Access exclusive film screenings at the Cineteca di Bologna. Identify with your institutional credentials to secure your seat.
</p>
</div>
<div class="bg-surface-container-low p-10 rounded-lg shadow-none border-none">
<form class="space-y-6">
<div class="space-y-2">
<label class="font-label text-sm text-on-surface-variant font-medium tracking-wide" style="">Institutional Email (@studio.unibo.it)</label>
<input class="w-full bg-surface-container-high border-none border-b-2 border-[#B31E24] text-on-surface px-4 py-3 focus:ring-0 transition-all outline-none" placeholder="nome.cognome@studio.unibo.it" type="email"/>
</div>
<div class="space-y-2">
<label class="font-label text-sm text-on-surface-variant font-medium tracking-wide" style="">Password</label>
<input class="w-full bg-surface-container-high border-none border-b-2 border-[#B31E24] text-on-surface px-4 py-3 focus:ring-0 transition-all outline-none" placeholder="••••••••" type="password"/>
</div>
<div class="flex items-center justify-between pt-2">
<div class="flex items-center space-x-2">
<input class="w-4 h-4 rounded bg-surface-container-highest border-none text-[#B31E24] focus:ring-0" id="remember" type="checkbox"/>
<label class="font-label text-xs text-secondary tracking-wide" for="remember" style="">Keep me logged in</label>
</div>
<a class="font-label text-xs text-primary-container font-semibold hover:underline decoration-2 underline-offset-4" href="#" style="">Forgot ID?</a>
</div>
<button class="w-full bg-primary-container text-white py-4 rounded-lg font-['Epilogue'] font-bold uppercase tracking-[0.15em] hover:opacity-90 transition-all" style="" type="submit">
    Validate &amp; Continue
</button>
</form>
</div>
<div class="mt-8 flex items-center space-x-4 p-4 bg-surface-container-lowest rounded">
<span class="material-symbols-outlined text-[#B31E24]" data-icon="info" style="">info</span>
<p class="font-label text-xs text-on-surface-variant leading-tight" style="">
    Seats are limited. Each student may reserve only one ticket per screening. Valid student ID required at entrance.
</p>
</div>
</section>
<!-- Right Section: Seat Selection Map -->
<section class="w-full md:w-7/12 bg-surface-container-lowest rounded-lg p-8 md:p-12 flex flex-col items-center justify-center relative overflow-hidden">
<!-- Screen Indicator -->
<div class="w-2/3 h-1 bg-gradient-to-r from-transparent via-neutral-600 to-transparent mb-16 relative">
<div class="absolute -top-8 left-1/2 -translate-x-1/2 font-label text-[10px] tracking-[0.4em] text-neutral-500 uppercase" style="">Screen / Palcoscenico</div>
</div>
<!-- Seat Map Grid -->
<div class="seat-grid w-full max-w-xl mx-auto">
<!-- Visualizing 12 columns by 8 rows approx -->
<!-- Row A -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
<!-- Row B -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
<!-- Row C (Selected Seat) -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-primary-container rounded-sm shadow-[0_0_15px_rgba(179,30,36,0.5)] border border-white/20"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
<!-- Row D -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-[#B31E24] rounded-sm opacity-30"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
<!-- Row E -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
<!-- Row F -->
<div class="col-span-12 flex justify-center gap-2 mb-2">
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
<div class="w-6 h-6 bg-surface-container-highest rounded-sm"></div>
</div>
</div>
<!-- Legend -->
<div class="mt-12 flex space-x-8">
<div class="flex items-center space-x-2">
<div class="w-3 h-3 bg-surface-container-highest rounded-sm"></div>
<span class="font-label text-[10px] uppercase tracking-widest text-neutral-400" style="">Available</span>
</div>
<div class="flex items-center space-x-2">
<div class="w-3 h-3 bg-[#B31E24] rounded-sm opacity-30"></div>
<span class="font-label text-[10px] uppercase tracking-widest text-neutral-400" style="">Occupied</span>
</div>
<div class="flex items-center space-x-2">
<div class="w-3 h-3 bg-primary-container rounded-sm"></div>
<span class="font-label text-[10px] uppercase tracking-widest text-neutral-400 text-on-surface" style="">Your Selection</span>
</div>
</div>
<!-- Decorative Overlay -->
<div class="absolute bottom-10 right-10 opacity-10">
<span class="material-symbols-outlined text-[120px]" data-icon="chair" style="">chair</span>
</div>
</section>
</main>
<!-- Footer -->
<?php include 'templates/footer.php';?>
</body></html>