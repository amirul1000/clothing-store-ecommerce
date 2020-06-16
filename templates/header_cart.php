<?php
 ob_start(); 
 session_start();
 $count = count($_SESSION['cart']);
?>

<p><?=$count?> Items in cart</p>
<a href="../cart/cart.php" id="view-cart" class="eye-btn">View Cart</a>
<a href="../cart/cart.php" id="check-out" class="eye-btn">Check Out</a>