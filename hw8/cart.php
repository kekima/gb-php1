<?php 

define("IMG", "/img/");

include ("db.php");

//$session = session_id();
$cart = mysqli_query($db, "SELECT cart.id cart_id, goods.image, goods.id good_id, goods.name, goods.descr,
goods.price FROM cart,goods WHERE cart.good_id=goods.id AND session_id = '{$session}'");

$totalPrice = 0;
foreach ($cart as $item) {
    $totalPrice += $item['price'];
}


if (isset($_GET['message'])) {
    $message = "Your order has been placed, thank you!";
} else {
    $message = "Your cart is empty!";
    //$message = !count($cart) ? "Your cart is empty!" : '';
}


if ($_GET['action'] == 'delete') {
    $id = (int)$_GET['id'];
    //$session = session_id();
    $result = mysqli_query($db, "SELECT `session_id` FROM `cart` WHERE `id`={$id}");
    mysqli_query($db, "DELETE FROM `cart` WHERE `cart`.`id` = {$id} AND session_id = '{$session}'");
    header("Location: /cart.php", true, 302);
    exit();
}

if ($_GET['action'] == 'checkout') {
    $msgDate = date("d M Y, H:i");
    $username = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['username'])));
    $phone = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['phone'])));
    $address = strip_tags(htmlspecialchars(mysqli_real_escape_string($db, $_POST['address'])));
    mysqli_query($db, "INSERT INTO `orders` (`username`, `phone`, `address`, `session_id`, `totalprice`, `date`) VALUES ('{$username}', '{$phone}', '{$address}', '{$session}', {$totalPrice}, '{$msgDate}')") or die(mysqli_error($db));
    session_regenerate_id();
    header("Location: ?message=done", true, 302);
    exit();
}


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
    <div><h2>Cart</h2>
    <div class="main-block">
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
            </div>
            <br>Total: <?= $totalPrice ?> rub<br><br>
            <div><h2>Checkout</h2></div>            
            <form autocomplete="off" action="?action=checkout" method="post">
                <input type="text" placeholder="Your name" name="username" maxlength="30" value="<?=$row['username']?>" required> <small>max - 30 characters</small><br>
                <input type="tel" pattern="8-[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Your phone number" name="phone" value="<?=$row['phone']?>" required> <small>format: 8-123-456-78-90</small><br>
                <input type="text" placeholder="Your address" name="address" maxlength="50" value="<?=$row['address']?>" required> <small>max - 50 characters</small><br><br>
                <input type="submit" name="checkout" value="Place order">
            </form>

            <? else: ?>
        <?= $message ?>
    <? endif; ?>
    </div>
    <br>
</div>

</body>
</html>