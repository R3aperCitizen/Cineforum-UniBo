<?php
    $templates = [
        0 => 'templates/event_small.php',
        1 => 'templates/event_tall.php',
        2 => 'templates/event_large.php',
    ];

    $event_rand_id = $event_rand_id ?? -1;
    $event_rand_image = $event_rand_image ?? "";
    $event_rand_date = $event_rand_date ?? "No Date";
    $event_rand_name = $event_rand_name ?? "No Name";
    $event_rand_description = $event_rand_description ?? "No Description";
    $event_rand_location = $event_rand_location ?? "No Location";

    $event_large_id = $event_rand_id;
    $event_large_image = $event_rand_image;
    $event_large_date = $event_rand_date;
    $event_large_name = $event_rand_name;
    $event_large_description = $event_rand_description;

    $event_tall_id = $event_rand_id;
    $event_tall_image = $event_rand_image;
    $event_tall_date = $event_rand_date;
    $event_tall_name = $event_rand_name;
    $event_tall_description = $event_rand_description;

    $event_small_id = $event_rand_id;
    $event_small_date = $event_rand_date;
    $event_small_name = $event_rand_name;
    $event_small_location = $event_rand_location;

    $random = rand(0, count($templates) - 1);
    include $templates[$random];
?>