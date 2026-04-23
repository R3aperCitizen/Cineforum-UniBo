<?php
    $card_image = $card_image ?? "";
    $card_name = $card_name ?? "No Name";
    $card_year = $card_year ?? "????";
    $card_director = $card_director ?? "No Director";
    $card_genre = $card_genre ?? "No Genre";
    $card_minutes = $card_minutes ?? "??";
?>

<div class="group">
    <div class="relative aspect-[2/3] overflow-hidden bg-surface-container-lowest mb-6">
        <img alt="<?= $card_name ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 scale-100 group-hover:scale-105" src="<?= $card_image ?>" style=""/>
        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-6">
            <button class="w-full bg-white text-black py-3 text-xs font-bold uppercase tracking-widest" style="">View Details</button>
        </div>
    </div>
    <div class="space-y-2">
        <div class="flex justify-between items-start">
            <h2 class="font-['EB_Garamond'] text-2xl font-medium text-on-surface" style=""><?= $card_name ?></h2>
            <span class="font-['Epilogue'] text-[10px] font-bold border border-neutral-700 px-2 py-0.5 text-neutral-500" style=""><?= $card_year ?></span>
        </div>
        <p class="font-['Epilogue'] text-xs uppercase tracking-widest text-[#B31E24] font-semibold" style=""><?= $card_director ?></p>
        <div class="pt-2 flex gap-4 text-neutral-500 font-['Epilogue'] text-[10px] uppercase tracking-tighter">
            <span class="" style=""><?= $card_genre ?></span>
            <span class="" style=""><?= $card_minutes ?> MIN</span>
        </div>
    </div>
</div>