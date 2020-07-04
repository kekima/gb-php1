<?php

$msgArr = [
    '1' => "Image added!",
    '2' => "File upload error!",
    '3' => "We do not allow uploading PHP files..",
    '4' => "We only accept GIF, JPEG and PNG images.",
    '5' => "Max file size of 5 MB exceeded!",
];
$message = $msgArr[$_GET['message']];

define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", "/gallery_img/big/");
define("IMG_SMALL", "/gallery_img/small/");

include "classSimpleImage.php";

include "db.php";
$images = mysqli_query($db, "SELECT * FROM `images` ORDER BY views DESC");

if (isset($_POST['load'])) {
    $imageinfo = getimagesize($_FILES['image']['tmp_name']);

$path_big = IMG_BIG.$_FILES['image']['name'];
$path_small = IMG_SMALL.$_FILES['image']['name'];


$blacklist = array(".php", ".phtml", ".php3", ".php4");
foreach($blacklist as $item) {
    if (preg_match("/$item\$/i", $_FILES['image']['name'])) {
        header("Location: /?message=3");
        exit;
    }
}

if ($imageinfo['mime'] != 'image/gif' && $imageinfo['mime'] != 'image/jpeg' && $imageinfo['mime'] != 'image/png') {
    header("Location: /?message=4");
    exit;
}

if ($_FILES['image']['size'] > 1024 * 5 * 1024) {
    header("Location: /?message=5");
}


if (move_uploaded_file($_FILES['image']['tmp_name'], $path_big)) {

    $filename = mysqli_real_escape_string($db, $_FILES['image']['name']);
    mysqli_query($db, "INSERT INTO `images`(`filename`) VALUES ('$filename')");

    $image = new SimpleImage();
    $image->load($path_big);
    $image->resizeToWidth(150);
    $image->save($path_small);
    header("Location: /?message=1");
   } else {
       header("Location: /?message=2");
   }
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
        <a href="/image.php?id=<?=$item['id']?>"><img class='pic' src="<?=IMG_SMALL . $item['filename']?>"></a>
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