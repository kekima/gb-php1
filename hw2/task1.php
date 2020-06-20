<?php
	$a = rand(-10, 10);
	$b = rand(-10, 10);

echo "a = {$a}, b = {$b}<br>";

if ($a >= 0 && $b >= 0) {
	echo "a-b=".($a - $b);
} else if ($a < 0 && $b < 0) {
	echo "a*b=".($a * $b);
} else {
	echo "a+b=".($a + $b);
}
