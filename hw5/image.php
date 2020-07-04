<?php 

include "db.php";

$id = (int)$_GET['id'];
mysqli_query($db, "UPDATE `images` SET views = views + 1 WHERE id = {$id}");
$result = mysqli_query($db, "SELECT * FROM `images` WHERE id = {$id}");

$message = "";
if ($result->num_rows > 0) $image = mysqli_fetch_assoc($result);
else $message = "This image doesn't exist!";
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Image</title>
    <style>
        .pic {margin: 5px;}
    </style>
</head>
<body>

<form action="/">
    <input type="submit" value="Return">
</form>

<?if (empty($message)):?>
    <p>Просмотров: <?=$image['views']?></p>
    <img class='pic' src="/gallery_img/big/<?=$image['filename']?>">
<? else: ?>
    <p style="color: red;"><?=$message?></p>
<? endif; ?>

</body>
</html>