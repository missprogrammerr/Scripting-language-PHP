<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
</head>
<body>
    <?php
        $students = [
            ["name" => "Astra", "roll"=>1],
            ["name" => "Babi", "roll"=>2],
            ["name" => "Edward", "roll"=>3],
            ["name" => "Kamana", "roll"=>4]
        ];
        $marks = [
            [88, 96, 85, 78, 98],
            [52, 56, 60, 76, 97],
            [54, 84, 54, 20, 60],
            [49, 59, 57, 58, 85]
        ];

        function check_pass_fail($marks_array){
            $fail = false;
            foreach($marks_array as $value){
                if($value < 40){
                    $fail = true;
                }
            }
            return $fail;
        }
        
        function calculate_total($marks_array){
            $total = 0;
            for($i=0; $i<count($marks_array); $i++){
                $total += $marks_array[$i];
            }
            return $total;
        }

        function calculate_percentage($marks_array){
            $total = calculate_total($marks_array);
            return $total/500*100;
        }

        function calculate_division($marks_array){
            $percentage = calculate_percentage($marks_array);
            if($percentage >= 80){
                return 'Distinction';
            }elseif($percentage >= 60 && $percentage <= 79){
                return 'First';
            }elseif($percentage >= 46 && $percentage <= 59){
                return 'Second';
            }else{
                return 'Third';
            }
        }

        echo '<table border="2">';
        echo '<tr>';
        echo '<th>SN</th>';
        echo '<th>Name</th>';
        echo '<th>Roll</th>';
        echo '<th>OS</th>';
        echo '<th>NM</th>';
        echo '<th>SE</th>';
        echo '<th>SL</th>';
        echo '<th>DBMS</th>';
        echo '<th>Result</th>';
        echo '<th>Total</th>';
        echo '<th>Percent</th>';
        echo '<th>Division</th>';
        echo '</tr>';

        for($i=0; $i < count($students); $i++){
            $sno = $i+1;
            echo '<tr>';
            echo '<td>'.$sno.'</td>';
            foreach($students[$i] as $value){
                 echo '<td>'.$value.'</td>';
            }
            for($j=0; $j < count($marks[$i]); $j++){
                echo '<td>'.$marks[$i][$j].'</td>';
            }
            //pass_fail
            echo '<td>';
            $result = check_pass_fail($marks[$i]);
            if($result){
                echo "Fail";
            }else{
                echo "Pass";
            }
            echo '</td>';

            //total marks
            echo '<td>';
            $x = calculate_total($marks[$i]);
            echo $x;
            echo '</td>';

            //percentage
            echo '<td>';
            $percentage = calculate_percentage($marks[$i]);
            echo number_format($percentage, 2);
            echo '</td>';
            
            //division
            echo '<td>';
            $division = calculate_division($marks[$i]);
            echo $division;
            echo '</td>';

            echo '</tr>';
        } 
        echo '</table>';
    ?>
</body>
</html>