<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $info = ['Ram', 'KTM', 'PKR', 50, 65];
        //associative array (key-value pair array)
        $info = ['name' => 'Ram Bahadur', 'address' => 'Lalitpur', 'email' => 'info@ram.com', 'phone' => '9801234562', 'website' => 'www.ram.com'];
        //print_r($info);
        echo '<table border=1>';
        foreach($info as $key => $value){
            echo '<tr>';
            echo '<th>'.ucfirst($key).'</th>';
            echo '<td>'.$value.'</td>';
            echo '</tr>';
        }
        echo '</table>';
    ?>
</body>
</html>

