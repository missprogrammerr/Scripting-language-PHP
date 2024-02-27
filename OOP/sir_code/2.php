<?php
class Person{
    //attribute
    protected $name,$address,$phone;

    //methods
    function setData($name,$address,$phone){
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

    function getData(){
        return get_object_vars($this);
    }

    function __construct($name,$address,$phone){
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }

}

?>
