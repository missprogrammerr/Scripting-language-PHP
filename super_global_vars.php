<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h4>Example of $GLOBALS</h4>
    <?php
        $a = 556;
        $b = 200;
        function sum(){
            $GLOBALS['c']=$GLOBALS['a']+$GLOBALS['b'];
        }
        sum();
        echo "Sum of 566 and 200 is:".$c;
    ?>
    <h4>Request data:</h4>
    <?php
        print_r($_REQUEST); //print_r prints array's whole structure
    ?>
    <h4>Example of $_SESSION</h4>
    <?php
        session_start();
        $_SESSION['username'] = 'astra';
        print_r($_SESSION);
    ?>
    <h4>Example of $_COOKIE</h4>
    <?php
        setcookie('name','Scripting Language', time()+7*24*60*60);
        print_r($_COOKIE);
    ?>
    <h4>Example of $_SERVER</h4>
    <?php
        print_r($_SERVER);
        print_r($_SERVER['HTTP_HOST']);
    ?>
</body>
</html>