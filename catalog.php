<!DOCTYPE html>

<?php 
    include 'src/functions.php';

    $page = $_GET["page"] ?? 1;
    $requested_genre = $_GET["genreId"] ?? null;
    $requested_director = $_GET["directorName"] ?? null;
    $movies = getMoviesCatalog($page, 6, $requested_genre, $requested_director) ?? [];
    $count = getMoviesCount()["movie_count"] ?? 0;
    $genres = getMoviesGenreWithCount() ?? [];
    $directors = getMoviesDirectorWithCount() ?? [];

    function renderGenres()
    {
        global $genres, $requested_genre;
        foreach ($genres as $genre):
            $filter_uri = "genreId";
            $filter_id = $genre["genre_id"];
            $filter_name = $genre["genre_name"];
            $filter_count = $genre["movie_count"];
            $filter_isSelected = $filter_id == $requested_genre;
            include "templates/filter.php";
        endforeach;
    }

    function renderDirectors()
    {
        global $directors, $requested_director;
        foreach ($directors as $director):
            $filter_uri = "directorName";
            $filter_id = $director["director"];
            $filter_name = $director["director"];
            $filter_count = $director["movie_count"];
            $filter_isSelected = $filter_name == $requested_director;
            include "templates/filter.php";
        endforeach;
    }

    function renderEverything()
    {
        global $count, $requested_director, $requested_genre;
        $filter_name = "Everything";
        $filter_count = $count;
        $filter_isSelected = is_null($requested_genre) && is_null($requested_director);
        include "templates/filter.php";
    }

    function renderResults()
    {
        global $count, $movies;
        echo "Showing " . count($movies) . " of " . $count . " results";
    }
?>

