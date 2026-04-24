<?php
    $event_id = $event_id ?? -1;
    $event_name = $event_name ?? "";
    $event_description = $event_description ?? "";
    $event_date = $event_date ?? "";
?>

<div class="grid grid-cols-1 md:grid-cols-4 py-8 border-b border-neutral-800 cursor-pointer" onclick="this.querySelector('form').submit()">
    <span class="font-['Epilogue'] text-sm font-bold text-primary-container uppercase tracking-widest py-1"><?= $event_date ?></span>
    <form class="hidden" action="/event.php"><input type="hidden" name="event_id" value="<?= $event_id ?>"></form>
    <div class="md:col-span-3">
        <h4 class="text-2xl mb-2 text-[#000000]"><?= $event_name ?></h4>
        <p class="text-neutral-400 text-sm font-['Epilogue']"><?= $event_description ?></p>
    </div>
</div>