<?php


//randomly populated array
//$random_number_generator_for_array_pop = rand(2, 10);

for ($i = 0; $i < 3; $i++) {

	$random_populated_arr = array_map(
		function () {
			return rand(2, 10);
		},
		array_fill(0, rand(2, 10), null)
	);


	foreach ($random_populated_arr as $r_p_arr) {
		switch ($i) {
			case 0:
				$apple[] = ['worker_after' => $r_p_arr, 'worker' => $r_p_arr, 'counter' => 0, "type" => 'Apple'];
				break;
			case 1:
				$orange[] = ['worker_after' => $r_p_arr, 'worker' => $r_p_arr, 'counter' => 0, "type" => 'ORange'];
				break;
			case 2:
				$kiwi[] = ['worker_after' => $r_p_arr, 'worker' => $r_p_arr, 'counter' => 0, "type" => 'Kiwi'];
				break;
		}
	}
}

sort($apple);
sort($orange);
sort($kiwi);

//randomly get number to be distrubuted
$random_number_generator = rand(1, 10);

$fruits = [$apple, $orange, $kiwi];
foreach ($fruits as $fruit) {
	
	$final_fruit = distrubuter($fruit, $random_number_generator);
	echo 'number of fruits to be distributed evenly: ' . $random_number_generator . "\r\n";
	echo (worker($final_fruit));
	echo "----------" . "\r\n";
}


function worker(array $fruit): void
{
	for ($i = 0; $i < count($fruit); $i++) {
		$finalmente = empty($fruit[$i]) ? 0 : $fruit[$i]['counter']; //if null then 0 of the how many apples does it got
		echo $fruit[$i]['type']." worker " . $i + 1 . " had " . $fruit[$i]['worker'] . " apples to process " . "\r\n";
		echo $fruit[$i]['type']." worker " . $i + 1 . " gets another " . $finalmente . " apples  (total: " . $fruit[$i]['worker_after'] . ")" . "\r\n";
	}
}

function distrubuter(array $fruit, $random_number_generator)
{

	while ($random_number_generator != 0) {
		sort($fruit); //sort the array each time to get second(min) and min
		$first = $fruit[0]['worker_after'];
		$second = $fruit[1]['worker_after'];
		$gap = ($second - $first) + 1;
		if ($random_number_generator <= $gap) {

			$gap = $random_number_generator;
		}
		$index = array_search(min($fruit), $fruit);
		//echo $index."\r\n";
		$fruit[$index]['worker_after'] += $gap;
		$fruit[$index]['counter'] += $gap;

		$random_number_generator = $random_number_generator - $gap;
	}
	return $fruit;
}
