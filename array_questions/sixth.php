<?php
$array = array("Ram" => "31", "Hari" => "41", "Sita" => "39", "Gita" => "40");

asort($array); // Sort the array by value in ascending order
echo "Ascending order sort by value:\n";
print_r($array);


ksort($array); // Sort the array by key in ascending order
echo "Ascending order sort by key:\n";
print_r($array);

arsort($array); // Sort the array by value in descending order
echo "Descending order sorting by value:\n";
print_r($array);

krsort($array); // Sort the array by key in descending order
echo "Descending order sorting by key:\n";
print_r($array);

?>