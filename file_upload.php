<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //error = 4 means file has not been choosen
        //error = 0  means file is choosen
        if($_FILES['profile_pic']['error'] == 0){
            $ftArray = ['image/jpeg', 'image/png', 'image/jpg'];
            if(in_array($_FILES['profile_pic']['type'], $ftArray)){
                if($_FILES['profile_pic']['size'] <= 510000){
                    if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], 'images/'.$_FILES['profile_pic']['name'])){
                        echo "Success";
                    }else{
                        $err_image = "Error uploading";
                    }
                }else{
                    $err_image = "File size invalid";
                }
            }else{
                $err_image = "Invalid file format";
            }
        }else{
            $err_image = "Please choose an image";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
        <label for="profile_pic">Upload profile pic</label>
        <input type="file" name="profile_pic" id="profile_pic">
        <br/>
        <span><?php echo isset($err_image)?$err_image:'';?></span>
        <br/><br/>
        <input type="submit" value="Upload image"/>
    </form>
</body>
</html>