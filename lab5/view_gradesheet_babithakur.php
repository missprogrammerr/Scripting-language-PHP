<link rel="stylesheet" href="style.css"/>
<?php
function calculate_final_grade($theory, $practical){
        $final_grade = ($theory+$practical)/2;
        return $final_grade;
}
function get_grade_letter($grade_point) {
    if ($grade_point <= 4.0 && $grade_point >= 3.6) {
        return 'A+';
    } elseif ($grade_point <= 3.6 && $grade_point >= 3.2) {
        return 'A';
    } elseif ($grade_point <= 3.2 && $grade_point >= 2.8) {
        return 'B+';
    } elseif ($grade_point <= 2.8 && $grade_point >= 2.4) {
        return 'B';
    } elseif ($grade_point <= 2.4 && $grade_point >= 2.0) {
        return 'C+';
    } elseif ($grade_point <= 2.0 && $grade_point >= 1.6) {
        return 'C';
    } elseif ($grade_point <= 1.6 && $grade_point >= 1.2) {
        return 'D+';
    } elseif ($grade_point <= 1.2 && $grade_point >= 0.8) {
        return 'D';
    } elseif ($grade_point <= 0.8 && $grade_point >= 0) {
        return 'E';
    } else {
        return '-';
    }
}

function get_remarks($grade_point) {
    if ($grade_point <= 4.0 && $grade_point >= 3.6) {
        return 'Outstanding';
    } elseif ($grade_point <= 3.6 && $grade_point >= 3.2) {
        return 'Excellent';
    } elseif ($grade_point <= 3.2 && $grade_point >= 2.8) {
        return 'Very Good';
    } elseif ($grade_point <= 2.8 && $grade_point >= 2.4) {
        return 'Good';
    } elseif ($grade_point <= 2.4 && $grade_point >= 2.0) {
        return 'Satisfactory';
    } elseif ($grade_point <= 2.0 && $grade_point >= 1.6) {
        return 'Acceptable';
    } elseif ($grade_point <= 1.6 && $grade_point >= 1.2) {
        return 'Partially Accepted';
    } elseif ($grade_point <= 1.2 && $grade_point >= 0.8) {
        return 'Insufficient';
    } elseif ($grade_point <= 0.8 && $grade_point >= 0) {
        return 'Very Insufficient';
    } else {
        return '-';
    }
}

