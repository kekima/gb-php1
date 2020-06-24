<?php

function recAdd ($a, $numString) {

	if ($a < 15) {
		$numString .= "${a} ";
		return recAdd($a + 1, $numString);
	} else {
		$numString .= "${a}";
		echo "The resulting string of numbers = \"${numString}\"";		
	}
}

$a = rand(0, 15);
$numString = "";

echo "a = {$a}<br>";

echo recAdd($a, $numString);