<?php

require_once 'utils.php';

$input = file_get_contents(__DIR__ . '/input.txt');
$transformInputToArray = preg_split('/\r\n|\n|\r/', $input);

// Part 1
$distance = calculateDistance(
	createNumbersList($transformInputToArray)[0],
	createNumbersList($transformInputToArray)[1],
);

echo "The total distance is $distance\n";

// Part 2
$similarityScore = calculateSimilarityScore($transformInputToArray);
echo "The similarity score is $similarityScore\n";