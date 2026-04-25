<?php
    $event_small_id = $event_small_id ?? -1;
    $event_small_date = $event_small_date ?? "No Date";
    $event_small_name = $event_small_name ?? "No Name";
    $event_small_location = $event_small_location ?? "No Location";
    $event_small_is_special = $event_small_is_special ?? false;

    $event_small_div_class = $event_small_is_special ? "bg-primary-container" : "bg-surface-container-lowest";
    $event_small_span_class = $event_small_is_special ? "text-white/80" : "text-primary-container";
    $event_small_h3_class = $event_small_is_special ? "text-white" : "";
    $event_small_span2_class = $event_small_is_special ? "text-white/80" : "";
?>

<div class="<?= $event_small_div_class ?> p-8 flex flex-col justify-between group cursor-pointer" onclick="this.querySelector('form').submit()">
    <form class="hidden" action="/event.php"><input type="hidden" name="event_id" value="<?= $event_small_id ?>"></form>
    <div>
        <span class="<?= $event_small_span_class ?> font-body text-xs font-bold uppercase tracking-tighter mb-2 block"><?= $event_small_date ?></span>
        <h3 class="text-2xl font-medium <?= $event_small_h3_class ?>"><?= $event_small_name ?></h3>
    </div>
    <div class="mt-4 flex items-center gap-2 text-tertiary group-hover:text-white transition-colors">
        <span class="material-symbols-outlined text-sm <?= $event_small_span2_class ?>">location_on</span>
        <span class="font-body text-xs uppercase tracking-widest <?= $event_small_span2_class ?>"><?= $event_small_location ?></span>
    </div>
</div>