<?php

function addition($a, $b) {
	return "a+b=" . ($a + $b) . "<br>";
}

function subtraction($a, $b) {
	return "a-b=" . ($a - $b) . "<br>";
}

function division($a, $b) {
	if ($b == 0) {
		return "a/b= not possible to divide by zero!<br>";
	} else {
		return "a/b=" . round($a / $b, 2) . "<br>";
	}
}

function multiplication($a, $b) {
	return "a*b=" . ($a * $b) . "<br>";
}

$a = rand(0, 10);
$b = rand(0, 10);

echo "a = {$a}, b = {$b}<br><br>";

echo addition($a, $b);
echo subtraction($a, $b);
echo division($a, $b);
echo multiplication($a, $b);