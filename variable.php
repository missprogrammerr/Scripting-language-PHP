<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name = "Iyer";
    echo $name;
    echo '<br/>';
    echo "Venugopala $name";
    echo '<br/>';
    echo 'Mutuswami Venugopala '.$name;
    echo '<br/>';
    echo 'Chinnaswami Mutuswami Venugopala $name';
    ?>
    <table border="1" style="border-collapse: collapse;">
        <tr>
            <th>Name</th>
            <td><?php $name = "Rameshwor"; echo $name;?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php $address = "KTM"; echo $address;?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php $email = "ram@gmail.com"; echo $email;?></td>
        </tr>
    </table>
</body>
</html>