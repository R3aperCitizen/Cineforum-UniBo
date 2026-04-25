<?php $current = basename($_SERVER['PHP_SELF']); ?>

<header class="bg-neutral-900 sticky top-0 z-50">
    <nav class="flex justify-between items-center w-full px-12 py-6 max-w-screen-2xl mx-auto">
        <div class="font-['EB_Garamond'] text-2xl font-bold text-white">Cineforum di Ateneo</div>

        <!-- Menu Desktop -->
        <div class="hidden md:flex items-center gap-10">
            <a class="<?= $current === 'index.php'  ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="index.php">Home</a>
            <a class="<?= $current === 'movies.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="movies.php">Pellicole</a>
            <a class="<?= $current === 'events.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="events.php">Eventi</a>
        </div>

        <!-- Pulsante Menu Hamburger (solo mobile) -->
        <button class="md:hidden text-white" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </nav>
    <div class="h-[1px] bg-neutral-800 w-full"></div>

    <!-- Menu Hamburger Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-neutral-900 px-12 py-6 flex flex-col gap-6">
        <a class="<?= $current === 'index.php'  ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="index.php">Home</a>
        <a class="<?= $current === 'movies.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="movies.php">Pellicole</a>
        <a class="<?= $current === 'events.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="events.php">Eventi</a>
    </div>
</header>