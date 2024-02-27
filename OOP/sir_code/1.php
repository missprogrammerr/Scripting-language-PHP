<ul>
        <li>Class</li>
        <li>Object</li>
        <li>Field/Attribute</li>
        <li>Encapsulation</li>
        <li>Method</li>
        <li>Constructor and Destructor</li>
    </ul>
<?php
class Person{
    //attribute
    private $name,$address,$phone;

    //methods
    function sayHello(){
        echo "Hello from " . $this->name;
    }

    function setField($attribute,$value){
        $this->$attribute = $value;
    }

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

    function __destruct(){
        echo "I am done";
    }

    /*function setName($name){
        $this->name =  $name;
    }

    function setAddress($address){
        $this->address =  $address;
    }

    function setPhone($phone){
        $this->phone =  $phone;
    }*/
}

$sangam = new Person('Sangam Subedi','Patan',98555555);
// $sangam->setData('Sangam Subedi','Patan',98555555);
$data = $sangam->getData();
print_r($data);
unset($sangam);
$jangam = new Person('Jangam Subedi','Patan',98555555);
print_r($data);


?>
