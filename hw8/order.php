<?php 

define("IMG", "/img/");

include ("db.php");

if (!is_admin()) Die("Sorry, you're not an admin! <br><a href=\"/\">[Exit]</a>");

$id = (int)$_GET['id'];

$resultorder = mysqli_query($db, "SELECT * FROM `orders` WHERE id = {$id}");
$errmessage = "";
if ($resultorder->num_rows != 0) $order = mysqli_fetch_assoc($resultorder);
else $errmessage = "This order doesn't exist!";


$cart = mysqli_query($db, "SELECT goods.image, goods.id good_id, goods.name, 
goods.price FROM cart,goods WHERE cart.good_id=goods.id AND `session_id` = '{$order['session_id']}'");

?>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Catalog</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div id="main">
    <?php include "menu.php" ?>
    <div>
        <? if (empty($errmessage)): ?>
            <h2>Order number: <?= $order['id'] ?></h2>   
                    <b>Timestamp:</b> <?= $order['date'] ?></br>                 
                    <b>Buyer's name:</b> <?= $order['username'] ?></br>
                    <b>Buyer's phone:</b> <?= $order['phone'] ?></br>
                    <b>Buyer's address:</b> <?= $order['address'] ?></br>
                    <br>
                    <b>Total price:</b> <?= $order['totalprice'] ?> rub
                    <br><br>
            <h2>List of items:</h2>

            <div class="main-block">
        <? if ($cart): ?>
            <?php foreach ($cart as $item): ?>
                <div class="item-block">
                    <h2><?= $item['name'] ?></h2>
                    <img src="<?=IMG . $item['image'] ?>" width="150"></br>
                    Price: <?= $item['price'] ?>
                    <br><br>  
                </div>
            <? endforeach; ?>
        <? else: ?>
        Order list is empty!
    <? endif; ?>
    </div>
        <? else: ?>
        <div style="color: red; font-size: 24px;"><?= $errmessage ?>
        <? endif; ?>
    </div>
</div><br><br>

</body>
</html>