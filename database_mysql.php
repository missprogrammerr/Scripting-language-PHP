<?php
    // 1. Procedural Oriented
    // 2. Object Oriented 
    // 3. PDO

    try{
        $connection = mysqli_connect('127.0.0.1', 'root', '');
        //$connection->new mysqli('localhost', 'root', '');

        // $sql = 'CREATE DATABASE astrasecurity';
        // mysqli_query($connection, $sql);
        //$connection->query($sql);
        // echo 'Database created!';

        mysqli_select_db($connection, 'astrasecurity');
        //$connection->select_db('astrasecurity');

        $sql = "CREATE TABLE users (
            id int not null primary key auto_increment,
            username varchar(50) not null,
            password varchar(50) not null
        )";

        mysqli_query($connection, $sql);
        echo 'Table created!';

    }catch(Exception $ex){
        die('Database error: '.$ex->getMessage());
    }
?>