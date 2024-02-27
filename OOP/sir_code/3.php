<pre>
    <?php
require_once "2.person.php";

class Student extends Person{
    private $roll,$semester,$program;
    
    function __construct($name,$address,$phone,$roll,$semester,$program){
        $this->roll = $roll;
        $this->semester = $semester;
        $this->program = $program;
        // call parent class constructor
        parent::__construct($name,$address,$phone);
    }

    function sayHello(){
        echo "Hello from " . $this->name;
    }
    
    //overriding
    function getData(){
        //call parent class method
        $data = parent::getData();
        $childdata = get_object_vars($this);
        return array_merge($data,$childdata);
    }
}

$sangam = new Student('Sangam Subedi','Patan',98545454,22,4,'BCA');
print_r($sangam);
$sangam->sayHello();
$d = $sangam->getData();
print_r($d);
?>
