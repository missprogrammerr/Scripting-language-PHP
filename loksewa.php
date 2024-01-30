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
    $fullName = $username = $email = $sector = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['fullName']) && !empty(trim($_POST['fullName']))){
            $fullName = trim($_POST['fullName']);
            if(!preg_match("/^([A-Z][a-z\s]+)+$/",$fullName)){
              $errFullname = "Invalid Full Name";
            }
        }else{
            $errFullname = 'Invalid Full Name';
        }
        if(isset($_POST['username']) && !empty(trim($_POST['username']))){
            $username = trim($_POST['username']);
            $uppercase = preg_match('/[A-Z]/', $username);
            $lowercase = preg_match('/[a-z]/', $username);
            $number = preg_match('/[0-9]/', $username);
            if(!$uppercase || !$lowercase || !$number){
              $errFullname = 'Invalid username';
            }
        }else{
            $errUsername = 'Invalid Username';
        }
        if(isset($_POST['email']) && !empty(trim($_POST['email']))){
            $email = trim($_POST['email']);
        }else{
            $errEmail = 'Invalid email';
        }
        if(isset($_POST['sector'])){
            $sector = $_POST['sector'];
        }else{
            $errSector = 'Select sector!';
        }
        if(isset($_POST['password']) && !empty(trim($_POST['password']))){
            $password = trim($_POST['password']);
        }else{
            $errPassword = 'Invalid Password';
        }
    }
?>

<form method="POST">
  <h2>लोक सेवा दर्ता गर्नुहोस्</h2>
  <label for="fullName">पुरा नाम:</label>
  <input type="text" id="fullName" name="fullName" value="<?php echo $fullName;?>">
  <span id="err_fullname"><?php echo isset($errFullname) ? $errFullname:''; ?></span>

  <label for="username">प्रयोगकर्ता नाम:</label>
  <input type="text" id="username" name="username" value="<?php echo $username;?>">
  <span id="err_username"><?php echo isset($errUsername) ? $errUsername:''; ?></span>

  <label for="email">ईमेल:</label>
  <input type="email" id="email" name="email" value="<?php echo $email;?>">
  <span id="err_email"><?php echo isset($errEmail) ? $errEmail:''; ?></span>

  <select name="sector">
    <option value="business" <?php echo ($sector=='business')?'selected':'';?>>Business</option>
    <option value="it">Info Tech</option>
    <option value="finance">Finance</option>
  </select>
  <span id="err_sector"><?php echo isset($errSector) ? $errSector:''; ?></span>

  <label for="password">पासवर्ड:</label>
  <input type="password" id="password" name="password">
  <span id="err_password"><?php echo isset($errPassword) ? $errPassword:''; ?></span>

  <br /><br />
  <button type="submit">दर्ता गर्नुहोस्</button>
  <div id="error-message" class="error-message"></div>
</form>
</body>
</html>

<!-- name, email, phone, address, username, country, image, education drop down, term & cond -->
