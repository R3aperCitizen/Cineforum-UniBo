<?php
    $event_small_id = $event_small_id ?? -1;
    $event_small_date = $event_small_date ?? "No Date";
    $event_small_name = $event_small_name ?? "No Name";
    $event_small_location = $event_small_location ?? "No Location";
?>

<div class="bg-surface-container-lowest p-8 flex flex-col justify-between group cursor-pointer">
    <div>
        <span class="text-primary-container font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= $event_small_date ?></span>
        <h3 class="text-2xl font-medium"><?= $event_small_name ?></h3>
    </div>
    <div class="mt-4 flex items-center gap-2 text-tertiary group-hover:text-white transition-colors">
        <span class="material-symbols-outlined text-sm">location_on</span>
        <span class="font-body text-xs uppercase tracking-widest"><?= $event_small_location ?></span>
    </div>
</div>