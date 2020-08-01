<?if (!$auth) :?>
    <form method="post">
        <input type='text' name='login' placeholder="Username">
        <input type='password' name='pass' placeholder="Password">
        <input type='submit' name='send'>
    </form>
<? else: ?>
    Welcome, <?=$user?> <a href="/?logout">[exit]</a><br>
<? endif; ?>
<br>
<a href="/">Main page</a>
<a href="/catalog.php">Catalog</a>
<a href="/cart.php">Cart </a>[<?=$count?> items]
<a href="/feedback.php">Feedback</a>
<?if (is_admin()):?>
<a href="/admin.php">Admin page</a>
<?endif;?>
<br>