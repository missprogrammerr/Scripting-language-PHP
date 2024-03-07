<?php
// Define variables and initialize with empty values
$principal = $rate = $time = $result = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate principal
    if (empty($_POST["principal"])) {
        $principalErr = "Principal is required";
    } else {
        $principal = test_input($_POST["principal"]);
    }

    // Validate rate
    if (empty($_POST["rate"])) {
        $rateErr = "Rate is required";
    } else {
        $rate = test_input($_POST["rate"]);
    }

    // Validate time
    if (empty($_POST["time"])) {
        $timeErr = "Time is required";
    } else {
        $time = test_input($_POST["time"]);
    }

    // Calculate simple interest
    if (!empty($principal) && !empty($rate) && !empty($time)) {
        $result = ($principal * $rate * $time) / 100;
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Interest Calculator</title>
</head>
<body>
    <h2>Simple Interest Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Principal: <input type="number" name="principal" value="<?php echo $principal; ?>">
        <span class="error">* <?php echo isset($principalErr) ? $principalErr : ""; ?></span>
        <br><br>
        Rate: <input type="number" step="0.01" name="rate" value="<?php echo $rate; ?>"> %
        <span class="error">* <?php echo isset($rateErr) ? $rateErr : ""; ?></span>
        <br><br>
        Time (in years): <input type="number" name="time" value="<?php echo $time; ?>">
        <span class="error">* <?php echo isset($timeErr) ? $timeErr : ""; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    // Display result if calculated
    if (!empty($result)) {
        echo "<h3>Simple Interest Result:</h3>";
        echo "Simple Interest = " . $result;
    }
    ?>
</body>
</html>

