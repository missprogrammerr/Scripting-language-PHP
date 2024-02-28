<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
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
                    $sql = "insert into users
                    (name, gender, email, password, phone, country) values ('$name', '$gender', '$email', '$password', '$phone', '$country')";
                    mysqli_query($conn,$sql);
                    echo "<h3>User added!</h3>";
                }catch(Exception $ex){
                    die('Database Error:' . $ex->getMessage());
                }
            }
        }
    ?>

    <form action="<?php echo $_SERVER['SELF'];?>" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>">
        <span><?php echo isset($err_name) ? $err_name:''; ?></span>
        <br/>

        <div class="gender">
            <label>Gender:</label><br/>
            <input type="radio" name="gender" value="male" id="male" <?php if(isset($_POST['gender']) && $_POST['gender']=="male") echo "checked"; ?>>
            <label for="male">Male</label>
            <input type="radio" name="gender" value="female" id="female" <?php if(isset($_POST['gender']) && $_POST['gender']=="female") echo "checked"; ?>>
            <label for="female">Female</label>
            <input type="radio" name="gender" value="other" id="other" <?php if(isset($_POST['gender']) && $_POST['gender']=="other") echo "checked"; ?>>
            <label for="other">Other</label>
            <br/>
            <span><?php echo isset($err_gender) ? $err_gender:''; ?></span>
        </div>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>">
        <span><?php echo isset($err_email) ? $err_email:''; ?></span>
        <br/>

        <label for="password" name="password">Password:</label>
        <input type="password" name="password" id="password"/>
        <span class="error"><?php echo isset($err_password) ? $err_password:''; ?></span>
        <br/>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
        <span><?php echo isset($err_phone) ? $err_phone:''; ?></span>
        <br/>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="" disabled <?php if (empty($country)) echo "selected"; ?>>Select your country</option>
            <option value="Nepal" <?php if ($country === "Nepal") echo "selected"; ?>>Nepal</option>
            <option value="India" <?php if ($country === "India") echo "selected"; ?>>India</option>
            <option value="Bangladesh" <?php if ($country === "Bangladesh") echo "selected"; ?>>Bangladesh</option>
        </select>
        <span><?php echo isset($err_country) ? $err_country:''; ?></span>
        <br/><br/>
        <button type="submit">Submit</button>
    </form>

</body>
</html>



<!-- Create User Registration form with following information

-id
-name
-email
-password
-phone
-country
-gender

*  Insert user using form
* List all record into table 
* Delete record using user id
* Update record using user id and form -->

