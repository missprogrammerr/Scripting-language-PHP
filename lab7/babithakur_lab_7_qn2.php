<?php
// Define variables and initialize with empty values
$maritalStatus = $income = $gender = $result = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate marital status
    if (empty($_POST["marital_status"])) {
        $maritalStatusErr = "Marital status is required";
    } else {
        $maritalStatus = $_POST["marital_status"];
    }

    // Validate income
    if (empty($_POST["income"])) {
        $incomeErr = "Income is required";
    } else {
        $income = test_input($_POST["income"]);
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = $_POST["gender"];
    }

    // Calculate tax
    if (!empty($maritalStatus) && !empty($income) && !empty($gender)) {
        $result = calculateTax($maritalStatus, $income, $gender);
    }
}

// Function to calculate tax
function calculateTax($maritalStatus, $income, $gender) {
    $tax = 0;

    // Apply tax rules based on marital status and income
    if ($maritalStatus == "married") {
        if ($income <= 450000) {
            $tax += $income * 0.01;
        } elseif ($income > 450000 && $income <= 550000) {
            $tax += 4500 + ($income - 450000) * 0.1;
        } elseif ($income > 550000 && $income <= 750000) {
            $tax += 9500 + ($income - 550000) * 0.2;
        } elseif ($income > 750000 && $income <= 1300000) {
            $tax += 33500 + ($income - 750000) * 0.3;
        } else {
            $tax += 78500 + ($income - 1300000) * 0.35;
        }
    } else { // unmarried
        if ($income <= 400000) {
            $tax += $income * 0.01;
        } elseif ($income > 400000 && $income <= 500000) {
            $tax += 4000 + ($income - 400000) * 0.1;
        } elseif ($income > 500000 && $income <= 750000) {
            $tax += 14000 + ($income - 500000) * 0.2;
        } elseif ($income > 750000 && $income <= 1300000) {
            $tax += 54000 + ($income - 750000) * 0.3;
        } else {
            $tax += 102500 + ($income - 1300000) * 0.35;
        }
    }

    // Apply tax discount for female
    if ($gender == "female") {
        $tax *= 0.9;
    }

    return $tax;
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
    <title>Tax Calculator</title>
</head>
<body>
    <h2>Tax Calculator</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="marital_status">Marital Status:</label>
        <select id="marital_status" name="marital_status">
            <option value="married">Married</option>
            <option value="unmarried">Unmarried</option>
        </select>
        <br><br>
        <label for="income">Annual Income:</label>
        <input type="number" id="income" name="income" value="<?php echo isset($income) ? $income : ''; ?>">
        <span class="error">* <?php echo isset($incomeErr) ? $incomeErr : ""; ?></span>
        <br><br>
        <label for="gender">Gender:</label>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Calculate Tax">
    </form>

    <?php if (!empty($result)): ?>
    <h3>Tax Calculation Result:</h3>
    <p><?php echo "Tax to be paid: $" . number_format($result, 2); ?></p>
    <?php endif; ?>
</body>
</html>

