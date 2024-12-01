<?php
/*
 * Part 1
 */

$input = file_get_contents(__DIR__ . '/input.txt');

$inputToArray = preg_split('/\r\n|\n|\r/', $input);
$list1 = [];
$list2 = [];

foreach ($inputToArray as $item) {
	$array = explode('   ', $item);

	foreach ($array as $key => $number) {
		if ( $key % 2 == 0 ) {
			$list1[] = (int) $number;
		} else {
			$list2[] = (int) $number;
		}
	}
}

sort($list1);
sort($list2);
$sum = 0;

for($i = 0; $i < count($list1); $i++) {
	$sum += abs($list1[$i] - $list2[$i]);
}

echo "Part 1 answer is $sum\n";

/*
 * Part 2
 */

$sum2 = 0;

foreach ($list1 as $item) {
	$itemFound = 0;

	foreach ($list2 as $number) {
		if ($number === $item) {
			++$itemFound;
		}
	}

	$sum2 += $itemFound * $item;
}

echo "Part 2 answer is $sum2\n";