<?php
    $event_id = $event_id ?? -1;
    $event_name = $event_name ?? "";
    $event_description = $event_description ?? "";
    $event_date = $event_date ?? "";
    $event_location = $event_location ?? "";
    $event_capacity = $event_capacity ?? 0;
    $event_price = $event_price ?? 0;
    $event_special = $event_special ?? 0;

    $special_text = "NO";
    $special_bg = "bg-transparent";
    $special_text_color = "text-secondary";

    if ($event_special==1) {
        $special_text = "SI";
        $special_bg = "bg-primary-container";
        $special_text_color = "text-white";
    }
?>

<tr class="hover:bg-surface-container-lowest transition-colors">
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $event_id ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm font-medium"><?= $event_name ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary"><?= $event_date ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary"><?= $event_location ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center"><?= $event_price ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center"><?= $event_capacity ?></td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm text-secondary text-center">
        <span class="<?= $special_bg; ?> <?= $special_text_color; ?> px-2 py-1 text-sm uppercase tracking-widest rounded"><?= $special_text; ?></span>
    </td>
    <td class="px-6 py-4 font-['Epilogue'] text-sm">
        <div class="flex justify-end gap-3">
            <form action="/admin_event.php">
                <input type="hidden" name="action" value="update">
                <input type="hidden" name="event_id" value="<?= $event_id ?>">
                <input type="submit" value="Modifica" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">
            </form>
            <form action="/actions/admin_event_delete.php">
                <input type="hidden" name="event_id" value="<?= $event_id ?>">
                <input type="submit" value="Elimina" class="text-[#B31E24] hover:opacity-80 transition-opacity font-bold text-xs uppercase tracking-widest">
            </form>
        </div>
    </td>
</tr>