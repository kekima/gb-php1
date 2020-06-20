<?php
//Intentionally adding -1 and -2 to the mix for the occasional default message to pop
	$a = rand(-2, 15);
	$numString = "";

echo "a = {$a}<br>";

switch ($a) {
		case 0:
			$numString .= "0 ";
		case 1:
			$numString .= "1 ";
		case 2:
			$numString .= "2 ";
		case 3:
			$numString .= "3 ";
		case 4:
			$numString .= "4 ";
		case 5:
			$numString .= "5 ";
		case 6:
			$numString .= "6 ";
		case 7:
			$numString .= "7 ";
		case 8:
			$numString .= "8 ";
		case 9:
			$numString .= "9 ";
		case 10:
			$numString .= "10 ";
		case 11:
			$numString .= "11 ";
		case 12:
			$numString .= "12 ";
		case 13:
			$numString .= "13 ";
		case 14:
			$numString .= "14 ";
		case 15:
			$numString .= "15";
			echo "The resulting string of numbers = \"${numString}\"";
			break;
		default:
		echo "Something went wrong..";
		break;
	}