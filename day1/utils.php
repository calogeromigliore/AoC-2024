<?php

function createNumbersList(array $numbers): array
{
	$list1 = [];
	$list2 = [];

	foreach ($numbers as $item) {
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

	return [$list1, $list2];
}

function calculateDistance(array $list1, array $list2): int
{
	$sum = 0;

	for($i = 0; $i < count($list1); $i++) {
		$sum += abs($list1[$i] - $list2[$i]);
	}

	return $sum;
}

function calculateSimilarityScore (array $numbers): int
{
	$sum2 = 0;

	foreach (createNumbersList($numbers)[0] as $item) {
		$itemFound = 0;

		foreach (createNumbersList($numbers)[1] as $number) {
			if ($number === $item) {
				++$itemFound;
			}
		}

		$sum2 += $itemFound * $item;
	}

	return $sum2;
}