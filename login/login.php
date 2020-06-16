<?php
	session_start();
	ob_start();
	include("../common/lib.php");
	include("../lib/class.db.php");
	include("../common/config.php");
	
	$cmd = $_REQUEST['cmd'];
	
	switch($cmd)
	{
	
		case "login":
			$info["table"]     = "users";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND email  LIKE BINARY '".clean($_REQUEST["email"])."' AND password  LIKE BINARY '".clean($_REQUEST["password"])."' AND type='client'";
			$res  = $db->select($info);
			if(count($res)>0)
			{
				$_SESSION["users_id"]   = $res[0]["id"];
				$_SESSION["email"]      = $res[0]["email"];
				$_SESSION["first_name"] = $res[0]["first_name"];
				$_SESSION["last_name"]  = $res[0]["last_name"];
				$_SESSION["type"]       = $res[0]["type"];
				
				Header("Location: ../registration/registration.php?cmd=list");
			}
			else
			{
				$message="Login fail,Please verify your userid or password";
				include("login_editor.php");
			}
			break;
		case "logout":
			session_destroy();
			unset($_SESSION["users_id"]);
			unset($_SESSION["email"]);
			unset($_SESSION["first_name"]);
			unset($_SESSION["last_name"]);
			unset($_SESSION["type"]);
	
			include("login_editor.php");
			break;
		case "forget_editor":
			include("forget_editor.php");
			break;
		case "forget_pass":
			$info["table"]     = "users";
			$info["fields"]   = array("*");
			$info["where"]    = " 1=1 AND email  LIKE BINARY '".$_REQUEST["email"]."'";
			$res  = $db->select($info);
			if(count($res)>0)
			{
					
				$email      = $res[0]["email"];
				$password      = $res[0]["password"];
				$body = "Email:".$email."  password:".$password;
				mail($email,"Recover password",$body);
				include("login_editor.php");
			}
			else
			{
				$message ="No Email is exists with this email";
				include("forget_editor.php");
				break;
			}
			break;
		default :
			include("login_editor.php");
	}
	/*
	  check user plan exits
	*/
	function clean($str) {
			$str = @trim($str);
			if(get_magic_quotes_gpc()) {
				$str = stripslashes($str);
			}
			return mysql_real_escape_string($str);
		}		
?>