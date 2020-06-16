<?php
       session_start();
       include("../common/lib.php");
	   include("../lib/class.db.php");
	   include("../common/config.php");
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "email_us";
				$data['from_email']   = $_REQUEST['from_email'];
                $data['subject']   = $_REQUEST['subject'];
                $data['message']   = $_REQUEST['message'];
                $data['created_date_time']   = date("Y-m-d H:i:s");				
				$info['data']     =  $data;
				
				$db->insert($info);
				
				 // Always set content-type when sending HTML email
			  	  $headers = "MIME-Version: 1.0" . "\r\n";
				  $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";				
				  // More headers
				  $headers .= 'From:outofboxdeals<'.$_REQUEST['from_email'].'>' . "\r\n";
				  $headers .= 'Reply-To: '.$_REQUEST['from_email'].'' . "\r\n";
				  $headers .= 'Return-Path: '.$_REQUEST['from_email'].'' . "\r\n";
				   
				  mail("purchasing@axiamg.com",$_REQUEST['subject'],$_REQUEST['message'], $headers);	
				
				
				$message = "Your message has been sent successfully";
				include("../email_us/email_us_list.php");						   
				break;  
	     default :    
		       include("../email_us/email_us_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "email_us";
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
?>
