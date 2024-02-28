<?php
abstract class CRUD{
    function connectDatabase(){
        echo "Database connection";
    }
    abstract function saveRecord();
    abstract function listRecord();
    abstract function updateRecord();
    abstract function deleteRecord();
}

class Student extends CRUD{
    function saveRecord(){
        echo "Save new student";
    }

    function listRecord(){
        echo "List all student";
    }

    function updateRecord(){
        echo "Update old student";
    }

    function deleteRecord(){
        echo "Delete old student"; 
    }
}

class Teacher extends CRUD{
    function saveRecord(){
        echo "Save new teacher";
    }

    function listRecord(){
        echo "List all teacher";
    }

    function updateRecord(){
        echo "Update old teacher";
    }

    function deleteRecord(){
        echo "Delete old teacher"; 
    }
}

?>

