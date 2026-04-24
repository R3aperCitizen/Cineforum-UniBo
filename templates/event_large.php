<?php
    $card_image = $card_image ?? "";
    $card_name = $card_name ?? "No Name";
    $card_year = $card_year ?? "????";
    $card_director = $card_director ?? "No Director";
    $card_genre = $card_genre ?? "No Genre";
    $card_minutes = $card_minutes ?? "??";
?>

<div class="md:col-span-2 md:row-span-2 bg-surface-container-lowest group cursor-pointer">
    <div class="h-80 overflow-hidden">
        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="">
    </div>
    <div class="p-8">
        <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"></span>
        <h3 class="text-3xl font-medium mb-4"></h3>
        <p class="text-tertiary font-body text-sm leading-relaxed line-clamp-2"></p>
    </div>
</div>