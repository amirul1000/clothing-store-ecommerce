<?php
function record_count($db,$whrstr)
{
     unset($info);
    $info["table"] = "products";
	$info["fields"] = array("products.*"); 
	$info["where"]   = "1   $whrstr ";
	$arr =  $db->select($info);
	return count($arr);
}
?>