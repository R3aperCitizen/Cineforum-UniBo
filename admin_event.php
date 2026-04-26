<!DOCTYPE html>
<?php 
    include 'functions.php';

    session_start();
    if (!isset($_SESSION["user"]))
        throwError(403, "Forbidden.");
?>
<html class="" lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Admin | Evento</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&family=Epilogue:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
    <!-- Header -->
    <?php include 'templates/header.php';?>
    
    <main class="max-w-screen-2xl flex-1 mx-auto px-12 py-16">
        <!-- Titolo -->
        <section class="mb-20 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
            <div class="md:col-span-8">
                <h1 class="font-['EB_Garamond'] text-7xl font-medium tracking-tight text-on-background mb-4">Area di Amministrazione</h1>
                <p class="font-['Epilogue'] text-lg text-neutral-400 max-w-2xl leading-relaxed">
                    Gestisci film, generi ed eventi del Cineforum.
                </p>
            </div>
        </section>

        <!-- Sezione Eventi -->
        <section class="mb-24">
            <div class="grid grid-cols-[80%_20%] mb-12">
                <h2 class="font-['EB_Garamond'] text-5xl font-medium tracking-tight text-on-background mb-4 mr-8">Eventi</h2>
                <button class="bg-primary-container text-white px-6 py-2 font-body text-sm font-bold uppercase tracking-[0.2em] hover:opacity-90 transition-opacity">Aggiungi Evento</button>
            </div>

            <div class="bg-surface-container-low rounded-lg p-8 mb-8">
                <h3 class="font-['Epilogue'] text-sm font-bold uppercase tracking-[0.2em] text-on-surface-variant mb-6">Aggiungi un nuovo evento</h3>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Nome Evento</label>
                            <input type="text" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                        </div>
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Data e Ora</label>
                            <input type="datetime-local" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Luogo</label>
                            <input type="text" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                        </div>
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Prezzo Biglietto (€)</label>
                            <input type="number" step="0.01" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Capacità</label>
                            <input type="number" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                        </div>
                        <div>
                            <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Status</label>
                            <select class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors">
                                <option value="scheduled">Programmato</option>
                                <option value="ongoing">In Corso</option>
                                <option value="cancelled">Annullato</option>
                                <option value="completed">Completato</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Descrizione</label>
                        <textarea rows="3" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors"></textarea>
                    </div>
                    <div>
                        <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Immagine Poster</label>
                        <input type="text" class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-outline-variant focus:outline-none px-4 py-3 font-body transition-colors" placeholder="URL dell'immagine">
                    </div>
                    <div class="flex items-center gap-4">
                        <input type="checkbox" id="special" class="w-5 h-5 accent-primary-container">
                        <label for="special" class="font-['Epilogue'] text-sm font-medium">Evento Speciale</label>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'templates/footer.php';?>
</body></html>