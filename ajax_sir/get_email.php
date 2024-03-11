<?php
$email  = $_POST['email'];
try{
    $connection = new mysqli('localhost','root','','db_pascal_bca_2078_web');
    //query to create table
    $sql = "select email from tbl_registers where email='$email'";
    $res = mysqli_query($connection,$sql);
    //check number of rows
    if(mysqli_num_rows($res) == 1){
       echo "Email already exists";
    } else {
       echo "Email do not exists";
    }
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}

?>

