<!DOCTYPE html>
<?php
    include 'functions.php';
?>
<html lang="it"><head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>UniBo Cineforum | Privacy Policy</title>
    <link rel="icon" type="image/x-icon" href="assets/images/unibo.ico">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&family=Epilogue:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background min-h-screen flex flex-col">
    <!-- Header -->
    <?php require "templates/header.php"; ?>
    <main class="max-w-screen-2xl flex-1 mx-auto px-12 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="md:col-span-3 bg-surface-container p-12 flex flex-col">
                <h1 class="text-6xl font-medium mb-8">Privacy Policy</h1>
                <div class="prose prose-lg max-w-none">
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        La tua privacy è importante per il Cineforum di Ateneo dell'Alma Mater Studiorum - Università di Bologna. Questa politica sulla privacy descrive come raccogliamo, utilizziamo e proteggiamo le tue informazioni personali quando visiti il nostro sito web o partecipi ai nostri eventi.
                    </p>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">1. Dati raccolti</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Quando visiti il nostro sito web, potremmo raccogliere le seguenti informazioni:
                    </p>
                    <ul class="font-body text-secondary leading-relaxed mb-6 list-disc list-inside">
                        <li>Nome e cognome (se ti iscrivi alla nostra newsletter o partecipi a un evento)</li>
                        <li>Indirizzo email (per inviarti aggiornamenti e informazioni sugli eventi)</li>
                        <li>Dati di navigazione (come pagina visitata, tempo trascorso, browser utilizzato)</li>
                        <li>Coordinate geografiche (per eventi specifici legati alla posizione)</li>
                    </ul>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">2. Utilizzo dei dati</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Le informazioni raccolte vengono utilizzate per:
                    </p>
                    <ul class="font-body text-secondary leading-relaxed mb-6 list-disc list-inside">
                        <li>Gestire le tue iscrizioni e partecipazioni agli eventi</li>
                        <li>Inviarti comunicazioni relative ai nostri servizi e attività</li>
                        <li>Migliorare la qualità del nostro sito web e dell'esperienza utente</li>
                        <li>Adempiere agli obblighi legali previsti dalla normativa vigente</li>
                    </ul>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">3. Condivisione dei dati</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        I tuoi dati personali non verranno ceduti a terzi se non nei seguenti casi:
                    </p>
                    <ul class="font-body text-secondary leading-relaxed mb-6 list-disc list-inside">
                        <li>Quando richiesto dalla legge o da un'autorità pubblica</li>
                        <li>Con i nostri fornitori di servizi che operano per conto nostro (es. sistemisti del sito)</li>
                        <li>Con i partner tecnici necessari per la gestione degli eventi</li>
                    </ul>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">4. Sicurezza dei dati</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Adottiamo misure di sicurezza tecnologiche e organizzative appropriate per proteggere i tuoi dati personali contro l'accesso non autorizzato, la perdita, la divulgazione o la distruzione accidentale.
                    </p>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">5. Diritti dell'utente</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Ai sensi del Regolamento Generale sulla Protezione dei Dati (GDPR), hai il diritto di:
                    </p>
                    <ul class="font-body text-secondary leading-relaxed mb-6 list-disc list-inside">
                        <li>Accedere ai tuoi dati personali</li>
                        <li>Chiedere la rettifica o l'eliminazione dei tuoi dati</li>
                        <li>Opporsi al trattamento dei tuoi dati</li>
                        <li>Limitare il trattamento dei tuoi dati</li>
                        <li>Richiedere la portabilità dei tuoi dati</li>
                    </ul>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">6. Cookie</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Il nostro sito web utilizza cookie tecnici per fornire i servizi e analizzare l'uso del sito. Continuando a navigare, acconsenti all'utilizzo dei cookie secondo le finalità indicate nella nostra Cookie Policy.
                    </p>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">7. Modifiche alla policy</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Ci riserviamo il diritto di modificare questa politica sulla privacy in qualsiasi momento. Le modifiche diventeranno effettive alla data di pubblicazione sul sito web.
                    </p>

                    <h2 class="text-3xl font-medium text-primary-container mt-8 mb-4">8. Contatti</h2>
                    <p class="font-body text-secondary leading-relaxed mb-6">
                        Per qualsiasi domanda riguardante questa politica sulla privacy o l'utilizzo dei tuoi dati personali, puoi contattarci all'indirizzo email: <a href="mailto:cineforum@unibo.it" class="text-primary-container hover:underline">cineforum@unibo.it</a>
                    </p>
                </div>
            </div>
            <div class="bg-surface-container p-8 flex flex-col justify-center">
                <h3 class="text-2xl font-medium mb-6">Informazioni</h3>
                <div class="space-y-4">
                    <p class="font-body text-secondary text-sm leading-relaxed">
                        Ultima aggiornamento: Aprile 2026
                    </p>
                    <p class="font-body text-secondary text-sm leading-relaxed">
                        Cineforum di Ateneo<br>
                        Alma Mater Studiorum - Università di Bologna<br>
                        Cesena, Italia
                    </p>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php require "templates/footer.php"; ?>
</body></html>