<html class="" lang="en"><head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600;700;800&amp;family=Epilogue:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script id="tailwind-config">tailwind.config = {darkMode: "class", theme: {extend: {colors: {"primary-fixed": "#ffdad7", "on-background": "#1b1c1c", tertiary: "#444545", "surface-container-high": "#eae8e7", "outline-variant": "#e3bebb", outline: "#8e706d", "on-primary": "#ffffff", "surface-dim": "#dcd9d9", error: "#ba1a1a", "surface-bright": "#fbf9f8", "on-primary-container": "#ffc7c2", "secondary-fixed": "#e4e2e1", "on-error-container": "#93000a", "inverse-on-surface": "#f3f0f0", "on-tertiary-fixed": "#1b1c1c", "on-primary-fixed": "#410004", "on-error": "#ffffff", "tertiary-fixed-dim": "#c7c6c6", "on-surface": "#1b1c1c", "inverse-primary": "#ffb3ad", "surface-container-low": "#f6f3f2", "secondary-container": "#e4e2e1", "surface-container-highest": "#e4e2e1", primary: "#8e0012", "tertiary-container": "#5c5c5c", "on-tertiary-fixed-variant": "#464747", background: "#fbf9f8", "on-secondary-fixed": "#1b1c1c", "surface-tint": "#b72126", "on-primary-fixed-variant": "#930013", "on-secondary-fixed-variant": "#474747", "surface-container-lowest": "#ffffff", "inverse-surface": "#303030", "error-container": "#ffdad6", "primary-fixed-dim": "#ffb3ad", "on-secondary-container": "#656464", surface: "#fbf9f8", "surface-container": "#f0eded", secondary: "#5f5e5e", "on-tertiary-container": "#d6d5d4", "primary-container": "#b31e24", "on-secondary": "#ffffff", "secondary-fixed-dim": "#c8c6c6", "on-surface-variant": "#5a403e", "tertiary-fixed": "#e3e2e2", "on-tertiary": "#ffffff", "surface-variant": "#e4e2e1"}, borderRadius: {DEFAULT: "0.125rem", lg: "0.25rem", xl: "0.5rem", full: "0.75rem"}, fontFamily: {headline: ["Eb Garamond"], body: ["Epilogue"], label: ["Epilogue"], display: "Eb Garamond"}}}};</script>
</head>
<body class="bg-background text-on-background">
    <!-- TopAppBar -->
    <?php require "templates/header.php"; ?>
    <main class="max-w-screen-2xl mx-auto px-12 py-16">
        <!-- Editorial Header -->
        <section class="mb-20 grid grid-cols-1 md:grid-cols-12 gap-8 items-end">
            <div class="md:col-span-8">
                <h1 class="font-['EB_Garamond'] text-7xl font-medium tracking-tight text-on-background mb-4">The Movie Catalog</h1>
                <p class="font-['Epilogue'] text-lg text-neutral-400 max-w-2xl leading-relaxed">
                    A curated selection of cinematic masterpieces for the Alma Mater Studiorum community. From neorealism to contemporary experimentalism.
                </p>
            </div>
            <div class="md:col-span-4 flex justify-end gap-4">
                <div class="bg-surface-container-low px-4 py-2 border-l-2 border-[#B31E24]">
                    <span class="block text-[10px] uppercase tracking-tighter text-neutral-500">Current Semester</span>
                    <span class="block font-bold text-sm">FALL 2024 ARCHIVE</span>
                </div>
            </div>
        </section>
        <div class="flex flex-col lg:flex-row gap-16">
            <!-- Sidebar Filter -->
            <aside class="w-full lg:w-64 flex-shrink-0 space-y-12">
                <div>
                    <ul class="space-y-4 font-['Epilogue'] text-sm">
                        <?php renderEverything(); ?>
                    </ul>
                </div>
                <div>
                    <h3 class="font-['Epilogue'] text-xs font-bold uppercase tracking-[0.2em] text-[#B31E24] mb-6">Genres</h3>
                    <ul class="space-y-4 font-['Epilogue'] text-sm">
                        <?php renderGenres(); ?>
                    </ul>
                </div>
                <div>
                    <h3 class="font-['Epilogue'] text-xs font-bold uppercase tracking-[0.2em] text-[#B31E24] mb-6">Directors</h3>
                    <ul class="space-y-4 font-['Epilogue'] text-sm">
                        <?php renderDirectors(); ?>
                    </ul>
                </div>
                <div class="p-6 bg-surface-container-low border border-neutral-800">
                    <p class="font-['EB_Garamond'] text-lg leading-tight mb-4 text-text-neutral-500">"Cinema is a matter of what's in the frame and what's out."</p>
                    <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest text-[#B31E24]">Martin Scorsese</span>
                </div>
            </aside>
            <!-- Grid Content -->
            <div class="flex-grow">
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-8 gap-y-16">
                    <?php
                        foreach ($movies as $movie):
                            $card_image = $movie["poster_url"];
                            $card_name = $movie["title"];
                            $card_year = date("Y", strtotime($movie["release_date"]));
                            $card_director = $movie["director"];
                            $card_genre = $movie["genre_name"];
                            $card_minutes = $movie["duration"];
                            include "templates/card.php";
                        endforeach;
                    ?>
                </div>
                <div class="mt-24 flex items-center justify-between border-t border-neutral-800 pt-10">
                    <span class="font-['Epilogue'] text-[10px] uppercase tracking-widest text-neutral-500"><?= renderResults(); ?></span>
                    <div class="flex gap-4">
                        <form action="">
                            <input type="hidden" name="page" value="<?= $page - 1 ?>">
                            <?php echo is_null($requested_genre) ? null : '<input type="hidden" name="genreId" value="' . $requested_genre . '">'; ?>
                            <?php echo is_null($requested_director) ? null : '<input type="hidden" name="directorName" value="' . $requested_director . '">'; ?>
                            <input type="submit" value="previous" class="px-6 py-2 bg-surface-container-high text-xs font-bold uppercase tracking-widest hover:text-[#B31E24] transition-colors">
                        </form>
                        <form action="">
                            <input type="hidden" name="page" value="<?= $page + 1 ?>">
                            <?php echo is_null($requested_genre) ? null : '<input type="hidden" name="genreId" value="' . $requested_genre . '">'; ?>
                            <?php echo is_null($requested_director) ? null : '<input type="hidden" name="directorName" value="' . $requested_director . '">'; ?>
                            <input type="submit" value="next" class="px-6 py-2 bg-surface-container-high text-xs font-bold uppercase tracking-widest hover:text-[#B31E24] transition-colors">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php require "templates/footer.php"; ?>
</body></html>