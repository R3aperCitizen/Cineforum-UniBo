<?php
    $genre_id = $genre_id ?? -1;
    $genre_name = $genre_name ?? "";
?>

<tr class="hover:bg-surface-container-lowest transition-colors">
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $genre_id ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center"><?= $genre_name ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm">
        <div class="flex justify-end gap-3">
            <button class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">Modifica</button>
            <button class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">Elimina</button>
        </div>
    </td>
</tr>