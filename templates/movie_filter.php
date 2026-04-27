<?php
    $movie_filter_selected = "text-on-surface group-hover:text-[#B31E24]";
    $movie_filter_unselected = "text-neutral-500 group-hover:text-on-surface";
    $movie_filter_is_selected = $movie_filter_is_selected ?? false;

    $movie_filter_uri = $movie_filter_uri ?? "";
    $movie_filter_id = $movie_filter_id ?? "";
    
    $movie_filter_name = $movie_filter_name ?? "No Name";
    $movie_filter_count = $movie_filter_count ?? 0;
?>

<li class="flex items-center justify-between group cursor-pointer" onclick="this.querySelector('form').submit()">
    <form class="hidden">
        <?php if(!empty($movie_filter_uri)): ?>
            <input type="hidden" name="<?= $movie_filter_uri ?>" value="<?= $movie_filter_id ?>">
        <?php endif; ?>
    </form>
    <span class="<?= $movie_filter_is_selected ? $movie_filter_selected : $movie_filter_unselected ?> transition-colors"><?= $movie_filter_name ?></span>
    <span class="text-neutral-600 text-[10px] font-bold"><?= $movie_filter_count ?></span>
</li>