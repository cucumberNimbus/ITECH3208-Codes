<?php

declare(strict_types=1);

function show_product_name(object $pdo, int $prod_id)
{
    $result = get_prod_detail($pdo, $prod_id);
    echo $result['prod_name'];
}

function show_prod_image(object $pdo, int $prod_id)
{
    $result = get_prod_detail($pdo, $prod_id);
    echo '<img src='. $result ['prod_image_location']. '>';
}

function show_prod_description(object $pdo, int $prod_id)
{
    $result = get_prod_detail($pdo, $prod_id);
    echo $result['prod_description'];
}

function show_prod_price(object $pdo, int $prod_id)
{
    $result = get_prod_detail($pdo, $prod_id);
    echo $result['prod_price'];
}

