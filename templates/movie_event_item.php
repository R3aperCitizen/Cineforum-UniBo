<?php
    $event_id = $event_id ?? 0;
    $event_name = $event_name ?? "";
    $event_description = $event_description ?? "";
    $event_date = $event_date ?? "";
?>

<div class="grid grid-cols-1 md:grid-cols-4 py-8 border-b border-neutral-800">
    <span class="font-['Epilogue'] text-sm font-bold text-primary-container uppercase tracking-widest py-1"><?= $event_date ?></span>
    <div class="md:col-span-3">
        <h4 class="text-2xl mb-2 text-[#000000]"><?= $event_name ?></h4>
        <p class="text-neutral-400 text-sm font-['Epilogue']"><?= $event_description ?></p>
    </div>
</div>