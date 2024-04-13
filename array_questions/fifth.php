<?php
$x = array(1, 2, 3, 4, 5);
echo 'Original array: ';
print_r($x);
echo '<br>Insertion using array_splice: ';
$insert_value = 6;
$insert_position = 3;

array_splice($x, $insert_position, 0, $insert_value);
print_r($x);

echo '<br>Without using array_splice: ';
// Split the array into two parts at the insert position
$first_part = array_slice($x, 0, $insert_position);
$second_part = array_slice($x, $insert_position);

// Merge the parts with the insert value in between
$x = array_merge($first_part, array($insert_value), $second_part);
print_r($x);

?>