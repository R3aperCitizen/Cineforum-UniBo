<?php
    $genre_id = $genre_id ?? -1;
    $genre_name = $genre_name ?? "";
?>

<tr class="hover:bg-surface-container-lowest transition-colors">
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $genre_id ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center"><?= $genre_name ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm">
        <div class="flex justify-end gap-3">
            <form action="/admin_genre.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="genre_id" value="<?= $genre_id ?>">
                <input type="submit" value="Modifica" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">
            </form>
            <form action="/actions/admin_genre_delete.php" method="POST">
                <input type="hidden" name="genre_id" value="<?= $genre_id ?>">
                <input type="submit" value="Elimina" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">
            </form>
        </div>
    </td>
</tr>