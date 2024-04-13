<?php

// Recorded weights
$temp = "50,60,70,90,42,62,52,87,32,45,75,25,60,61,66,65,57,65,32,45,75,45,45,55,56,57,58,59,60,61,62,63,64";

// Convert the string of weights to an array of integers
$weights = array_map('intval', explode(',', $temp));

// Calculate average weight
$averageWeight = array_sum($weights) / count($weights);

// Sort the array
sort($weights);

// Get the five lowest weights
$lowestWeights = array_slice($weights, 0, 5);

// Get the five highest weights
$highestWeights = array_slice($weights, -5);

// Display results
echo "Average weight: " . $averageWeight . " kg\n";
echo "Five lowest weights: " . implode(', ', $lowestWeights) . " kg\n";
echo "Five highest weights: " . implode(', ', $highestWeights) . " kg\n";

?>