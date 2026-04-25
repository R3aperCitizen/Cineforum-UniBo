<!DOCTYPE html>
<?php 
    include 'src/functions.php';
?>
<html class="" lang="en"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Admin Login</title>
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
    
    <main class="flex-1 flex items-center justify-center px-12 py-20">
        <!-- Login Card -->
        <div class="max-w-screen-md w-full">
            <div class="bg-surface-container-low rounded-lg p-12 md:p-16">
                <!-- Title -->
                <div class="mb-12">
                    <h1 class="font-['EB_Garamond'] text-6xl font-medium tracking-tight text-on-background mb-6">Accesso Amministratore</h1>
                    <p class="font-['Epilogue'] text-lg text-on-surface-variant max-w-lg leading-relaxed">
                        Effettua il login per accedere all'area di amministrazione.
                    </p>
                </div>

                <!-- Login Form -->
                <form class="space-y-8" action="admin.php" method="POST">
                    <!-- Username Field -->
                    <div>
                        <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Utente</label>
                        <input type="text" name="username" required class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-primary focus:border-2 focus:outline-none px-4 py-3 font-body transition-colors placeholder:text-on-surface-variant/40" placeholder="Inserisci il tuo username">
                    </div>

                    <!-- Password Field -->
                    <div>
                        <label class="font-['Epilogue'] text-xs uppercase tracking-widest text-on-surface-variant mb-2 block">Password</label>
                        <input type="password" name="password" required class="w-full bg-surface-container-high border-b-2 border-outline-variant/20 focus:border-primary focus:border-2 focus:outline-none px-4 py-3 font-body transition-colors placeholder:text-on-surface-variant/40" placeholder="Inserisci la tua password">
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit" class="bg-primary-container text-white px-10 py-4 font-body text-sm font-bold uppercase tracking-[0.2em] hover:opacity-90 transition-opacity w-full md:w-auto">
                            Accedi
                        </button>
                    </div>
                </form>

                <!-- Back Link -->
                <div class="mt-12 pt-8 border-t border-outline-variant/10">
                    <a href="index.php" class="font-['Epilogue'] text-sm text-on-surface-variant hover:text-primary transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined text-sm">arrow_back</span>
                        Torna alla home
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <?php include 'templates/footer.php';?>
</body></html>