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
        if($name === "Max"){
            $this->mother = "Lady";
            $this->father = "Rocky";
        }elseif($name === "Rocky"){
            $this->mother = "Molly";
            $this->father = "Sam";
        }elseif($name === "Coco"){
            $this->mother = "Molly";
            $this->father = "Buster";
        }elseif($name === "Buster"){
            $this->mother = "Lady";
            $this->father = "Sparky";
        }else{
            $this->mother = "Unknown";
            $this->father = "Unknown";
        }
    }
    public function getName(){
        return $this->name;
    }
    public function getGender(){
        return $this->gender;
    }
    public function getMother(){
        return $this->mother;
    }
    public function getFather(){
        return $this->father;
    }
    public function hasSameMotherAs(Dog $dog): bool{
        if($this->mother === $dog->getMother()){
            return true;
        }
        return false;
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
    public function checkMotherMatch(Dog $dog): string
    {
        if($dog->hasSameMotherAs($dog) === true){
            return "True";
        }
        return "False";
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
    echo "[Name: " . $dog->getName() . "]; [Gender: " . $dog->getGender() . "]; [Mother: " . $dog->getMother() . "]; [Father: " . $dog->getFather() . "]";
    echo PHP_EOL;
    echo "------------------------------------------------------------------------------";
    echo PHP_EOL;
}
echo $dogs->checkMotherMatch($dog);
echo PHP_EOL;