function calculate_average_gpa($final_grade_array){
    $sum = 0;
    for($i=0; $i<count($final_grade_array); $i++){
        $sum += $final_grade_array[$i];
    }

    return $sum/count($final_grade_array);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $roll_no = $_POST['roll_no'];
    $dob = $_POST['dob'];
    $attendance = $_POST['attendance'];

    $subject_grades = [
        "English"=> [$_POST['th_english'], $_POST['pr_english']],
        "Nepali"=>[$_POST['th_nepali'], $_POST['pr_nepali']],
        "Mathematics"=>[$_POST['th_maths'], $_POST['pr_maths']],
        "Science"=>[$_POST['th_science'],$_POST['pr_science']],
        "Social"=>[$_POST['th_social'], $_POST['pr_social']],
        "Grammar"=>[$_POST['th_grammar'], $_POST['pr_grammar']],
        "Health"=>[$_POST['th_health'], $_POST['pr_health']],
        "Occupation"=>[$_POST['th_occupation'], $_POST['pr_occupation']],
        "Computer"=>[$_POST['th_computer'], $_POST['pr_computer']],
        "Moral"=>[$_POST['th_moral'], $_POST['pr_moral']],
        "Opt.Mathematics"=>[$_POST['th_opt_maths'], $_POST['pr_opt_maths']]
    ];

    //print_r($subject_grades);

    $details_of_gradesheet = [
        1 => ["90-100", "A+", "Outstanding", 4],
        2 => ["80 to below 90", "A", "Excellent", 3.6],
        3 => ["70 to below 80", "B+", "Very Good", 3.2],
        4 => ["60 to below 70", "B", "Good", 2.8],
        5 => ["50 to below 60", "C+", "Satisfactory", 2.4],
        6 => ["40 to below 50", "C", "Acceptable", 2],
        7 => ["30 to below 40", "D+", "Partially Accepted", 1.6],
        8 => ["20 to below 30", "D", "Insufficient", 1.2],
        9 => ["0 to below 20", "E", "Very Insufficient", 0.8]
    ];

    echo '<div>';
    echo '<h3>Annual Examination 2080</h3>';
    echo '<h2>Gradesheet</h2>';
    echo '<p>The marks secured by: '.$name.'</p>';
    echo '<p>Class: '.$class.'</p>';
    echo '<p>Roll No: '.$roll_no.'</p>';
    echo '<p>Date of Birth: '.$dob.'</p>';

    echo '<table border="1">';
    echo '<thead>';
    echo '<tr>';
    echo '<th rowspan="2">S.N</th>';
    echo '<th rowspan="2">Subject Code</th>';
    echo '<th rowspan="2">Credit Hour</th>';
    echo '<th colspan="2">Obtained Grade</th>';
    echo '<th rowspan="2">Final Grade</th>';
    echo '<th rowspan="2">Grade Point</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<th>TH</th>';
    echo '<th>PR</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $subjects = array_keys($subject_grades);
    $final_grade_array = [];

    for($i=0; $i < count($subject_grades); $i++){
        $sno = $i+1;
        $subject = $subjects[$i];
        $grades = $subject_grades[$subject];
        $theory_grade = floatval($grades[0]);
        $practical_grade = floatval($grades[1]);
        $theory_grade_letter = get_grade_letter($theory_grade);
        $practical_grade_letter = get_grade_letter($practical_grade);
        echo '<tr>';
        echo '<td>'.$sno.'</td>';
        echo '<td>'.array_keys($subject_grades)[$i].'</td>';
        echo '<td>4</td>';
        echo '<td>'.$theory_grade_letter.'</td>';
        echo '<td>'.$practical_grade_letter.'</td>';
        $finalgrade = calculate_final_grade($theory_grade, $practical_grade);
        $finalgrade_letter = get_grade_letter($finalgrade);
        array_push($final_grade_array, $finalgrade);
        echo '<td>'.$finalgrade_letter.'</td>';
        echo '<td>'.$finalgrade.'</td>';
        echo '</tr>';
    }
   $average_gpa = calculate_average_gpa($final_grade_array);
   echo '<tr>';
   echo '<td colspan="6"><b>Grade Point Average (GPA)</b></td>';
   echo '<td>'.round($average_gpa, 2).'</td>';
   echo '</tr>';

   echo '<tr>';
   echo '<td colspan="6"><b>Attendance:</b> '.$attendance.' Days</td>';
   $remarks = get_remarks($average_gpa);
   echo '<td><b>Remarks:</b> '.$remarks.'</td>';
   echo '</tr>';
    
    echo '</tbody>';
    echo '</table>';
    echo '<ul><li>TH: Theory</li><li>PR: Practical</li></ul>';

    echo '<h3>Details of Grade Sheet</h3>
    <table border="1" class="details_table">
    <thead>
    <tr>
    <th>SN</th>
    <th>Interval in Percentage</th>
    <th>Grade</th>
    <th>Description</th>
    <th>Grade Point</th>
    </tr>
    </thead>
    <tbody>';

    

    for($i=0; $i<count($details_of_gradesheet); $i++){
        $details_array = $details_of_gradesheet[array_keys($details_of_gradesheet)[$i]];
        echo '<tr>';
        echo '<td>'.array_keys($details_of_gradesheet)[$i].'</td>';
        echo '<td>'.$details_array[0].'</td>';
        echo '<td>'.$details_array[1].'</td>';
        echo '<td>'.$details_array[2].'</td>';
        echo '<td>'.$details_array[3].'</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo'</table>';

    echo '<p>* This sheet is for the general idea of grade(s) you secured. This is not 
    for official use. If any mistake appears, record at Samata Sikhsya Niketan will be referred.</p>';
    echo '</div>';
}
?>