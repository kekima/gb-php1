<?php

$arr = [
    '1' => "Image added",
    '2' => "File upload error!",
    '3' => "We do not allow uploading PHP files.."
];

$message = $arr[$_GET['message']];

if (isset($_POST['load'])) {
//    $path = "gallery_img/big/" . $_FILES['myfile']['name'];

    $blacklist = array(".php", ".phtml", ".php3", ".php4");
    foreach ($blacklist as $item) {
     if(preg_match("/$item\$/i", $_FILES['myfile']['name'])) {
        header("Location: /?message=3");
      exit;
      }
     }
   
     $uploaddir = 'gallery_img/big/';
     $uploadfile = $uploaddir . basename($_FILES['myfile']['name']);
     
     if (move_uploaded_file($_FILES['myfie']['tmp_name'], $uploadfile)) {
        header("Location: /?message=1");
    } else {
        header("Location: /?message=2");
    }
    die;
}

$imgArray = array_slice(scandir('gallery_img/big/'), 2);
function getGallery($imgArray) {

    foreach ($imgArray as $item) {        
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
<?=$message?>
</body>
</html>