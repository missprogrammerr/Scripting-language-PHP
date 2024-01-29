<!DOCTYPE html>
<html lang="ne">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lok Sewa Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    form {
      width: 40%;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    label {
      display: block;
      margin-bottom: 8px;
    }
    input {
      width: 100%;
      padding: 8px;
      margin-bottom: 16px;
      box-sizing: border-box;
    }
    button {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    #err_fullname, #err_username, #err_password, #err_email {
      color: red;
      margin-top: 5px;
    }
  </style>
</head>
<body>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['fullName']) && empty(trim($_POST['fullName']))){
            $errFullname = 'Invalid Full Name';
        }else{
            $fullName = trim($_POST['fullName']);
            echo'Full Name is '.$fullName;
            echo '<br/>';
        }
        if(isset($_POST['username']) && empty(trim($_POST['username']))){
            $errUsername = 'Invalid Username';
        }else{
            $username = trim($_POST['username']);
            echo'Username is '.$username;
            echo '<br/>';
        }
        if(isset($_POST['email']) && empty(trim($_POST['email']))){
            $errEmail = 'Invalid email';
        }else{
            $email = trim($_POST['email']);
            echo'Email is '.$email;
            echo '<br/>';
        }
        if(isset($_POST['password']) && empty(trim($_POST['password']))){
            $errPassword = 'Invalid Password';
        }else{
            $password = trim($_POST['password']);
            echo'Password is '.$password;
            echo '<br/>';
        }
    }
?>

<form method="POST">
  <h2>लोक सेवा दर्ता गर्नुहोस्</h2>
  <label for="fullName">पुरा नाम:</label>
  <input type="text" id="fullName" name="fullName">
  <span id="err_fullname"><?php echo isset($errFullname) ? $errFullname:''; ?></span>

  <label for="username">प्रयोगकर्ता नाम:</label>
  <input type="text" id="username" name="username">
  <span id="err_username"><?php echo isset($errUsername) ? $errUsername:''; ?></span>

  <label for="email">ईमेल:</label>
  <input type="email" id="email" name="email">
  <span id="err_email"><?php echo isset($errEmail) ? $errEmail:''; ?></span>

  <label for="password">पासवर्ड:</label>
  <input type="password" id="password" name="password">
  <span id="err_password"><?php echo isset($errPassword) ? $errPassword:''; ?></span>

  <br /><br />
  <button type="submit" onclick="return validateForm()">दर्ता गर्नुहोस्</button>
  <div id="error-message" class="error-message"></div>
</form>
</body>
</html>
