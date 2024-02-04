<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['username'])){
        echo '<h1>'.'Welcome back '.$_SESSION['username'].'</h1>';
    }else{
        header('Location: login.php');
    }
    ?>
    <a href="logout.php">Logout</a>
</body>
</html>