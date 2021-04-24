<?php

include "classSimpleImage.php";
include "db.php";


define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", ROOT . "/gallery_img/big/");
define("IMG_SMALL", ROOT . "/gallery_img/small/");
define("THUMB", "/gallery_img/small/");

$images = mysqli_query($db, "SELECT * FROM `images` ORDER BY views DESC");


$msgArr = [
    '1' => "Image added!",
    '2' => "File upload error!",
    '3' => "We do not allow uploading PHP files..",
    '4' => "We only accept GIF, JPEG and PNG images.",
    '5' => "Max file size of 5 MB exceeded!",
];

if (isset($_GET['message'])) {
    $message = $msgArr[$_GET['message']];
}

//uploading images

if (isset($_POST['load'])) {
    
    include "upload.php";

}


?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Gallery</title>
    <style>
        .pic {margin: 5px;}
    </style>
</head>
<body>
<?php include "menu.php" ?><br>
<?if ($images->num_rows > 0): ?>
    <?foreach ($images as $item): ?>
        <a href="/image.php?id=<?=$item['id']?>"><img class='pic' src="<?=THUMB . $item['filename']?>"></a>
        <?= $item['views'] ?>
    <?endforeach;?>
<?else: ?>
    <p>Gallery is empty!</p>
<?endif;?>

<br>
<p>Upload an image:</p>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="load" value="Upload">
</form>
<?=$message?>
</body>
</html>