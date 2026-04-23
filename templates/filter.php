<?php
    $filter_selected = "text-on-surface group-hover:text-[#B31E24]";
    $filter_unselected = "text-neutral-500 group-hover:text-on-surface";
    $filter_isSelected = $filter_isSelected ?? false;

    $filter_uri = $filter_uri ?? "";
    $filter_id = $filter_id ?? "";
    
    $filter_name = $filter_name ?? "No Name";
    $filter_count = $filter_count ?? 0;
?>

<form action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="hidden" name="<?= $filter_uri ?>" value="<?= $filter_id ?>">
    <li class="flex items-center justify-between group cursor-pointer">
        <span class="<?= $filter_isSelected ? $filter_selected : $filter_unselected ?> transition-colors"><?= $filter_name ?></span>
        <span class="text-neutral-600 text-[10px] font-bold"><?= $filter_count ?></span>
    </li>
</form>