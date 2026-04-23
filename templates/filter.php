<?php
    $filter_name = $filter_name ?? "No Name";
    $filter_count = $filter_count ?? 0;
?>

<li class="flex items-center justify-between group cursor-pointer">
    <span class="text-on-surface group-hover:text-[#B31E24] transition-colors"><?= $filter_name ?></span>
    <span class="text-neutral-600 text-[10px] font-bold"><?= $filter_count ?></span>
</li>