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
				$info['table']    = "products";
				$data['category_id']   = $_REQUEST['category_id'];
                $data['sub_category_id']   = $_REQUEST['sub_category_id'];
                $data['brand_id']   = $_REQUEST['brand_id'];
                $data['title']   = $_REQUEST['title'];
                $data['product_condition']   = $_REQUEST['product_condition'];
                $data['sale_type']   = $_REQUEST['sale_type'];
                $data['quantity']   = $_REQUEST['quantity'];
                $data['price']   = $_REQUEST['price'];
                $data['discount']   = $_REQUEST['discount'];
                $data['shipping_cost']   = $_REQUEST['shipping_cost'];
                $data['description']   = $_REQUEST['description'];
                $data['size']   = $_REQUEST['size'];
                $data['weight']   = $_REQUEST['weight'];
                $data['color']   = $_REQUEST['color'];
                $data['shipping_desc']   = $_REQUEST['shipping_desc'];
                $data['delivery_desc']   = $_REQUEST['delivery_desc'];
                $data['payment_desc']   = $_REQUEST['payment_desc'];
                $data['return_desc']   = $_REQUEST['return_desc'];
                     
				if(strlen($_FILES['file_image1']['name'])>0 && $_FILES['file_image1']['size']>0)
				{
					
					if(!file_exists("../../products_images"))
					{ 
					   mkdir("../../products_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_image1']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_image1']['name'])));
					}
					$filePath="../../products_images/".$file;
					move_uploaded_file($_FILES['file_image1']['tmp_name'],$filePath);
					$data['file_image1']="products_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_image2']['name'])>0 && $_FILES['file_image2']['size']>0)
				{
					
					if(!file_exists("../../products_images"))
					{ 
					   mkdir("../../products_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_image2']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_image2']['name'])));
					}
					$filePath="../../products_images/".$file;
					move_uploaded_file($_FILES['file_image2']['tmp_name'],$filePath);
					$data['file_image2']="products_images/".trim($file);
				}
                     
				if(strlen($_FILES['file_image3']['name'])>0 && $_FILES['file_image3']['size']>0)
				{
					
					if(!file_exists("../../products_images"))
					{ 
					   mkdir("../../products_images",0755);	
					}
					if(empty($_REQUEST['id']))
					{
					  $file=getMaxId($db)."_".str_replace(" ","_",strtolower(trim($_FILES['file_image3']['name'])));
					}
					else
					{
					  $file=trim($_REQUEST['id'])."_".str_replace(" ","_",strtolower(trim($_FILES['file_image3']['name'])));
					}
					$filePath="../../products_images/".$file;
					move_uploaded_file($_FILES['file_image3']['tmp_name'],$filePath);
					$data['file_image3']="products_images/".trim($file);
				}
                
				
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
				
				include("../products/products_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "products";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$category_id    = $res[0]['category_id'];
					$sub_category_id    = $res[0]['sub_category_id'];
					$brand_id    = $res[0]['brand_id'];
					$title    = $res[0]['title'];
					$product_condition    = $res[0]['product_condition'];
					$sale_type    = $res[0]['sale_type'];
					$quantity    = $res[0]['quantity'];
					$price    = $res[0]['price'];
					$discount    = $res[0]['discount'];
					$shipping_cost    = $res[0]['shipping_cost'];
					$description    = $res[0]['description'];
					$size    = $res[0]['size'];
					$weight    = $res[0]['weight'];
					$color    = $res[0]['color'];
					$shipping_desc    = $res[0]['shipping_desc'];
					$delivery_desc    = $res[0]['delivery_desc'];
					$payment_desc    = $res[0]['payment_desc'];
					$return_desc    = $res[0]['return_desc'];
					$file_image1    = $res[0]['file_image1'];
					$file_image2    = $res[0]['file_image2'];
					$file_image3    = $res[0]['file_image3'];
					
				 }
						   
				include("../products/products_editor.php");						  
				break;
		case "get_sub_category":
				unset($info);
				$info["table"] = "sub_category";
				$info["fields"] = array("sub_category.*");
				$info["where"]   = "1 AND category_id='".$_REQUEST['category_id']."'";
				$arr =  $db->select($info);
				if(count($arr)>0)
				{
					echo  json_encode($arr);
				}
				break;					   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "products";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
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
        case "search_products":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../products/products_list.php");
				break;  								   
						
	     default :    
		       include("../products/products_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "products";
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
