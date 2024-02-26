<?php
$id = $_GET['id'];
try{
    $connection = mysqli_connect('localhost','root','','db_pascal_2078_sl');
    //query to create table
    $sql = "delete from tbl_products where id=$id";
    mysqli_query($connection,$sql);
    echo "Product deleted";
    header('location:12.list_products.php');
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}
?>

