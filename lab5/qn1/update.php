<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }
        h3 {
            text-align: center;
            color: green;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        .gender label {
            display: inline;
            margin: 0;
            padding: 0;
        }
        .gender input {
            display: inline;
            margin: 0;
            padding: 0;
            width: 20px;
        }
        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 2px;
            box-sizing: border-box;
        }
        span {
            color: red;
        }
        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<?php
    $id = $_GET['id'];
    try{
        $conn = mysqli_connect('127.0.0.1','root','','test_db');
        $sql = "select * from data where id=$id";
        mysqli_query($conn,$sql);
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res) > 0){
            $row  = mysqli_fetch_assoc($res);
        }else{
            echo 'Data not found';
        }
    }catch(Exception $ex){
        die('Database Error:' . $ex->getMessage());
    }
?>

        <?php
        $id = $_GET['id'];
        $name = $rank = $status = $created_by = $updated_by = '';
        $error = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['name']) && !empty(trim($_POST['name']))){
                $name = trim($_POST['name']);
                if(!preg_match("/^([A-Z][a-z\s]+)+$/",$name)){
                    $err_name = "Invalid Name";
                }
            }else{
                $err_name = "Please enter name.";
                $error = true;
            }

            if(isset($_POST['rank']) && !empty(trim($_POST['rank']))){
                $rank = trim($_POST['rank']);
            }else{
                $err_rank = "Please enter rank.";
                $error = true;
            }

            if(isset($_POST['status']) && empty(trim($_POST['status']))){
                $err_status = 'Please enter status.';
                $error = true;
            }else{
                $status = trim($_POST['status']);
            }

            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                $image = $_FILES["image"]["name"];
            } else {
                $image = $row['image'];
            }

            if(isset($_POST['created_by']) && !empty(trim($_POST['created_by']))){
                $created_by = trim($_POST['created_by']);
            }else{
                $err_created_by = "Please enter creator name.";
                $error = true;
            }

            if(isset($_POST['updated_by']) && !empty(trim($_POST['updated_by']))){
                $updated_by = trim($_POST['updated_by']);
            }else{
                $err_updated_by = "Please enter updator name.";
                $error = true;
            }
        

            if(!$error){
                try{
                    date_default_timezone_set('Asia/Kathmandu');
                    $updated_at = date("Y-m-d H:i:s");
                    $conn = mysqli_connect('127.0.0.1','root','','test_db');
                    $sql = "update data set
                    name='$name', rank='$rank', status='$status', image='$image', created_by='$created_by', updated_by='$updated_by', updated_at = '$updated_at' where id=$id;";
                    mysqli_query($conn,$sql);
                    header('Location: list.php');
                }catch(Exception $ex){
                    die('Database Error:' . $ex->getMessage());
                }
            }else{
                echo "Error updating data.";
            }
        }
    ?>


    <form action="<?php echo $_SERVER['PHP_SELF'].'?id='.$row['id'];?>" method="post" enctype="multipart/form-data">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name'];?>">
        <span><?php echo isset($err_name) ? $err_name:''; ?></span>
        <br/>

        <label for="rank">Rank:</label>
        <input type="number" id="rank" name="rank" value="<?php echo $row['rank'];?>">
        <span><?php echo isset($err_rank) ? $err_rank:''; ?></span>
        <br/>

        <label for="status">Status:</label>
        <input type="text" id="status" name="status" value="<?php echo $row['status'];?>">
        <span><?php echo isset($err_status) ? $err_status:''; ?></span>
        <br/>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" onchange="updateFilename(this)">
        <input type="hidden" name="current_image_filename" value="<?php echo $row['image']; ?>">
        <span id="imageFilename"><?php echo $row['image']; ?></span>
        <span><?php echo isset($err_image) ? $err_image:''; ?></span>
        <br/>

        <label for="created_by">Created By:</label>
        <input type="text" id="created_by" name="created_by" value="<?php echo $row['created_by'];?>">
        <span><?php echo isset($err_created_by) ? $err_created_by:''; ?></span>
        <br/>

        <label for="updated_by">Updated By:</label>
        <input type="text" id="updated_by" name="updated_by" value="<?php echo $row['updated_by'];?>">
        <span><?php echo isset($err_updated_by) ? $err_updated_by:''; ?></span>
        <br/><br/>

        <button type="submit">Update</button>
    </form>

<script>
// JavaScript function to update the filename display when a file is selected
function updateFilename(input) {
    var filename = input.value.split('\\').pop(); // Get the filename from the full path
    document.getElementById('imageFilename').textContent = filename;
}
</script>

</body>
</html>

