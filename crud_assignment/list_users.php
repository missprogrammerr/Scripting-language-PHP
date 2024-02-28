<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>
    <?php
    try{
        $conn = mysqli_connect('127.0.0.1','root','','test_db');
        $sql = "select * from users";
        mysqli_query($conn,$sql);
        $res = mysqli_query($conn,$sql);
        $users = [];
        if(mysqli_num_rows($res) > 0){
            while ($row  = mysqli_fetch_assoc($res)) {
                array_push($users,$row);
            }
        }else{
            echo 'Data not found';
        }
    }catch(Exception $ex){
        die('Database Error:' . $ex->getMessage());
    }
    ?>
    <h3>Users List</h3>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Country</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($users as $key => $user){
            echo '<tr>';
            echo '<td>'.$user['id'].'</td>';
            echo '<td>'.$user['name'].'</td>';
            echo '<td>'.$user['gender'].'</td>';
            echo '<td>'.$user['email'].'</td>';
            echo '<td>'.$user['password'].'</td>';
            echo '<td>'.$user['phone'].'</td>';
            echo '<td>'.$user['country'].'</td>';
            echo '<td>';
            echo '<a href="update_user.php?id='.$user['id'].'">Update</a>';
            echo '<a href="delete_user.php?id='.$user['id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</body>
</html>