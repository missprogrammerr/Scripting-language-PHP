<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gradesheet</title>
</head>
<body>
    <h3>Create Gradesheet</h3>
    <form method="POST" action="view_gradesheet_babithakur.php">
    Name: <input type="text" name="name"/><br/><br/>
    Class: <input type="number" name="class"/><br/><br/>
    Roll No: <input type="number" name="roll_no"/><br/><br/>
    Dob: <input type="date" name="dob"/><br/><br/>
    Attendance: <input type="number" name="attendance"/><br/><br/>
    <p>Enter grades (GPA) in these subjects:</p>
    <b>English:</b>
    Theory: <input type="text" name="th_english"/>
    Practical: <input type="text" name="pr_english"/><br/><br/>
    <b>Nepali:</b>
    Theory: <input type="text" name="th_nepali"/>
    Practical: <input type="text" name="pr_nepali"/><br/><br/>
    <b>Maths:</b> 
    Theory: <input type="text" name="th_maths"/>
    Practical: <input type="text" name="pr_maths"/><br/><br/>
    <b>Science:</b> 
    Theory: <input type="text" name="th_science"/>
    Practical: <input type="text" name="pr_science"/><br/><br/>
    <b>Social:</b> 
    Theory: <input type="text" name="th_social"/>
    Practical: <input type="text" name="pr_social"/><br/><br/>
    <b>Grammar:</b> 
    Theory: <input type="text" name="th_grammar"/>
    Practical: <input type="text" name="pr_grammar"/><br/><br/>
    <b>Health:</b> 
    Theory: <input type="text" name="th_health"/>
    Practical: <input type="text" name="pr_health"/><br/><br/>
    <b>Occupation:</b> 
    Theory: <input type="text" name="th_occupation"/>
    Practical: <input type="text" name="pr_occupation"/><br/><br/>
    <b>Computer:</b> 
    Theory: <input type="text" name="th_computer"/>
    Practical: <input type="text" name="pr_computer"/><br/><br/>
    <b>Moral:</b> 
    Theory: <input type="text" name="th_moral"/>
    Practical: <input type="text" name="pr_moral"/><br/><br/>
    <b>Opt. Maths:</b> 
    Theory: <input type="text" name="th_opt_maths"/>
    Practical: <input type="text" name="pr_opt_maths"/><br/><br/>
    <input type="submit" value="Create Report"/>
    </form>
</body>
</html>