<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="hello">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta aspernatur modi atque similique, nulla maiores obcaecati itaque et doloremque, eos maxime aut? Aliquam illum distinctio impedit cum, temporibus expedita totam.</p>
    <button>Click to get attribute</button>
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function (){
            $('button').click(function (){
                //$(this).css('backgroundColor', 'blue');
                alert("hello");
            });
        });
    </script>
</body>
</html>