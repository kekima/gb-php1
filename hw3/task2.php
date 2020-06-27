<?php

$i = 0;
do {
	$base_text = "Число {$i} — ";
	if ($i === 0) {
		echo $base_text . "нуль.<br>";
	} else if ($i & 1) {
		echo $base_text . "нечётное.<br>";
	} else {
		echo $base_text . "чётное.<br>";
	}
	$i++;
}
while ($i <= 10);
