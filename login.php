<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background-color: black;
            color: white;
            text-align: center;
        }
        .main {
            margin: 10% auto auto auto;
            width: 100%;
            text-align: center;
        }
        label{
            color: aqua;
            font-size: 20px;
        }
        input, button {
            background-color: transparent;
            color: white;
            font-size: 20px;
            border: 1.5px solid aqua;
            border-radius: 6px;
            outline: none;
            padding: 10px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    //print form data
    // print_r($_POST);
    // echo '<br/>';
    // print_r($_REQUEST);
    // echo '<br/>';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo 'Username is '.$_POST['username'];
        // echo '<br/>';
        // echo 'Password is '.$_POST['password'];

        //isset to check whether variable exist or not
        if(isset($_POST['username']) && empty(trim($_POST['username']))){
            $errUsername = 'Invalid Username';
        }else{
            $username = trim($_POST['username']);
            echo'Username is '.$username;
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
    <div class="main">
        <h1>Astraverse | Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <label for="username" name="username">Username:</label>
                <input type="text" name="username" id="username"/>
                <br/>
                <span class="error"><?php echo isset($errUsername) ? $errUsername:''; ?></span>
            </div>
            <br/>
            <div>
                <label for="password" name="password">Password:</label>
                <input type="password" name="password" id="password"/>
                <br/>
                <span class="error"><?php echo isset($errPassword) ? $errPassword:''; ?></span>
            </div>
            <br/>
            <div>
                <input type="submit" name="login" value="Login"/>
            </div>
        </form>
    </div>
    <br/>
    
</body>
</html>