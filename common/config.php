<?php 
 $server = 1;
 if($server==1)
 {
	   $host     = "localhost"; 
	   $database = "clothing_store";
	   $user     = "root";
	   $password = "secret";
  }
  else
  {
		$host     = "localhost"; 
		$database = "sponsor_test";
		$user     = "sponsor_test";
		$password = "test123";
  } 
   $db  = new Db($host,$user,$password,$database);
	   $user     = "";
	   $password = "";
?>
