<?php
    function navigationSelector($page) {
        $current = basename($_SERVER['PHP_SELF']);
        $base = "font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300";
        $active = "text-[#B31E24] border-b-2 border-[#B31E24] pb-1";
        $inactive = "text-neutral-400";
        return $base . ' ' . ($current === $page ? $active : $inactive);
    }
?>

<header class="bg-neutral-900 sticky top-0 z-50">
<nav class="flex justify-between items-center w-full px-12 py-6 max-w-screen-2xl mx-auto">
<div class="font-['EB_Garamond'] text-2xl font-bold text-[#B31E24]">Cineforum di Ateneo</div>
<div class="hidden md:flex items-center gap-10">
<a class="<?= navigationSelector('index.php') ?>" href="index.php">Home</a>
<a class="<?= navigationSelector('catalog.php') ?>" href="catalog.php">Movies</a>
<a class="<?= navigationSelector('forum.php') ?>" href="forum.php">Cineforum</a>
</div>
<div class="flex items-center gap-6">
<button class="bg-primary-container text-white px-6 py-2 font-['Epilogue'] text-sm uppercase tracking-widest hover:opacity-80 transition-opacity">Student Login</button>
</div>
</nav>
<div class="h-[1px] bg-neutral-800 w-full"></div>
</header>