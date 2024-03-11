<?php
try{
    $connection = new mysqli('localhost','root','','test_db');
    //query to create table
    $sql = "select * from semesters;";
    $res = mysqli_query($connection,$sql);
    //check number of rows
    $semesters = [];
    if(mysqli_num_rows($res)>0){
       while ($sem = mysqli_fetch_assoc($res)) {
            array_push($semesters,$sem);
       }
    } 
}catch(Exception $ex){
    die('Database Error:' . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
       <label for="">Semester</label>
       <select name="semester" id="semester">
            <option value="">Select semester</option>
            <?php foreach ($semesters as $key => $value) { ?>
                <option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
            <?php } ?>
       </select>
       <br>
       <ul name="subject" id="subject"></ul>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
       $(document).ready(function(){
            $('#semester').change(function(){
                let sem = $('#semester').val();
                $.ajax('get_subject.php',{
                    data:{'semester_id':sem},
                    method:'post',
                    dataType:'text',
                    success:function(resp){
                      $('#subject').html(resp);
                    }
                });
            });
       });
    </script>
</body>
</html>

