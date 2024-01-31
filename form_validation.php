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
        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="checkbox"] {
            margin-bottom: 20px;
        }
        .checkbox-container {
            display: inline-flex;
            margin-bottom: 20px;
            width: 180px;
        }
        .checkbox-container label {
            margin-bottom: 0;
            margin-left: 0px;
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
        $name = $email = $phone = $address = $username = $country = '';
        $terms = false;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['name']) && !empty(trim($_POST['name']))){
                $name = trim($_POST['name']);
                if(!preg_match("/^([A-Z][a-z\s]+)+$/",$name)){
                    $err_name = "Invalid Name";
                }
            }else{
                $err_name = "Please enter name.";
            }

            if(isset($_POST['email']) && !empty(trim($_POST['email']))){
                $email = trim($_POST['email']);
                if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/",$email)){
                    $err_email = "Invalid Email";
                }
            }else{
                $err_email = "Please enter email.";
            }

            if(isset($_POST['phone']) && !empty(trim($_POST['phone']))){
                $phone = trim($_POST['phone']);
                if(!preg_match("/^98\d{8}$/",$phone)){
                    $err_phone = "Invalid Phone";
                }
            }else{
                $err_phone = "Please enter phone.";
            }

            if(isset($_POST['address']) && !empty(trim($_POST['address']))){
                $address = trim($_POST['address']);
            }else{
                $err_address = "Please enter address.";
            }

            if(isset($_POST['username']) && !empty(trim($_POST['username']))){
                $username = trim($_POST['username']);
                $lowercase = preg_match('/[a-z]/', $username);
                $number = preg_match('/[0-9]/', $username);
                if(!$lowercase || !$number){
                  $err_username = 'Invalid username';
                }
            }else{
                $err_username = 'Please enter username.';
            }

            if(isset($_POST['country'])){
                $country = $_POST['country'];
            }else{
                $err_country = "Please select country.";
            }

            if(isset($_POST['terms'])){
                $terms = true;
            }else{
                $err_terms = "Please agree terms and conditions.";
            }

        }
    ?>

    <form action="#" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $name;?>">
        <span><?php echo isset($err_name) ? $err_name:''; ?></span>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>">
        <span><?php echo isset($err_email) ? $err_email:''; ?></span>

        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone;?>">
        <span><?php echo isset($err_phone) ? $err_phone:''; ?></span>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $address;?>">
        <span><?php echo isset($err_address) ? $err_address:''; ?></span>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $username;?>">
        <span><?php echo isset($err_username) ? $err_username:''; ?></span>

        <label for="country">Country:</label>
        <select id="country" name="country">
            <option value="" disabled <?php if (empty($country)) echo "selected"; ?>>Select your country</option>
            <option value="Nepal" <?php if ($country === "Nepal") echo "selected"; ?>>Nepal</option>
            <option value="India" <?php if ($country === "India") echo "selected"; ?>>India</option>
            <option value="Bangladesh" <?php if ($country === "Bangladesh") echo "selected"; ?>>Bangladesh</option>
        </select>
        <span><?php echo isset($err_country) ? $err_country:''; ?></span>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" accept="image/*">

        <div class="checkbox-container">
            <input type="checkbox" id="terms" name="terms" <?php if ($terms) echo "checked"; ?>>
            <label for="terms">I agree to the terms and conditions</label>
            <span><?php echo isset($err_terms) ? $err_terms:''; ?></span>
        </div>
        <br/>


        <button type="submit">Submit</button>
    </form>

</body>
</html>
