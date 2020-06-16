<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");	   
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     case "add_to_cart":
					  $count = count($_SESSION['cart']);
					   $flag= true;
					   for($i=0;$i<$count;$i++)
					   {
					     
					     if($_REQUEST['item_number']==$_SESSION['cart'][$i]['item_number']  && $_REQUEST['item_name']==$_SESSION['cart'][$i]['item_name'])
						 {
						   //$_SESSION['cart'][$i]['quantity'] =$_SESSION['cart'][$i]['quantity']+1;
						   $flag = false;
						   break;	 
						 }
					  }
					  
					  if($flag==true)
					  {
						$_SESSION['cart'][$count]['os0']= $_REQUEST['os0'];
						$_SESSION['cart'][$count]['os1']= $_REQUEST['os1'];
						$_SESSION['cart'][$count]['item_name']= $_REQUEST['item_name'];
						$_SESSION['cart'][$count]['item_number']= $_REQUEST['item_number'];
						$_SESSION['cart'][$count]['quantity']= $_REQUEST['quantity'];	
						$_SESSION['cart'][$count]['amount']= $_REQUEST['amount'];	
						$_SESSION['cart'][$i]['shipping_charge']=$_REQUEST['shipping_charge'];
					
					  }
				if($_REQUEST['view']=="details")
				{	  
		        	include("../products/products_details.php");   
					 break;		
				}
				else if($_REQUEST['view']=="product_list")
				{
				   include("../products/products_list.php");  
				    break;		     
				}
				include("../products/products_list.php");  
			   break;		   
	     case "details":    
		       include("../products/products_details.php");   
			   break;	
		 case "setperpage":
		         $_SESSION['rowsPerPage'] = $_REQUEST['rowsPerPage'];				 
		   	   include("../products/products_list.php");  
			   break;
		 case "setsortby";
		         $_SESSION['sort_by'] = $_REQUEST['sort_by'];				 
		   	   include("../products/products_list.php");  
			   break;
		 case "setorderby":	   
			     $_SESSION['order_by'] = $_REQUEST['order_by'];				 
		   	   include("../products/products_list.php");  
			   break; 	 
		 case "setfilterbyprice":
		     	 $_SESSION['between'] = $_REQUEST['between'];				 
		   	   include("../products/products_list.php");  
			   break; 	      		   
		 case "search":
		        if(isset($_REQUEST['search_key']))
				{
				  $_SESSION['search_key'] = $_REQUEST['search_key'];
				} 
		     	include("../products/products_list.php");  
				break;		   	   
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
				include("../products/products_list.php");
				break;
	     default :    
		       include("../products/products_list.php");         
	   }
?>
