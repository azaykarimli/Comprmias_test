<?php


$random_number_array = range(1, 10);
shuffle($random_number_array);
$random_number_array = array_slice($random_number_array, 0, 5);
unset($random_number_array[0]);



$array = new SplFixedArray(4);
$arr = json_decode(json_encode($array), true);

//initial array of workers
//$apple = ['worker_1'=>3,'worker_2'=>1,'worker_3'=>2];
//$final_apple = ['worker_1'=>0,'worker_2'=>0,'worker_3'=>0];
$apple = $random_number_array;
$final_apple = $arr;
//print_r($apple);

//echo(worker($apple));


echo '-------after logic------' . "\r\n";


//randomly get number to be distrubuted

$random_number_generator = rand(1, 10);


echo 'number of apples to be distributed evenly: ' . $random_number_generator . "\r\n";

for ($i = 1; $i <= $random_number_generator; $i++) {

	//add one more to the minumum member of array
	$index = array_search(min($apple), $apple);
	//echo $index."\r\n";
	$apple[$index]++;
	$final_apple[$index]++;
}

echo (worker($final_apple, $apple, $random_number_array));

//echo(final_worker($final_apple, $apple));


//function that generates the initial array
function worker(array $final_apple, array $apple, array $random_number_array): void
{
	for ($i = 1; $i <= count($apple); $i++) {
		/* 
		echo "Apple worker " . $i . " has " . $apple['worker_' . $i] . " apples to process " . "\r\n";
		echo "Apple worker " . $i . " gets another " . $final_apple['worker_' . $i] . " apples  (total: " . $apple[$i] . ")" . "\r\n";
 */	
$finalmente = empty($final_apple[$i]) ? 0: $final_apple[$i];
		echo "Apple worker " . $i . " has " . $random_number_array[$i] . " apples to process " . "\r\n";
		echo "Apple worker " . $i . " gets another " . $finalmente . " apples  (total: " . $apple[$i] . ")" . "\r\n";
	}
}
//function that generates after the logic
function final_worker(array $final_apple, array  $apple): void
{
	for ($i = 1; $i <= count($final_apple); $i++) {

		echo "Apple worker " . $i . " gets another " . $final_apple['worker_' . $i] . " apples  (total: " . $apple['worker_' . $i] . ")" . "\r\n";
		//Apple worker 1 gets another 1 apple (total: 4)

	}
}
