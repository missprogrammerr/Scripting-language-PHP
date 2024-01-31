<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session | PHP</title>
</head>
<body>
    <?php
        //start session
        session_start();

        //print session id
        echo session_id();
        echo '<br/>';

        //store data into session
        $_SESSION['user_id'] = md5(rand());
        $_SESSION['username'] = "astra";
        print_r($_SESSION);
        echo '<br/>';

        //regenerate session id for security purpose, to prevent session fixation attacks
        session_regenerate_id();
        echo session_id();
        echo '<br/>';

        //delete session variable
        unset($_SESSION['username']);

        //completely delete session data
        session_destroy();

        //COOKIES
        //use secure and HttpOnly flag to prevent client-side scripts from accessing cookies.
        setcookie('username', 'astra', time() + 7*24*60*60, secure:true, httponly:true);

        //accessing cookie data
        print_r($_COOKIE);
        echo '<br/>';
        echo $_COOKIE['PHPSESSID'];


    ?>
</body>
</html>