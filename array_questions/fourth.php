<?php
$x = array(1, 2, 3, 4, 5);

echo 'First: ';
print_r($x);

//deleting an element, suppose 4
unset($x[3]);

//re-indexing the array elements
$x = array_values($x);

echo '<br>After delete: ';
print_r($x);

?>