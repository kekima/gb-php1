<?php
	$val = rand(-10, 10);
	$pow = rand(-10, 10);

echo "val = {$val}, pow = {$pow}<br><br>";

function power($val, $pow) {
	if ($pow == 0) {
		return 1;
	} else if ($pow > 0) {
		return $val * power($val, $pow - 1);
	} else {
		return (1 / ($val * power($val, -$pow - 1)));
	}
}

echo "${val}^${pow}=" . power($val, $pow);

