<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP Array</h1>
    <?php
        $students = ['Astra', 'Shellghost', 'Ronika', 'Anoop'];
        print_r($students);
        echo '<ul>';
        for($i = 0; $i < count($students); $i++){
            echo '<li>'. $students[$i] . '</li>';
        }
        echo '</ul>';

        $info = ['Ram', 'KTM', 'PKR', 50, 65];
        //associative array (key-value pair array)
        $info = ['name' => 'Ram', 'temp' => 'KTM', 'per' => 'PKR', 'age' => 50, 'weight' => 65];
        print_r($info);
        echo '<table border=1>';
        foreach($info as $key => $value){
            echo '<tr>';
            echo '<th>'.ucfirst($key).'</th>';
            echo '<td>'.$value.'</td>';
            echo '</tr>';
        }
        echo '</table>';

        //Multidimesional array
        $movies = [
            'Fiction' => ['Action and adventure', 'Alternate history', 'Anthology'],
            'Nonfiction' => ['Biography', 'Autobiography', 'Diary']
        ];
        print_r($movies);
        echo '<br/>';
        print_r($movies['Fiction']);
        echo $movies['Fiction'][0];
        echo '<br/>';
        echo '<ol>';
        foreach($movies as $key => $value){
            echo '<li>'.$key;
            echo '<ul>';
            for($i=0; $i < count($movies[$key]); $i++){
                echo '<li>'.$movies[$key][$i].'</li>';
            }
            echo '</ul>';
            echo '</li>';
        }
        echo '</ol>';
    ?>
</body>
</html>

