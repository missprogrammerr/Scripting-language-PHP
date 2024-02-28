<?php
$id = $_GET['id'];
$name = $email = $phone = $password = $gender = $country = '';
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
        if(isset($_POST['gender']) && !empty(trim($_POST['gender']))){
            $gender = $_POST['gender'];
        }else{
            $err_gender = "Please select a gender.";
            $error = true;
        }
        if(isset($_POST['email']) && !empty(trim($_POST['email']))){
            $email = trim($_POST['email']);
            if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email)){
                $err_email = "Invalid Email";
            }
        }else{
            $err_email = "Please enter email.";
            $error = true;
        }
        if(isset($_POST['password']) && empty(trim($_POST['password']))){
            $err_password = 'Please enter password';
            $error = true;
        }else{
            $password = trim($_POST['password']);
        }
        if(isset($_POST['phone']) && !empty(trim($_POST['phone']))){
            $phone = trim($_POST['phone']);
            if(!preg_match("/^98\d{8}$/",$phone)){
                $err_phone = "Invalid Phone";
            }
        }else{
            $err_phone = "Please enter phone.";
            $error = true;
        }
        if(isset($_POST['country'])){
            $country = $_POST['country'];
        }else{
            $err_country = "Please select country.";
            $error = true;
        }
        if(!$error){
            try{
                $conn = mysqli_connect('127.0.0.1','root','','test_db');
                $sql = "update users set name='$name', gender='$gender', email='$email', password='$password', phone='$phone', country='$country' where id=$id";
                mysqli_query($conn,$sql);
                header("Location: list_users.php");
            }catch(Exception $ex){
                 die('Database Error:' . $ex->getMessage());
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
<?php
    $id = $_GET['id'];
    try{
        $conn = mysqli_connect('127.0.0.1','root','','test_db');
        $sql = "select * from users where id=$id";
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
    <form action="<?php echo $_SERVER['SELF'];?>" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['name'];?>">
        <span><?php echo isset($err_name) ? $err_name:''; ?></span>
        <br/>

        <div class="gender">
            <label>Gender:</label><br/>
            <input type="radio" name="gender" value="male" id="male" <?php if($row['gender'] && $row['gender']==="male") echo "checked"; ?>>
            <label for="male">Male</label>
            <input type="radio" name="gender" value="female" id="female" <?php if($row['gender'] && $row['gender']==="female") echo "checked"; ?>>
            <label for="female">Female</label>
            <input type="radio" name="gender" value="other" id="other" <?php if($row['gender'] && $row['gender']==="other") echo "checked"; ?>>
            <label for="other">Other</label>
            <br/>
            <span><?php echo isset($err_gender) ? $err_gender:''; ?></span>
        </div>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $row['email'];?>">
        <span><?php echo isset($err_email) ? $err_email:''; ?></span>
        <br/>

        <label for="password" name="password">Password:</label>
        <input type="password" name="password" id="password" value="<?php echo $row['password'];?>"/>
        <span class="error"><?php echo isset($err_password) ? $err_password:''; ?></span>
        <br/>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $row['phone'];?>">
        <span><?php echo isset($err_phone) ? $err_phone:''; ?></span>
        <br/>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="" disabled <?php if (empty($row['country'])) echo "selected"; ?>>Select your country</option>
            <option value="Nepal" <?php if ($row['country'] === "Nepal") echo "selected"; ?>>Nepal</option>
            <option value="India" <?php if ($row['country'] === "India") echo "selected"; ?>>India</option>
            <option value="Bangladesh" <?php if ($row['country'] === "Bangladesh") echo "selected"; ?>>Bangladesh</option>
        </select>
        <span><?php echo isset($err_country) ? $err_country:''; ?></span>
        <br/><br/>
        <button type="submit">Update</button>
    </form>
    
</body>
</html>