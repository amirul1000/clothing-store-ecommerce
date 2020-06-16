<?php
session_start();
include("../common/lib.php");
include("../lib/class.db.php");
include("../common/config.php");
 
$cmd = $_REQUEST['cmd'];
switch($cmd)
{

	case 'add':
		$info['table']    = "users";
		$data['email']   = $_REQUEST['email'];
		$data['password']   = $_REQUEST['password'];
		$data['title']   = $_REQUEST['title'];
		$data['first_name']   = $_REQUEST['first_name'];
		$data['last_name']   = $_REQUEST['last_name'];
		$data['company']   = $_REQUEST['company'];
		$data['address']   = $_REQUEST['address'];
		$data['city']   = $_REQUEST['city'];
		$data['state']   = $_REQUEST['state'];
		$data['zip']   = $_REQUEST['zip'];
		$data['country_id']   = $_REQUEST['country_id'];
		$data['created_at']   = date("Y-m-d H:i:s");
		$data['updated_at']   = date("Y-m-d H:i:s");
		$data['type']   = 'client';
		$data['status']   = 'active';
				
		$info['data']     =  $data;

		if(empty($_REQUEST['id']))
		{
		  if(!account_exits($db,$_REQUEST['email']))
		  {
			$db->insert($info);
			$id = $db->lastInsert(true);
			login($db,$id);
		  }	
		  else
		  {
		    $email    = $res[0]['email'];
			$title    = $_REQUEST['title'];
			$first_name    = $_REQUEST['first_name'];
			$last_name    = $_REQUEST['last_name'];
			$company    = $_REQUEST['company'];
			$address    = $_REQUEST['address'];
			$city    = $_REQUEST['city'];
			$state    = $_REQUEST['state'];
			$zip    = $_REQUEST['zip'];
			$country_id    = $_REQUEST['country_id'];
			$created_at    = $_REQUEST['created_at'];
			$updated_at    = $_REQUEST['updated_at'];
		    $message = "This account is already exits,Please login";
			include("../registration/registration_editor.php");
			break;
		  }
		}
		else
		{
			$Id            = $_REQUEST['id'];
			$info['where'] = "id=".$Id;
			$db->update($info);
		}
		include("../registration/registration_list.php");
		break;
	case "edit":
		if(empty($_SESSION['users_id']))
		{
			Header("Location: ../login/login.php");
		}
		 
		$Id               = $_REQUEST['id'];
		if( !empty($Id ))
		{
			$info['table']    = "users";
			$info['fields']   = array("*");
			$info['where']    =  "id=".$Id;
				
			$res  =  $db->select($info);
				
			$Id        = $res[0]['id'];
			$email    = $res[0]['email'];
			$password    = $res[0]['password'];
			$title    = $res[0]['title'];
			$first_name    = $res[0]['first_name'];
			$last_name    = $res[0]['last_name'];
			$company    = $res[0]['company'];
			$address    = $res[0]['address'];
			$city    = $res[0]['city'];
			$state    = $res[0]['state'];
			$zip    = $res[0]['zip'];
			$country_id    = $res[0]['country_id'];
			$created_at    = $res[0]['created_at'];
			$updated_at    = $res[0]['updated_at'];
			$type    = $res[0]['type'];
			$status    = $res[0]['status'];
		}
			
		include("../registration/registration_editor.php");
		break;
	case "list" :
	    if(empty($_SESSION['users_id']))
		{
			Header("Location: ../login/login.php");
		}
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
		include("../registration/registration_list.php");
		break;
	default:
			include("../registration/registration_editor.php");
		 
}

//Protect same image name
function getMaxId($db)
{
	$info['table']    = "registration";
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
//check email
function account_exits($db,$email)
{
     unset($info);
  	$info["table"] = "users";
	$info["fields"] = array("users.*");
	$info["where"]   = "1 AND email='".$email."'";
	$arr =  $db->select($info);	
	if(count($arr)>0)
	{
	 return true;
	}
	return false;
}
/*
  Login
*/
function login($db,$id)
{
      unset($info);
    $info["table"]     = "users";
	$info["fields"]   = array("*");
	$info["where"]    = " 1=1 AND id='".$id."'";
	$res  = $db->select($info);
	if(count($res)>0)
	{
		$_SESSION["users_id"]   = $res[0]["id"];
		$_SESSION["email"]      = $res[0]["email"];
		$_SESSION["first_name"] = $res[0]["first_name"];
		$_SESSION["last_name"]  = $res[0]["last_name"];
		$_SESSION["type"]       = $res[0]["type"];
	}
}
?>
