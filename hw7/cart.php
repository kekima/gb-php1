<?php 

define("IMG", "/img/");

include ("db.php");

if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    //$session = session_id();
    $result = mysqli_query($db, "SELECT `session_id` FROM `cart` WHERE `id`={$id}");
    mysqli_query($db, "DELETE FROM `cart` WHERE `cart`.`id` = {$id}");
    header("Location: /cart.php");
}

$cart = mysqli_query($db, "SELECT cart.id cart_id, goods.image, goods.id good_id, goods.name, goods.descr,
 goods.price FROM cart,goods WHERE cart.good_id=goods.id AND session_id = '{$session}'");

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
    <div><h2>Cart</h2></div>
    <div>
    <? if ($count != 0): ?>
            <?php foreach ($cart as $item): ?>
                <div class="item-block">
                        <h2><?= $item['name'] ?></h2>
                    <img src="<?=IMG . $item['image'] ?>" width="150"></br>
                    Price: <?= $item['price'] ?>
                    <br><br>
                    <a href="?action=delete&id=<?= $item['cart_id'] ?>">
                        <button>Remove</button>    
                    </a>      
                </div>
            <? endforeach; ?>
            <? else: ?>
        Your cart is empty!
    <? endif; ?>
    </div>
</div>

</body>
</html>