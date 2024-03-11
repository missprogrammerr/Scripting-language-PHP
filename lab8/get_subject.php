<?php
$id  = $_POST['semester_id'];
try{
    $connection = new mysqli('localhost','root','','test_db');
    //query to create table
    $sql = "select * from subjects where sem_id=$id";
    $res = mysqli_query($connection,$sql);
    $sub_list = [];
    if(mysqli_num_rows($res) > 0){
        while ($row  = mysqli_fetch_assoc($res)) {
            array_push($sub_list,$row['course']);
        }
    }else{
        echo 'Data not found';
    }

    foreach($sub_list as $sub){
        echo '<li>'.$sub.'</li>';
    }

}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}

?>

