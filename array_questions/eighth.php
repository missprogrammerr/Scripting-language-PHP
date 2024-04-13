<?php

function changeCase($array, $case = 'upper') {
    if ($case == 'upper') {
        return array_map('strtoupper', $array);
    } elseif ($case == 'lower') {
        return array_map('strtolower', $array);
    } else {
        return $array; // Return original array if case is neither upper nor lower
    }
}

$brand = array('A' => 'Apple', 'B' => 'Bird', 'c' => 'Carbon');

// Change all values to upper case
$upperCaseBrand = changeCase($brand, 'upper');
print_r($upperCaseBrand);

// Change all values to lower case
$lowerCaseBrand = changeCase($brand, 'lower');
print_r($lowerCaseBrand);

?>
