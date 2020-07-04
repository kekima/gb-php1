<?php

//var_dump($_POST);

$result = "";

$operand1 = (int)$_POST['operand1'];
$operand2 = (int)$_POST['operand2'];

if ($_POST['operand1'] || $_POST['operand2']) {

switch ($_POST['operation']) {
    case 'add':
        $result = $operand1 + $operand2;
        break;
    case 'sub':
        $result = $operand1 - $operand2;
        break;
    case 'multi':
        $result = $operand1 * $operand2;
        break;
    case 'div':
        ($operand2 == 0) ? $result = "Can't divide by zero!" : $result = $operand1 / $operand2;
        break;
    default:
        $result = "Something went wrong..";
        break;
    }
}

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Calc 1</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="operand1" value="<?=$_POST['operand1']?>">
    <select name="operation">
        <option <?if ($_POST['operation'] == 'add') echo "selected"; ?> value="add">+</option>
        <option <?if ($_POST['operation'] == 'sub') echo "selected"; ?> value="sub">-</option>
        <option <?if ($_POST['operation'] == 'multi') echo "selected"; ?> value="multi">*</option>
        <option <?if ($_POST['operation'] == 'div') echo "selected"; ?> value="div">/</option>
    </select>
    <input type="text" name="operand2" value="<?=$_POST['operand2']?>">
    <br><br>
    <input type="submit" value="Calculate!">
    <p> <? if (isset($result)) echo "$result" ?> </p>
</form>

</body>
</html>