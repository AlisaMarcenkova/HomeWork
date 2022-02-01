<?php

$items = [
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

var_dump($items);
$human = $items[0][1];
echo $human['name'] . " " . $human['surname'] . " " . $human['age'] . PHP_EOL;