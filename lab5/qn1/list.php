<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data List</title>
</head>
<body>
    <?php
    try{
        $conn = mysqli_connect('127.0.0.1','root','','test_db');
        $sql = "select * from data";
        mysqli_query($conn,$sql);
        $res = mysqli_query($conn,$sql);
        $data = [];
        if(mysqli_num_rows($res) > 0){
            while ($row  = mysqli_fetch_assoc($res)) {
                array_push($data,$row);
            }
        }else{
            echo 'Data not found';
        }
    }catch(Exception $ex){
        die('Database Error:' . $ex->getMessage());
    }
    ?>
    <h3>Data List</h3>
    <table border="1">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Status</th>
            <th>Image</th>
            <th>Created By</th>
            <th>Created At</th>
            <th>Updated By</th>
            <th>Updated At</th>
            <th>Actions</th>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $info){
            echo '<tr>';
            echo '<td>'.$info['id'].'</td>';
            echo '<td>'.$info['name'].'</td>';
            echo '<td>'.$info['rank'].'</td>';
            echo '<td>'.$info['status'].'</td>';
            echo '<td>'.$info['image'].'</td>';
            echo '<td>'.$info['created_by'].'</td>';
            echo '<td>'.$info['created_at'].'</td>';
            echo '<td>'.$info['updated_by'].'</td>';
            echo '<td>'.$info['updated_at'].'</td>';
            echo '<td>';
            echo '<a href="update.php?id='.$info['id'].'">Update</a>';
            echo '<a href="delete.php?id='.$info['id'].'" onclick="return confirm(\'Are you sure?\')">Delete</a>';
            echo '</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
</body>
</html>