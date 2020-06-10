<?php
	$a = 1;
	$b = 2;

echo "a = {$a}, b = {$b}\n";

// the fastest way
function var1($a, $b) {
	$temp = $a;
	$a = $b;
	$b = $temp;
	echo "a = {$a}, b = {$b}\n";
};

var1($a, $b);

// only works with numbers
function var2($a, $b) {
	$a ^= $b ^= $a ^= $b;
	echo "a = {$a}, b = {$b}\n";
};

var2($a, $b);

// slower because of the function call
function var3($a, $b) {
	list($a,$b) = array($b,$a);
	echo "a = {$a}, b = {$b}\n";
};

var3($a, $b);



echo "a = {$a}, b = {$b}\n";

?>