<?php
class Student{
    static $counter=0;

    function __construct(){
        self::$counter++;
    }

    static function printCounter(){
        echo  self::$counter;
    }
}

$ram = new Student();
Student::printCounter();

$hari = new Student();
Student::printCounter();

$gita = new Student();
Student::printCounter();

?>

