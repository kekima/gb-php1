<?php

function mathOperation($a, $b, $operation) {
	switch ($operation) {

	case "addition":
		return "a+b=" . ($a + $b) . "<br>";
		break;
	

	case "subtraction": 
		return "a-b=" . ($a - $b) . "<br>";
		break;	

	case "division": 
		if ($b == 0) {
			return "a/b= not possible to divide by zero!<br>";
			break;
		} else {
			return "a/b=" . round($a / $b, 2) . "<br>";
			break;
		}	

	case "multiplication":
		return "a*b=" . ($a * $b) . "<br>";
		break;
	}
}

$a = rand(0, 10);
$b = rand(0, 10);

echo "a = {$a}, b = {$b}<br><br>";

echo mathOperation($a, $b, "addition");
echo mathOperation($a, $b, "subtraction");
echo mathOperation($a, $b, "division");
echo mathOperation($a, $b, "multiplication");