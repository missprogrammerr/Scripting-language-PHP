<?php
$id = $_GET['id'];
try{
    $conn = mysqli_connect('127.0.0.1','root','','test_db');
    $sql = "delete from data where id=$id";
    mysqli_query($conn,$sql);
    header('list.php');
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}
?>