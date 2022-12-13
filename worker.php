<?php


//randomly populated array
//$random_number_generator_for_array_pop = rand(2, 10);

$random_populated_arr = array_map(
	function () {
		return rand(2, 10);
	},
	array_fill(0, rand(2, 10), null)
);

$apple = [];
foreach ($random_populated_arr as $r_p_arr) {

	$apple[] = ['worker_after' => $r_p_arr, 'worker' => $r_p_arr, 'counter' => 0];
}

sort($apple);

//randomly get number to be distrubuted
$random_number_generator = rand(1, 10);

echo 'number of apples to be distributed evenly: ' . $random_number_generator . "\r\n";

while ($random_number_generator != 0) {
	sort($apple); //sort the array each time to get second(min) and min
	$first = $apple[0]['worker_after'];
	$second = $apple[1]['worker_after'];
	$gap = ($second - $first) + 1;
	if ($random_number_generator <= $gap) {

		$gap = $random_number_generator;
	}
	$index = array_search(min($apple), $apple);
	//echo $index."\r\n";
	$apple[$index]['worker_after'] += $gap;
	$apple[$index]['counter'] += $gap;

	$random_number_generator = $random_number_generator - $gap;
}


echo (worker($apple));

//function that generates the initial array
function worker(array $apple): void
{
	for ($i = 0; $i < count($apple); $i++) {
		$finalmente = empty($apple[$i]) ? 0 : $apple[$i]['counter']; //if null then 0 of the how many apples does it got
		echo "Apple worker " . $i + 1 . " had " . $apple[$i]['worker'] . " apples to process " . "\r\n";
		echo "Apple worker " . $i + 1 . " gets another " . $finalmente . " apples  (total: " . $apple[$i]['worker_after'] . ")" . "\r\n";
	}
}
