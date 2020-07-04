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
    <title>Calc 2</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="operand1" value="<?=$_POST['operand1']?>">
    <input type="text" name="operand2" value="<?=$_POST['operand2']?>">
    <br><br>
    <button type="submit" value="add" name="operation">+</button>
    <button type="submit" value="sub" name="operation">-</button>
    <button type="submit" value="multi" name="operation">*</button>
    <button type="submit" value="div" name="operation">/</button>
    <p> <? if (isset($result)) echo "$result" ?> </p>
</form>

</body>
</html>