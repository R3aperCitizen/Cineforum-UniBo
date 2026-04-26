<?php
    $movie_id = $movie_id ?? -1;
    $movie_name = $movie_name ?? "";
    $movie_description = $movie_description ?? "";
    $movie_date = $movie_date ?? "";
    $movie_director = $movie_director ?? "";
    $movie_duration = $movie_duration ?? 0;
    $movie_rating = $movie_rating ?? 0;
    $movie_genre = $movie_genre ?? "";
?>

<tr class="hover:bg-surface-container-lowest transition-colors">
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $movie_id ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $movie_name ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary"><?= $movie_director ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary"><?= $movie_date ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary"><?= $movie_genre ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center"><?= $movie_rating ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm">
        <div class="flex justify-end gap-3">
            <form id="edit_movie" class="hidden" action="/actions/admin_movie_edit.php"><input type="hidden" name="movie_id" value="<?= $movie_id ?>"></form>
            <button type="submit" form="edit_movie" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">Modifica</button>
            <form id="delete_movie" class="hidden" action="/actions/admin_movie_delete.php"><input type="hidden" name="movie_id" value="<?= $movie_id ?>"></form>
            <button type="submit" form="delete_movie" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">Elimina</button>
        </div>
    </td>
</tr>