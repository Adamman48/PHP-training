<?php
	// coding hours
	$semester_length_in_weeks = 17;
	$workingdays_a_week = 5;
	$avarage_coding_hours_day = 6;
	$semester_avarage_coding = $semester_length_in_weeks * $workingdays_a_week * $avarage_coding_hours_day;

	echo $semester_avarage_coding;
	echo "<br>";

	$avarage_working_hours_weekly = 52;

	echo round($avarage_working_hours_weekly / $semester_avarage_coding * 100);
	echo "<br>";

	// cuboid
	// Write a program that stores 3 sides of a cuboid as variables (floats)
	// The program should write the surface area and volume of the cuboid

	(function (int $l = 2, int $w = 2, int $h = 2) {
		$surfaceArea = 2 * ($l * $w + $w * $h + $l * $h);
		$volume = $l * $w * $h;

		echo "Surface Area: $surfaceArea" . "<br>";
		echo "Volume: $volume" . "<br>";
	})();

	// conditional variable mutation
		// if a is even increment out by one

		$a = 24;
		$out = 0;
		$a % 2 === 0 ? ++$out : null;
		echo $out . "<br>";

		// if b is between 10 and 20 set out2 to 'Sweet!'
		// if less than 10 set out2 to 'Less!',
		// if more than 20 set out2 to 'More!'

		$b = 13;
		$out2 = "";
		(20 >= $b) && ($b >= 10) ? $out2 = "Sweet!" : ( $b < 10 ? $out2 = "Less!" : $out2 = "More!" ); // parenthesis needed because of precedency
		echo $out2 . "<br>";

		// if credits are at least 50,
		// and isBonus is false decrement c by 2
		// if credits are smaller than 50,
		// and isBonus is false decrement c by 1
		// if isBonus is true c should remain the same

		$c = 123;
		$credits = 100;
		$isBonus = false;
		if ($credits >= 50 && !$isBonus) {
			$c -= 2;
		} elseif ($credits < 50 && !$isBonus) {
			$c -= 1;
		} elseif ($isBonus) {
			$c;
		};
		echo $c . "<br>";

		// if d is dividable by 4
		// and time is not more than 200
		// set out3 to 'check'
		// if time is more than 200
		// set out3 to 'Time out'
		// otherwise set out3 to 'Run Forest Run!'

		$d = 8;
		$time = 120;
		$out3 = '';
		if ($d % 4 === 0 && $time <= 200) {
			$out3 = 'check';
		} elseif ($time > 200) {
			$out3 = 'Time out';
		} else {
			$out3 = 'Run Forest Run!';
		};
		echo $out3 . "<br>";

	//	find substring
	//  Create a function that takes two strings as a parameter
	//  Returns the starting index where the second one is starting in the first one
	//  Returns `-1` if the second string is not in the first one

	function substring(string $str, string $keyword) : int {
		return !strpos($str, $keyword) ? -1 : strpos($str, $keyword);
	}
	echo substring('this is what I\'m searching in', 'searching') . "<br>";
	echo substring('this is what I\'m searching in', 'not') . "<br>";

	// diagonal matrix
	// - Create (dynamically*) a two dimensional list
	//   with the following matrix**. Use a loop!
	//
	//   0 0 0 1
	//   0 0 1 0
	//   0 1 0 0
	//   1 0 0 0
	//
	// - Print this two dimensional list to the page
	//
	// * size should depend on a variable

	function printMatrix(int $size) : array {
		$outputMatrix = [];

		for ($i = $size; $i > 0; $i--) {
			$row = [];
			for ($j = 0; $j < $size; $j++) {
				array_push($row, 0);
			}
			$row[$i-1] = 1;
			array_push($outputMatrix, $row);
		}
		return $outputMatrix;
	}

	foreach (printMatrix(10) as $row) {
		foreach ($row as $value) {
			echo $value;
		};
		echo "<br>";
	};

	//	Bubbles
	//  Create a function that takes a list of numbers as parameter
	//  Returns a list where the elements are sorted in ascending numerical order
	//  Make a second boolean parameter, if it's `true` sort that list descending

	function bubble(array $arr) : array {
		sort($arr);
		return $arr;
	}
	
	function advancedBubble(array $arr, bool $isDescending) : array {
		$isDescending ? rsort($arr) : sort($arr);
		return $arr;
	}

	foreach (bubble([43, 12, 24, 9, 5]) as $value) {
		echo $value;
	};
	echo "<br>";
	foreach (advancedBubble([43, 12, 24, 9, 5], true) as $value) {
		echo $value;
	};
	echo "<br>";

	//	Factorio
	// - Create a function called `factorio`
	//   that returns it's input's factorial

	function factorio(int $input) : int {
		if ($input <= 1) {
			return 1;
		} else {
			return $input * factorio($input - 1);
		}
	};

	echo factorio(5) . "<br>";
	
	//	GCD
	//	Find the greatest common divisor of two numbers using recursion.

	function gcd(int $num1, int $num2) : int {
		if ($num1 % $num2 === 0) {
			return $num2;	
		} else {
			$remainder = $num1 % $num2;
			return gcd($num2, $remainder);
		}
	};
	echo gcd(18, 48) . "<br>";

	//	telephone book
	//	Create an application which solves the following problems.
	//		What is John K. Miller's phone number?
	//		Whose phone number is 307-687-2982?
	//		Do we know Chris E. Myers' phone number?

	$phoneBook = array(
		'William A. Lathan' => '405-709-1865',
		"John K. Miller" => "402-247-8568",
		'Hortensia E. Foster' => '606-481-6467',
		'Amanda D. Newland' => '319-243-5613',
		'Brooke P. Askew' => '307-687-2982',
	);
	function solver() {
		$millersnumber = '';
		$searchednumber = '';
		$isMyersInIt = false;
		global $phoneBook;
		foreach ($phoneBook as $key => $value) {
			$key === "John K. Miller" ? $millersnumber = $value : null;
		};
		$searchednumber = array_keys($phoneBook, '307-687-2982', true)[0];
		$isMyersInIt = array_key_exists('Chris E. Myers', $phoneBook);

		echo "Miller's number is $millersnumber" . "<br>";
		echo "The number is $searchednumber's" . "<br>";
		echo !$isMyersInIt ? "We don't have Myer's number." . "<br>" : "We have Myer's number!" . "<br>";
	};
	solver();

	//	List introduction

	$listA = ['Apple', 'Avocado', 'Blueberries', 'Durian', 'Lychee'];

		//	Create a new list ('List B') with the values of List 
	$listB = $listA; //	works because of PHP's referencing
		//	Print out whether List A contains Durian or not
	echo array_search("Durian", $listA) ? "Yep, we have durian" . "<br>" : "Nope, go somewhere else" . "<br>";
		//	Remove Durian from List B
	$durianIndex = array_keys($listB, "Durian")[0];
	/* unset($listB[$durianIndex]); */	//	this leaves the original indexes intact so there would be "holes" in it
	array_splice($listB, $durianIndex, 1);
		//	Add Kiwifruit to List A after the 4th element
	array_splice($listA, 4, 0, "Kiwifruit");
		//	Compare the size of List A and List B
	echo sizeof($listA) > count($listB) ?
		"A list is longer than B" . "<br>" : ( sizeof($listB) > count($listA) ?
			"B listis longer than A" . "<br>" : "Their length is identical" . "<br>" );
		//	Get the index of Avocado from List A	
	echo array_search("Avocado", $listB) . "<br>";
		//	Get the index of Durian from List B
	echo array_search("Durian", $listA) . "<br>";
		//	Add Passion Fruit and Pummelo to List B in a single statement
	array_push($listB, "Passion Fruit", "Pummelo");
		//	Print out the 3rd element from List A	
	echo $listA[2] . "<br>";

	//	Map introduction

	$originalMap = array(
		"978-1-60309-452-8" => "A Letter to Jo",
		"978-1-60309-459-7" => "Lupus",
		"978-1-60309-444-3" => "Red Panda and Moon Bear",
		"978-1-60309-461-0" => "The Lab",
	);
		//	Print all the key-value pairs in the following format
	foreach ($originalMap as $key => $value) {
		echo "$value (ISBN: $key)" . "<br>";
	};
		//	Remove the key-value pair with key 978-1-60309-444-3
	$indexOfRemoval = array_search("978-1-60309-444-3", array_keys($originalMap));
	array_splice($originalMap, $indexOfRemoval, 1);
		//	Remove the key-value pair with value The Lab
	$indexOfLab = array_search("The Lab", array_values($originalMap));
	array_splice($originalMap, $indexOfLab, 1);
		//	Add the following key-value pairs to the map...
	$originalMap["978-1-60309-450-4"] = "They Called Us Enemy";
	$originalMap["978-1-60309-453-5"] = "Why Did We Trust Him?";
		//	Print whether there is an associated value with key 478-0-61159-424-8 or not
	echo array_search("478-0-61159-424-8", $originalMap) ? 
		"There is a book under this ISBN" . "<br>" : "There is no book under this ISBN" . "<br>";
		//	Print the value associated with key 978-1-60309-453-5
	echo $originalMap["978-1-60309-453-5"] . "<br>";

	//	He Will Never
	//	Things are a little bit messed up
	//	Your job is to decode the notSoCrypticMessage by using the hashmap as a look up table
	//	Assemble the fragments into the out variable

	(string) $out = "";
	(array) $notSoCrypticMessage = [1, 12, 1, 2, 11, 1, 7, 11, 1, 49, 1, 3, 11, 1, 50, 11];

	(array) $hashmap = array(
    7 => (string) "run around and desert you",
    50 => (string) "tell a lie and hurt you ",
    49 => (string) "make you cry, ",
    2 => (string) "let you down",
    12 => (string) "give you up, ",
    1 => (string) "Never gonna ",
    11 => (string) "\n",
    3 => (string) "say goodbye "
	);
	foreach ($notSoCrypticMessage as $numCode) {
		echo $hashmap[$numCode] . "<br>";
	};

	//	Dominoes
	//	You have the list of Dominoes
	//	Order them into one snake where the adjacent dominoes have the same numbers on their adjacent sides
	//	eg: [2, 4], [4, 3], [3, 5] ...

	class Domino {
		public $values;

		private function __construct(int $a, int $b) {
			echo "Constructed Domino instance";
			$this->values = [$a, $b];
		}

		private function __destruct() {
			echo "KABOOM";
		}
	};

?>