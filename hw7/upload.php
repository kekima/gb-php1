<?php

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