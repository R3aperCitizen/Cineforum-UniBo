<?php
    $movie_card_image = $movie_card_image ?? "";
    $movie_card_name = $movie_card_name ?? "No Name";
    $movie_card_year = $movie_card_year ?? "????";
    $movie_card_director = $movie_card_director ?? "No Director";
    $movie_card_genre = $movie_card_genre ?? "No Genre";
    $movie_card_minutes = $movie_card_minutes ?? "??";
?>

<div class="group">
    <div class="relative aspect-[2/3] overflow-hidden bg-surface-container-lowest mb-6">
        <img alt="<?= $movie_card_name ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-100 group-hover:scale-105" src="<?= $movie_card_image ?>" style=""/>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
            <button class="w-full bg-white text-black py-3 text-xs font-bold uppercase tracking-widest" style="">View Details</button>
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex justify-between items-start">
            <h2 class="font-['EB_Garamond'] text-2xl font-medium text-on-surface" style=""><?= $movie_card_name ?></h2>
            <span class="font-['Epilogue'] text-[10px] font-bold border border-neutral-700 px-2 py-0.5 text-neutral-500" style=""><?= $movie_card_year ?></span>
        </div>
        <p class="font-['Epilogue'] text-xs uppercase tracking-widest text-[#B31E24] font-semibold" style=""><?= $movie_card_director ?></p>
        <div class="pt-2 flex gap-4 text-neutral-500 font-['Epilogue'] text-[10px] uppercase tracking-tighter">
            <span class="" style=""><?= $movie_card_genre ?></span>
            <span class="" style=""><?= $movie_card_minutes ?> MIN</span>
        </div>
    </div>
</div>