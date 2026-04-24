<?php $current = basename($_SERVER['PHP_SELF']); ?>

<header class="bg-neutral-900 sticky top-0 z-50">
    <nav class="flex justify-between items-center w-full px-12 py-6 max-w-screen-2xl mx-auto">
        <div class="font-['EB_Garamond'] text-2xl font-bold text-white">Cineforum di Ateneo</div>
        <div class="hidden md:flex items-center gap-10">
            <a class="<?= $current === 'index.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="index.php">Home</a>
            <a class="<?= $current === 'catalog.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="catalog.php">Movies</a>
            <a class="<?= $current === 'forum.php' ? 'text-[#B31E24] border-b-2 border-[#B31E24] pb-1' : 'text-neutral-400' ?> font-['Epilogue'] text-base uppercase tracking-widest hover:text-white transition-colors duration-300" href="events.php">Cineforum</a>
        </div>
        <div class="flex items-center gap-6">
            <button class="bg-primary-container text-white px-6 py-2 font-['Epilogue'] text-sm uppercase tracking-widest hover:opacity-80 transition-opacity">Student Login</button>
        </div>
    </nav>
    <div class="h-[1px] bg-neutral-800 w-full"></div>
</header>