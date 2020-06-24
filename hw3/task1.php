<?php

$k = 0;
do {
	$base_text = "Число {$k}";
	$not_div3 = true;
	for ($i = 0; $i < $k; $i++) {
		if ($k % 3 === 0) {
			$not_div3 = false;
		}
	}
	if ($not_div3 === false || $k === 0) {
		echo $base_text . " делится на 3 без остатка.<br>";
	}
	$k++;
}
while ($k <= 100);
