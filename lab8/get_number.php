<?php
$number  = $_POST['number'];
try{
    $connection = new mysqli('localhost','root','','test_db');
    //query to create table
    $sql = "select number from phone_numbers where number='$number'";
    $res = mysqli_query($connection,$sql);
    //check number of rows
    if(mysqli_num_rows($res) == 1){
       echo "This number is not unique.";
    } else {
       echo "This number is unique.";
    }
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}

?>

