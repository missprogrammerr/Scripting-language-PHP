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
        <button onclick="checkEmail()">Check Email</button>
    </form>
    <script>
        function checkEmail(){
            event.preventDefault();
            let email = document.getElementById('email').value;
            var data = new FormData();
            data.append('email',email);
            let ajax = new XMLHttpRequest();
            ajax.open('POST','get_email.php',true);
            ajax.send(data);
            ajax.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.getElementById('msg_email').innerHTML = ajax.responseText;
                }
            }
        }
    </script>
</body>
</html>

