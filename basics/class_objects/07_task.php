<?php

class Dog{
    private string $name;
    private string $gender;
    private string $mother;
    private string $father;

    public function __construct($name, $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
    }
    public function getName(){
        return $this->name;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getMother($name){
        return $this->mother;
    }
    public function getFather(){
        return $this->father;
    }
}

class DogTest{
    private array $dogs = [];

    public function addToList(Dog $dog){
        $this->dogs[] = $dog;
    }
    public function getDogs(): array
    {
        return $this->dogs;
    }
}

$dogs = new DogTest();
$dogs->addToList(new Dog("Max", "male"));
$dogs->addToList(new Dog("Rocky", "male"));
$dogs->addToList(new Dog("Sparky", "male"));
$dogs->addToList(new Dog("Buster", "male"));
$dogs->addToList(new Dog("Sam", "male"));
$dogs->addToList(new Dog("Lady", "female"));
$dogs->addToList(new Dog("Molly", "female"));
$dogs->addToList(new Dog("Coco", "female"));

foreach ($dogs->getDogs() as $dog){
    echo $dog->getName() . " " . $dog->getGender();
    echo PHP_EOL;
}