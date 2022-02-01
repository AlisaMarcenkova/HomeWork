<?php

class Person{
    private string $name;
    private string $surname;
    private string $id;

    public function __construct(string $name, string $surname, int $id){
        $this->name = $name;
        $this->surname = $surname;
        $this->id = $id;
    }
    public function getName(){
        return $this->name;
    }
    public function getSurname(){
        return $this->surname;
    }
    public function getId(){
        return $this->id;
    }
}

class Registry {
    private array $persons = [];

    public function addToList(Person $person): void{
        $this->persons[] = $person;
    }

    public function getPersons(): array{
        return $this->persons;
    }
}
$registry = new Registry();

while (true) {
    echo "[1] Add Person to the registry: " . PHP_EOL;
    echo "[2] Show the list of persons: " . PHP_EOL;
    echo "[X] Exit: " . PHP_EOL;

    $select = readline("Select an option: ") . PHP_EOL;

    switch ($select){

        case 1:
            $name = readline('Enter the first name: ');
            $surname = readline('Enter the last name: ');
            $id = (int) readline('Enter id: ');
            $registry->addToList(new Person($name, $surname, $id));
            break;

        case 2:
            foreach ($registry->getPersons() as $key => $person) {
                echo $person->getName() . " " . $person->getSurname() . " " . $person->getId() . PHP_EOL;
                // var_dump($person);
            }break;

        default:
            exit;
    }
}