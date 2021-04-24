<?php 

define("IMG", "/img/");

include ("db.php");

if ($_GET['action'] == 'add') {
    $id = (int)$_GET['id'];
    //$session = session_id();
    mysqli_query($db, "INSERT INTO `cart`(`good_id`, `session_id`) VALUES ({$id}, '{$session}')");
    header("Location: /catalog.php");
}

$result = mysqli_query($db, "SELECT id, image, name, price FROM `goods`");

?>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Catalog</title>
    <head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="main">
    <?php include "menu.php" ?>
    <div><h2>Catalog</h2></div>
    <div class="main-block">
        <? if ($result): ?>
            <?php foreach ($result as $item): ?>
                <div class="item-block">
                    <a class="item-center" href="/item.php?id=<?= $item['id'] ?>">
                        <h2><?= $item['name'] ?></h2>
                    <img src="<?=IMG . $item['image'] ?>" width="150"></a></br>
                    Price: <?= $item['price'] ?>
                    <br><br>
                    <a href="?action=add&id=<?= $item['id'] ?>">
                        <button>Buy this item</button>    
                    </a>      
                </div>
            <? endforeach; ?>
        <? else: ?>
        Catalog is empty!
    <? endif; ?>
    </div>
</div>

</body>
</html>