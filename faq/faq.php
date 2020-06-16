<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");	   
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     					   
         case "list" :    	 
			  if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
				{
				  $_SESSION["search"]="yes";
				}
				else
				{
				   $_SESSION["search"]="no";
					unset($_SESSION["search"]);
					unset($_SESSION['field_name']);
					unset($_SESSION["field_value"]); 
				}
				include("../faq/faq_list.php");
				break;
	     default :    
		       include("../faq/faq_list.php");         
	   }
?>
