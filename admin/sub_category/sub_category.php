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
		$info['table']    = "sub_category";
		$data['category_id'] = $_REQUEST['category_id'];
		$data['sub_cat_name'] = stripcslashes($_REQUEST['sub_cat_name']);
			
		$info['data']     =  $data;
		$duplicate = checkDuplicateSubCat($db,$_REQUEST['category_id'],stripcslashes($_REQUEST['sub_cat_name']));

		if(empty($_REQUEST['id']))
		{
			if($duplicate==false)
			{
				$db->insert($info);
			}
			else
			{
				$msg = $_REQUEST['sub_cat_name']." is already exists in this category";
			}
		}
		else
		{
			$Id            = $_REQUEST['id'];
			$info['where'] = "id=".$Id;

			$db->update($info);
		}

		include("../sub_category/sub_category_list.php");
			
		break;
			
			
	case "edit":       $Id               = $_REQUEST['id'];
	if( !empty($Id ))
	{
		$info['table']    = "sub_category";
		$info['fields']   = array("*");
		$info['where']    =  "id=".$Id;

		$res  =  $db->select($info);

		$Id        = $res[0]['id'];
		$category_id =  $res[0]['category_id'];
		$sub_cat_name =  $res[0]['sub_cat_name'];

	}
	include("../sub_category/sub_category_editor.php");

	break;

	case 'delete':
		$Id               = $_REQUEST['id'];
		$info['table']    = "sub_category";
		$info['where']    = "id='$Id'";

		if($Id)
		{
			$db->delete($info);
		}
		include("../sub_category/sub_category_list.php");
			
		break;
			
			
	case "list" :    	 if(!empty($_REQUEST['page'])&&$_SESSION["search"]=="yes")
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
	include("../sub_category/sub_category_list.php");
	break;
	case "search_sub_category":
		$_REQUEST['page'] = 1;
		$_SESSION["search"]="yes";
		$_SESSION['field_name'] = $_REQUEST['field_name'];
		$_SESSION["field_value"] = $_REQUEST['field_value'];
		include("../sub_category/sub_category_list.php");
		break;

	default   :    include("../sub_category/sub_category_list.php");

}
/*
 Check duplicate sub caregory name
*/
function checkDuplicateSubCat($db,$category_id,$sub_cat_name)
{

	$info['table']    = "sub_category";
	$info['fields']   = array("*");
	$info['where']    =  " category_id='".$category_id."' AND sub_cat_name='".$sub_cat_name."'";

	$res  =  $db->select($info);
	if(count($res)>0)
	{
		return true;
	}
	return false;
}
?>
