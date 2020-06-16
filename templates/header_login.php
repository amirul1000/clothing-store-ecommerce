<?php
   /* require_once("../common/lib.php");
	require_once("../lib/class.db.php");
	require_once("../common/config.php");*/
	 if(!empty($_SESSION['users_id']))
	  {
	?>
	  <?=$_SESSION["first_name"]?>&nbsp;&nbsp;<?=$_SESSION["last_name"]?> 
	  <a href="../registration/registration.php?cmd=list">Profile</a> |
	  <a href="../my_orders/my_orders.php?cmd=list">My orders</a> | 
	  <a href="../login/login.php?cmd=logout">Logout</a>
   <?php
	 }
	  else
	  {
   ?>      
	<a href="../registration/registration.php">Sign Up</a> | 
	<a href="../login/login.php">Login</a>
  <?php
	}
?> 