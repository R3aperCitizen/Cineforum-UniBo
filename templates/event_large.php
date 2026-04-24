<?php
    $event_large_id = $event_large_id ?? -1;
    $event_large_image = $event_large_image ?? "";
    $event_large_date = $event_large_date ?? "No Date";
    $event_large_name = $event_large_name ?? "No Name";
    $event_large_description = $event_large_description ?? "No Description";
?>

<div class="md:col-span-2 md:row-span-2 bg-surface-container-lowest group cursor-pointer">
    <div class="h-80 overflow-hidden">
        <img alt="<?= $event_large_name ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?= $event_large_image ?>">
    </div>
    <div class="p-8">
        <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= $event_large_date ?></span>
        <h3 class="text-3xl font-medium mb-4"><?= $event_large_name ?></h3>
        <p class="text-tertiary font-body text-sm leading-relaxed line-clamp-2"><?= $event_large_description ?></p>
    </div>
</div>