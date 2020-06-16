<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "subscribe";
				$data['email']   = $_REQUEST['email'];
                $data['status']   = 'active';
				$info['data']     =  $data;
				
				 if(checkemailexits($db,$_REQUEST['email'])==false)
				   {
					 $db->insert($info);
					 $message = "Subscription has been completed successfully";
				   } 
				   else
				   {
					   $message = "The email You entered  already has been subscribed"; 
				   }
				
				include("../subscribe/subscribe_list.php");						   
				break;   
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "subscribe";
	   $info['fields']   = array("max(id) as maxid");   	   
	   $info['where']    =  "1=1";
	  
	   $resmax  =  $db->select($info);
	   if(count($resmax)>0)
	   {
		 $max = $resmax[0]['maxid']+1;
	   }
	   else
	   {
		$max=0;
	   }	  
	   return $max;
 } 	 
 
 function checkemailexits($db,$email)
 {
    
		$info["table"] = "subscribe";
		$info["fields"] = array("subscribe.*"); 
		$info["where"]   = "1 AND email='".$email."'";
		$arr =  $db->select($info);
		
		if(count($arr)>0)
		{
		  return true;
		}
		return false;
 }
 
?>
