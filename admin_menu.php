<!DOCTYPE html>
<?php
    include 'functions.php';

    session_start();
    requireAuthorization();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_destroy();
        redirect('/admin_login.php');
    }
?>
<html class="" lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Admin | Menu</title>
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
    
    <main class="flex-1 flex flex-col items-center justify-center px-12 py-20">
        <!-- Titolo -->
        <section class="mb-20 text-center">
            <h1 class="font-['EB_Garamond'] text-6xl md:text-8xl font-medium tracking-tight text-on-background mb-6">Area di Amministrazione</h1>
            <p class="font-['Epilogue'] text-lg text-on-surface-variant max-w-2xl mx-auto leading-relaxed">
                Seleziona un'opzione dal menu sottostante per gestire il contenuto del Cineforum.
            </p>
        </section>

        <!-- Menu dei pulsanti -->
        <section class="w-full max-w-4xl">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pulsante Eventi -->
                <a href="admin_events.php" class="group relative overflow-hidden bg-surface-container-lowest rounded-lg p-12 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 border border-outline-variant/20">
                    <div class="absolute inset-0 bg-primary-container opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-6xl text-on-surface mb-6">event_available</span>
                        <h2 class="font-['EB_Garamond'] text-4xl font-medium tracking-tight text-on-background mb-3">Gestisci Eventi</h2>
                        <p class="font-['Epilogue'] text-secondary leading-relaxed">
                            Aggiungi, modifica o elimina gli eventi cinematografici e consulta la programmazione.
                        </p>
                    </div>
                </a>

                <!-- Pulsante Film -->
                <a href="admin_movies.php" class="group relative overflow-hidden bg-surface-container-lowest rounded-lg p-12 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 border border-outline-variant/20">
                    <div class="absolute inset-0 bg-primary-container opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-6xl text-on-surface mb-6">movie</span>
                        <h2 class="font-['EB_Garamond'] text-4xl font-medium tracking-tight text-on-background mb-3">Gestisci Film</h2>
                        <p class="font-['Epilogue'] text-secondary leading-relaxed">
                            Gestisci il catalogo dei film, aggiungi nuove release e modifica i dati esistenti.
                        </p>
                    </div>
                </a>

                <!-- Pulsante Generi -->
                <a href="admin_genres.php" class="group relative overflow-hidden bg-surface-container-lowest rounded-lg p-12 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 border border-outline-variant/20">
                    <div class="absolute inset-0 bg-primary-container opacity-0 group-hover:opacity-5 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-6xl text-on-surface mb-6">label</span>
                        <h2 class="font-['EB_Garamond'] text-4xl font-medium tracking-tight text-on-background mb-3">Gestisci Generi</h2>
                        <p class="font-['Epilogue'] text-secondary leading-relaxed">
                            Organizza i generi cinematografici e gestisci la classificazione del catalogo.
                        </p>
                    </div>
                </a>

                <!-- Pulsante Logout -->
                <form method="POST" class="group relative overflow-hidden bg-surface-container-lowest rounded-lg p-12 shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1 border border-outline-variant/20">
                    <div class="absolute inset-0 bg-surface-container-highest opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <div class="relative z-10">
                        <span class="material-symbols-outlined text-6xl text-on-surface mb-6">logout</span>
                        <h2 class="font-['EB_Garamond'] text-4xl font-medium tracking-tight text-on-background mb-3">Esci</h2>
                        <p class="font-['Epilogue'] text-secondary leading-relaxed">
                            Termina la sessione amministrativa e torna alla pagina di accesso.
                        </p>
                        <button type="submit" class="mt-6 font-['Epilogue'] text-primary font-bold text-sm uppercase tracking-widest hover:opacity-90 transition-opacity">
                            Esci dall'area amministrativa
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'templates/footer.php';?>
</body>
</html>