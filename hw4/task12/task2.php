<?php

//var_dump($_FILES);
//define("IMGROOT", $_SERVER['DOCUMENT_ROOT'].'/gallery_img');

$imgArray = array_slice(scandir('gallery_img/small/'), 2);

function getGallery($imgArray) {

    foreach ($imgArray as $item) {
        //$output .= "<a href=\"" . IMGROOT . "/big/{$item}\"><img src=\"" . IMGROOT . "/small/{$item}\"></a>";
        $output .= "<a href=\"/gallery_img/big/{$item}\"><img class='pic' src=\"/gallery_img/small/{$item}\"></a>";
    }
    return $output;
};

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

<?php echo getGallery($imgArray) ?>

<br><br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <input type="submit" name="load" value="Upload">
</form>

</body>
</html>