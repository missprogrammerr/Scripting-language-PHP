<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>jQuery Example</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    .box {
        width: 200px;
        height: 200px;
        background-color: lightblue;
        margin-bottom: 10px;
    }
</style>
</head>
<body>

<div class="box" id="box1">Box 1</div>
<div class="box" id="box2">Box 2</div>

<button id="hideBtn">Hide Box 1</button>
<button id="showBtn">Show Box 1</button>
<button id="toggleBtn">Toggle Box 2</button>
<button id="changeColorBtn">Change Color of Box 1</button>

<label for="colorPicker">Select color:</label>
<input type="color" id="colorPicker">

<script>
    $(document).ready(function(){
        // Hide Box 1
        $("#hideBtn").click(function(){
            $("#box1").hide();
        });

        // Show Box 1
        $("#showBtn").click(function(){
            $("#box1").show();
        });

        // Toggle Box 2
        $("#toggleBtn").click(function(){
            $("#box2").toggle();
        });

        // Change color of Box 1
        $("#changeColorBtn").click(function(){
            var color = $("#colorPicker").val();
            $("#box1").css("background-color", color);
        });

        // Change event on color picker
        $("#colorPicker").change(function(){
            var color = $(this).val();
            $("#box2").css("background-color", color);
        });
    });
</script>

</body>
</html>

