<?php
    $filter_selected = "text-on-surface group-hover:text-[#B31E24]";
    $filter_unselected = "text-neutral-500 group-hover:text-on-surface";

    $_SERVER["PHP_SELF"];

    $filter_isSelected = $filter_isSelected ?? false;
    $filter_name = $filter_name ?? "No Name";
    $filter_count = $filter_count ?? 0;
?>

<li class="flex items-center justify-between group cursor-pointer">
    <form>
         <input type="hidden" id="custId" name="custId" value="3487">
         <span class="<?= $filter_isSelected ? $filter_selected : $filter_unselected ?> transition-colors"><?= $filter_name ?></span>
         <span class="text-neutral-600 text-[10px] font-bold"><?= $filter_count ?></span>
    </form>
</li>