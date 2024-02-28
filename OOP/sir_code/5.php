<?php
class Database{
    function connectDatabase(){
        echo "Database connection";
    }

    function disconnectDatabase(){
        echo "Database disconnect";
    }
}

interface CRUD{
    function saveRecord();
    function listRecord();
    function updateRecord();
    function deleteRecord();
}


interface Auth{
    function login();
    function register();
    function logout();
}
class Student extends Database implements CRUD,Auth{
    function login(){
        require_once "login.php";
    }

    function logout(){
        
    }

    function register(){
        
    }

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

class Teacher extends Database implements CRUD{
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

$ram = new Student();

$ram->login();

?>

