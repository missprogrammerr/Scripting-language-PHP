<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Check unique number</h2>
    <form action="">
        <input type="text" id="number" name="number" />
        <span id="msg_phone"></span><br/><br/>
        <button>Check</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
       $(document).ready(function(){
            $('#number').keyup(function(){
                event.preventDefault();
                let number = $('#number').val();
                $.ajax('get_number.php',{
                    data:{'number':number},
                    method:'post',
                    dataType:'text',
                    success:function(resp){
                       $('#msg_phone').html(resp); 
                    }
                });
            });
       });
    </script>
</body>
</html>

