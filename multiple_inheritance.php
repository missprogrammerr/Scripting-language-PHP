<?php
class Movie{
  private $name;
  function __construct($name){
    $this->name = $name;
  }
  function printName(){
    echo "The movie name is ".$this->name;
  }
}

interface Song{
  public function songName();
}

class MainClass extends Movie implements Song{
  public function songName(){
    echo "The song name is Aaj ke baad";
  }
}

$obj = new MainClass("Satyaprem Ki Katha");
$obj->songName();
?>
