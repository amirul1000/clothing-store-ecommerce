<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/login.php");
	   }
	  
	   $cmd = $_REQUEST['cmd'];
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "email_us";
				$data['from_email']   = $_REQUEST['from_email'];
                $data['subject']   = $_REQUEST['subject'];
                $data['message']   = $_REQUEST['message'];
                $data['created_date_time']   = $_REQUEST['created_date_time'];
                
				
				$info['data']     =  $data;
				
				if(empty($_REQUEST['id']))
				{
					 $db->insert($info);
				}
				else
				{
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("../email_us/email_us_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "email_us";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$from_email    = $res[0]['from_email'];
					$subject    = $res[0]['subject'];
					$message    = $res[0]['message'];
					$created_date_time    = $res[0]['created_date_time'];
					
				 }
						   
				include("../email_us/email_us_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "email_us";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("../email_us/email_us_list.php");						   
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
				include("../email_us/email_us_list.php");
				break; 
        case "search_email_us":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
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
