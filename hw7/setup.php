<?php 
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("IMG_BIG", ROOT . "/gallery_img/big/");

include "db.php";

$result = mysqli_query($db, "SELECT id FROM images");

if ($result->num_rows == 0) {
    echo "No images yet, adding files...";
    $images = array_splice(scandir(IMG_BIG), 2);
    //var_dump($images);
    mysqli_query($db, "INSERT INTO images(`filename`) VALUES ('" . implode("'),('", $images) . "')");
} else {
    echo "Images added.";
}