<?php

$persons = [
    [
        [
            "name" => "Peter",
            "surname" => "Harrison",
            "age" => 50,
            "birthday" => date("17.09.1971")
        ],
        [
            "name" => "Jane",
            "surname" => "Parker",
            "age" => 41,
            "birthday" => date("13.06.1980")
        ],
        [
            "name" => "Ashley",
            "surname" => "McKern",
            "age" => 30,
            "birthday" => date("23.03.1991")
        ],
        [
            "name" => "Jim",
            "surname" => "Henderson",
            "age" => 28,
            "birthday" => date("25.05.1993")
        ]
    ]
];

foreach ($persons as $person){
    echo $person[0]['name'] . " " . $person[0]['surname'] . " " . $person[0]['age'] . " " . $person[0]['birthday'] . PHP_EOL;
    echo $person[1]['name'] . " " . $person[1]['surname'] . " " . $person[1]['age'] . " " . $person[1]['birthday'] . PHP_EOL;
    echo $person[2]['name'] . " " . $person[2]['surname'] . " " . $person[2]['age'] . " " . $person[2]['birthday'] . PHP_EOL;
    echo $person[3]['name'] . " " . $person[3]['surname'] . " " . $person[3]['age'] . " " . $person[3]['birthday'] . PHP_EOL;
}