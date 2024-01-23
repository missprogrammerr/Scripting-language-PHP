<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP variable types</h1>
    <?php
    function printType($a){
        echo gettype($a);
        echo '<br/>';
    }
    $var = 10;
    printType($var);
    $var = 10.5;
    printType($var);
    $var = true;
    printType($var);
    $var = 'Astra';
    printType($var);
    $var = [];
    printType($var);
    
    class Person {

    }
    $var = new Person();
    printType($var);
    $var = null;
    printType($var);
    $var = fopen('hello.php', 'r');
    printType($var);

    //removing variable
    unset($var);
    
    //define constant
    define("PI", 3.14);
    echo PI;
    echo '<br/>';
    //another way
    const hello = "Hello";
    echo hello;
    ?>
</body>
</html>