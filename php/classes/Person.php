<?php
class Person {
private $name;
private $lastname;
private $age;
private $hp;
private $mother;
private $father;

function __construct($name, $lastname, $age, $mother = null, $father = null) {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
}
function sayHi($name) {
    return "Hi $name, I'm ".$this->name;
}
function setHp($hp) {
    if ($this->hp + $hp >= 100) {
        $this->hp = 100;
    } else {
        $this->hp = $this->hp + $hp;
    }
}
function getHp() {
    return $this->hp;
}
function getName () {
    return $this->name;
}
function getLastname () {
    return $this->lastname;
}
function getAge () {
    return $this->age;
}
function getMother() {
    return $this->mother;
}
function getFather() {
    return $this->father;
}
function getInfo() {
    return 
    "<h3>A few words about myself: </h3><br>".
    "My name is ".$this->getName()." ".$this->getLastname().", i'm ".$this->getAge()." years old and I love pizza SO MUCH!".
    "<br> My father is ".$this->getFather()->getName()." ".$this->getFather()->getLastname().", he is ".$this->getFather()->getAge()." years old".
    "<br> My mother is ".$this->getMother()->getName()." ".$this->getMother()->getLastname().", she is ".$this->getMother()->getAge()." years old.".

    "<br> My grandmother on the father's side is ".$this->getFather()->getMother()->getName()." ".$this->getFather()->getMother()->getLastname().", she is ".$this->getFather()->getMother()->getAge()." years old.".
    "<br> My grandfather on the father's side is ".$this->getFather()->getFather()->getName()." ".$this->getFather()->getFather()->getLastname().", he is ".$this->getFather()->getFather()->getAge()." years old.".

    "<br> My grandmother on the mother's side is ".$this->getMother()->getMother()->getName()." ".$this->getMother()->getMother()->getLastname().", she is ".$this->getMother()->getMother()->getAge()." years old.".
    "<br> My grandfather on the mother's side is ".$this->getMother()->getFather()->getName()." ".$this->getMother()->getFather()->getLastname().", he is ".$this->getMother()->getFather()->getAge()." years old."
    ;
}

}
// Здоровье человека не может быть выше 100 условных едениц
$igor = new Person("Igor", "Petrov", 68); // отец Ольги
$ira = new Person("Ira", "Petrova", 65); // мать Ольги

$vasya = new Person("Vasya", "Ivanov", 70); // отец Алекса
$sveta = new Person("Sveta", "Ivanova", 66); // мать Алекса

$alex = new Person("Alex", "Ivanov", 42, $sveta, $vasya); // муж
$olga = new Person("Olga", "Ivanova", 42, $ira, $igor);  // жена
$valera = new Person("Valera", "Ivanov", 15, $olga, $alex); // ребенок

// echo $valera->getName()."<br>";
// // echo $valera->mother->getName();  так выведет ошибку, так как мама приватная
// echo $valera->getMother()->getName()."<br>"; // Получаем Имя мамы Валеры
// echo $valera->getMother()->getFather()->getName(); // Получаем имя дедушки Валеры

echo $valera->getInfo();

// $igor = new Person("Igor", "Petrov", 38);
// echo $alex->sayHi($igor->name);
// $alex->name = "Alex";
// echo $alex->name;



// $medKit = 50;

// $alex->setHp(-30);  // упал
// echo $alex->getHp()."<br>";
// $alex->setHp($medKit);
// echo $alex->getHp();


?>