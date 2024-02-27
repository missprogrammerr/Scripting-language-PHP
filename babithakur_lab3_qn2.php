<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data Types Demo</title>
</head>
<body>
    <h1>PHP Data Types Demo</h1>
    <?php
    // Integer
    $intVar = 10;

    // Float (double)
    $floatVar = 3.14;

    // String
    $stringVar = "Hello, world!";

    // Boolean
    $boolVar = true;

    // Array
    $arrayVar = array(1, 2, 3, "apple", "banana");

    // Associative Array
    $assocArrayVar = array(
        "name" => "John",
        "age" => 30,
        "city" => "New York"
    );

    // Null
    $nullVar = null;

    // Object
    class MyClass {
        public $property;
        
        function __construct($value) {
            $this->property = $value;
        }
    }

    $objVar = new MyClass("Value of property");

    // Resource
    $file = fopen("example.txt", "r");

    // Output the values with their respective data types
    echo "<p>Integer: " . $intVar . "</p>";
    echo "<p>Float: " . $floatVar . "</p>";
    echo "<p>String: " . $stringVar . "</p>";
    echo "<p>Boolean: " . ($boolVar ? "true" : "false") . "</p>";
    echo "<p>Array: ";
    echo "<pre>";
    print_r($arrayVar);
    echo "</pre></p>";
    echo "<p>Associative Array: ";
    echo "<pre>";
    print_r($assocArrayVar);
    echo "</pre></p>";
    echo "<p>Null: " . $nullVar . "</p>";
    echo "<p>Object: " . $objVar->property . "</p>";
    echo "<p>Resource: " . get_resource_type($file) . "</p>";

    // Close the file resource
    fclose($file);
    ?>
</body>
</html>

