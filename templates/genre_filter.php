<?php
    $genre_filter["genre_name"] = $genre_filter["genre_name"] ?? "No Genre";
    $genre_filter["movie_count"] = $genre_filter["movie_count"] ?? 0;
?>

<li class="flex items-center justify-between group cursor-pointer">
    <span class="text-on-surface group-hover:text-[#B31E24] transition-colors"><?= $genre_filter["genre_name"] ?></span>
    <span class="text-neutral-600 text-[10px] font-bold"><?= $genre_filter["movie_count"] ?></span>
</li>