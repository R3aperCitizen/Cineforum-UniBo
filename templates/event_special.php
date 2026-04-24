<?php
    $event_special_id = $event_special_id ?? -1;
    $event_special_name = $event_special_name ?? "No Name";
?>

<div class="bg-primary-container p-8 flex flex-col justify-between group cursor-pointer" onclick="this.querySelector('form').submit()">
    <form class="hidden" action="/event.php"><input type="hidden" name="event_id" value="<?= $event_special_id ?>"></form>
    <div>
        <span class="text-white/80 font-body text-xs font-bold uppercase tracking-tighter mb-2 block">Special Event</span>
        <h3 class="text-2xl font-medium text-white"><?= $event_special_name ?></h3>
    </div>
    <div class="mt-4">
        <span class="material-symbols-outlined text-white">arrow_forward</span>
    </div>
</div>