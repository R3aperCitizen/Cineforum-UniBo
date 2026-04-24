<?php
    $event_tall_id = $event_tall_id ?? -1;
    $event_tall_image = $event_tall_image ?? "";
    $event_tall_date = $event_tall_date ?? "No Date";
    $event_tall_name = $event_tall_name ?? "No Name";
    $event_tall_description = $event_tall_description ?? "No Description";
?>

<div class="md:row-span-2 bg-surface-container-lowest group cursor-pointer">
    <div class="h-[450px] overflow-hidden">
        <img alt="<?= $event_tall_name ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="<?= $event_tall_image ?>">
    </div>
    <div class="p-8">
        <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= $event_tall_date ?></span>
        <h3 class="text-2xl font-medium mb-4"><?= $event_tall_name ?></h3>
        <p class="text-tertiary font-body text-sm leading-relaxed"><?= $event_tall_description ?></p>
    </div>
</div>