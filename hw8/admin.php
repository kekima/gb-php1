<?php

include "db.php";

if (!is_admin()) Die("Sorry, you're not an admin! <br><a href=\"/\">[Exit]</a>");

$result = mysqli_query($db, "SELECT id, username, phone, address, status, totalprice, date FROM `orders` ORDER BY id DESC");


if ($_GET['action'] == "changestatus" && (is_admin())) {
    $id = (int)$_GET['id'];
    //$status = ;
    $status = ($_GET['status'] == 0) ? $status = 1 : $status = 0;
    $sql = "UPDATE `orders` SET `status` = '{$status}' WHERE `orders`.`id` = {$id};";
    $result = mysqli_query($db, $sql);
    header("Location: ?message=statuschange");
die();
}

$message = [
    "statuschange" => "The status has been changed."
];

?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='utf-8'>
    <title>Admin panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php include "menu.php" ?><br>
<?=$message[$_GET['message']]?><br>
<div><h2>List of orders</h2></div>
    <div class="main-block-list">
        <? if ($result): ?>
            <?php foreach ($result as $order): ?>
                <div class="order-block">
                    <h2>Order number: <?= $order['id'] ?></h2> 
                    <a href="/order.php?id=<?= $order['id'] ?>">
                        <button>More info</button>    
                    </a><br><br> 
                    <b>Timestamp:</b> <?= $order['date'] ?></br>                  
                    <b>Buyer's name:</b> <?= $order['username'] ?></br>
                    <b>Buyer's phone:</b> <?= $order['phone'] ?></br>
                    <b>Buyer's address:</b> <?= $order['address'] ?></br>
                    <br>
                    <b>Total price:</b> <?= $order['totalprice'] ?> rub
                    <br><br>
                    <b>Status:</b>

                    <?if ($order['status'] == 0) :?>
                        Active
                    <? else: ?>
                        Finished
                    <? endif; ?></br> 

                    <a href="?action=changestatus&id=<?= $order['id'] ?>&status=<?= $order['status'] ?>">
                        <button>Change Status</button>    
                    </a>         
                </div>
            <? endforeach; ?>
        <? else: ?>
        There are no orders placed currently. Work harder!
    <? endif; ?>
    </div>
</body>
</html>