<?php 

define("IMG", "/img/");

include ("db.php");

$id = (int)$_GET['id'];

$resultimg = mysqli_query($db, "SELECT * FROM `goods` where id = {$id}");
$errmessage = "";
if ($resultimg->num_rows != 0) $good = mysqli_fetch_assoc($resultimg);
else $errmessage = "This item doesn't exist!";


$row = [];
$buttonText = "Send";
$action = "add";

if ($_GET['action'] == 'delete') {
    $id_feed = (int)$_GET['id_feed'];
    $result = mysqli_query($db, "DELETE FROM `feedback` WHERE id = {$id_feed}");
    header("Location: ?id={$id}&message=delete");
}

if ($_GET['action'] == 'edit') {
    $id = (int)$_GET['id_feed'];
    $result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id = {$id}");
    $row = mysqli_fetch_assoc($result);
    $id = $row['id_image'];
    $buttonText = "Edit";
    $action = "save";
}

if ($_GET['action'] == "save") {
    $id_image = (int)$_POST['id_image'];
    $id_feed = (int)$_POST['id_feed'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db,$_POST['feedback'])));
    $sql = "UPDATE `feedback` SET `name` = '{$name}', `feedback` = '{$feedback}' WHERE `feedback`.`id` = {$id_feed};";
    $result = mysqli_query($db, $sql);
    header("Location: ?id={$id_image}&message=edit");
die();
}

if ($_GET['action'] == 'add') {
    $id_image = (int)$_POST['id_image'];
    $name = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['name'])));
    $feedback = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['feedback'])));
    $sql = "INSERT INTO `feedback` (`name`, `feedback`, `id_image`) VALUES ('{$name}', '{$feedback}', '{$id_image}');";
    $result = mysqli_query($db, $sql);
    header("Location: ?id={$id_image}&message=OK");
}

$message = [
        "OK" => "Message added.",
        "edit" => "Message edited.",
        "delete" => "Message deleted."
];


$result = mysqli_query($db, "SELECT * FROM `feedback` WHERE id_image = {$id} ORDER BY id DESC");

?>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Catalog</title>
    <style>
        .pic {margin: 5px;}
    </style>
</head>
<body>
<div id="main">
    <?php include "menu.php" ?>
    <div><h2>Item</h2></div>
    <div>
        <? if (empty($errmessage)): ?>
            <h2><?=$good['name'] ?></h2>
            <img src="<?=IMG . $good['image'] ?>"><br>
            <p><?= $good['descr'] ?></p>
            Price: <?= $good['price'] ?> rub
            <br><br>
            <button>Buy this item</button>
        <? else: ?>
        <div style="color: red; font-size: 24px;"><?= $errmessage ?>
        <? endif; ?>
    </div>
</div><br><br>

<h2>Feedback</h2>
<?=$message[$_GET['message']]?>
<form action="?action=<?=$action?>" method="post">
    <input hidden type="text" name="id_image" value="<?=$id?>"><br>
    <input hidden type="text" name="id_feed" value="<?=$row['id']?>"><br>
    <input type="text" placeholder="Name" name="name" value="<?=$row['name']?>"><br>
    <input type="text" placeholder="Feedback" name="feedback" value="<?=$row['feedback']?>"><br>
    <input type="submit" name="ok" value=<?=$buttonText?>><br>
</form><br>
<? foreach ($result as $item):?>
<div>
    <strong><?=$item['name']?></strong>: <?=$item['feedback']?>
    <a href="?id=<?=$id?>&action=edit&id_feed=<?=$item['id']?>">[edit]</a>
    <a href="?id=<?=$id?>&action=delete&id_feed=<?=$item['id']?>">[x]</a>
</div>
<?endforeach;?>

</body>
</html>