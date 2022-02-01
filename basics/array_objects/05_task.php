<?php

$itemList = [
[
    [
        "name" => "John",
        "surname" => "Doe",
        "age" => 50
    ],
    [
        "name" => "Jane",
        "surname" => "Doe",
        "age" => 41
    ]
        ]
];

echo $itemList[0][0]['name'] . " " . "&" . " " . $itemList[0][1]['name'] . " " . $itemList[0][1]['surname']."`s" . PHP_EOL;