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
    //echo $_SERVER['PHP_SELF'] returns the current web page name

    if(isset($_COOKIE['username'])){
        session_start();
        $_SESSION['username'] = $_COOKIE['username'];
        header('Location: dashboard.php');
    }
    
    $username = '';
    $db_username = 'astra';
    $db_password = 'paradox123';
    $error = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //isset to check whether variable exist or not
        if(isset($_POST['username']) && empty(trim($_POST['username']))){
            $errUsername = 'Please enter username.';
            $error = true;
        }else{
            $username = trim($_POST['username']);
        }
        if(isset($_POST['password']) && empty(trim($_POST['password']))){
            $errPassword = 'Please enter password';
            $error = true;
        }else{
            $password = trim($_POST['password']);
        }

        if($error == false){
            if($username === $db_username && $password === $db_password){
                session_start();
                $_SESSION['user_id'] = md5(rand());
                $_SESSION['username'] = $username;
                if(isset($_POST['remember'])){
                    setcookie('username', $username, time()+7*24*60*60);
                }
                header('Location: dashboard.php');
            }else{
                $errLogin = 'Invalid Credentials!';
            }
        }
    }
    ?>
    <div class="main">
        <h1>Astraverse | Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div>
                <label for="username" name="username">Username:</label>
                <input type="text" name="username" id="username" value="<?php echo $username;?>"/>
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
            <input type="checkbox" name="remember" value="remember"/><span>Remember me</span>
            <br/><br/>
            <div>
                <input type="submit" name="login" value="Login"/>
                <br/><br/>
                <span class="error"><?php echo isset($errLogin) ? $errLogin:''; ?></span>
            </div>
        </form>
    </div>
    <br/>
    
</body>
</html>