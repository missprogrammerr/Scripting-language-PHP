<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text" id="email" name="email" />
        <span id="msg_email"></span>
        <button>Check Email</button>
    </form>
    <script src="../jquery/js/jquery.min.js"></script>
    <script>
       $(document).ready(function(){
            $('#email').keyup(function(){
                event.preventDefault();
                let email = $('#email').val();
                $.ajax('get_email.php',{
                    data:{'email':email},
                    method:'post',
                    dataType:'text',
                    success:function(resp){
                        if(resp == 'Email already exists'){
                            $('#msg_email').css({'color':'red'});
                            $('button').attr('disabled','disabled');
                        } else {
                            $('#msg_email').css({'color':'green'})
                        }
                       $('#msg_email').html(resp); 
                    }
                });
            });
       });
    </script>
</body>
</html>

