<?php 

define("IMG", "/img/");

include ("db.php");

$result = mysqli_query($db, "SELECT id, image, name, price FROM `goods`");

?>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Catalog</title>
    <style>
        .item-block {margin: 5px; width: 210px; height: 250px; box-shadow: 0 0 5px grey; display: flex; align-items: center; justify-content: center; flex-direction: column;}
    </style>
</head>
<body>
<div id="main">
    <?php include "menu.php" ?>
    <div><h2>Catalog</h2></div>
    <div>
        <? if ($result): ?>
            <?php foreach ($result as $item): ?>
                <div class="item-block">
                    <a href="/item.php?id=<?= $item['id'] ?>">
                        <h2><?= $item['name'] ?></h2>
                    <img src="<?=IMG . $item['image'] ?>" width="150"></a></br>
                    Price: <?= $item['price'] ?>
                    <br><br>
                    <button>Buy this item</button>          
                </div>
            <? endforeach; ?>
        <? else: ?>
        Catalog is empty!
    <? endif; ?>
    </div>
</div>

</body>
</html>