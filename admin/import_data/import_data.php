<?php
       session_start();
       include("../../common/lib.php");
	   include("../../lib/class.db.php");
	   include("../../common/config.php");
	   include("../../lib/lib.scrapper.php");
	    if(empty($_SESSION['users_id'])) 
	   {
	     Header("Location: ../login/login.php");
	   }
	  
	   $cmd = $_REQUEST['cmd'];	   
	   switch($cmd)
	   {
	     
		  case 'add': 
				$info['table']    = "import_data";
				$data['uploaded_users_id'] = $_SESSION['users_id'];
				$data['user']   = $_REQUEST['user'];
                $data['found_at']   = $_REQUEST['found_at'];
                $data['url']   = $_REQUEST['url'];
                $data['type']   = $_REQUEST['type'];
                $data['size']   = $_REQUEST['size'];
                $data['service']   = $_REQUEST['service'];
                $data['flag']   = 'new';
				
				if(empty($_REQUEST['id']))
				{
					 $data['date_created']   = date("Y-m-d H:i:s");	
					 $info['data']     =  $data;
					 				
					 $db->insert($info);
				}
				else
				{
				    $info['data']     =  $data;
					$Id            = $_REQUEST['id'];
					$info['where'] = "id=".$Id;
					
					$db->update($info);
				}
				
				include("../import_data/import_data_list.php");						   
				break;    
		case "edit":      
				$Id               = $_REQUEST['id'];
				if( !empty($Id ))
				{
					$info['table']    = "import_data";
					$info['fields']   = array("*");   	   
					$info['where']    =  "id=".$Id;
				   
					$res  =  $db->select($info);
				   
					$Id        = $res[0]['id'];  
					$uploaded_users_id = $_SESSION['users_id'];
				    $user   = $res[0]['user'];
					$found_at    = $res[0]['found_at'];
					$url    = $res[0]['url'];
					$type    = $res[0]['type'];
					$size    = $res[0]['size'];
					$service    = $res[0]['service'];
					$date_created = $res[0]['date_created'];
					$flag = $res[0]['flag'];
				 }
						   
				include("../import_data/import_data_editor.php");						  
				break;
						   
         case 'delete': 
				$Id               = $_REQUEST['id'];
				
				$info['table']    = "import_data";
				$info['where']    = "id='$Id'";
				
				if($Id)
				{
					$db->delete($info);
				}
				include("../import_data/import_data_list.php");						   
				break; 
	  case "clean_data":
	             $filePath = '../csv_files/test_files/sheet001.html';
			 	 $fp = fopen($filePath,"r");
				 $contents = fread($fp,filesize($filePath));
				
	             $tr_arr = getHTMLTagContentsByTagAttributes($contents,"tr(?:[^>]*)","tr");
				 foreach($tr_arr as $tr)
				 {
				   $td_arr[] = getHTMLTagContentsByTagAttributes($tr,"td(?:[^>]*)","td");
				 }
				
				 debug($td_arr);
				
				  
	           break;			
	  case "clean_data":
	            	$filePath = '../csv_files/test.txt';
					$fp = fopen($filePath,"r");
					$contents = fread($fp,filesize($filePath));
					$contents = str_replace(';','',$contents);
					$contents = str_replace("'",'',$contents);
					$contents = str_replace('"','',$contents);
					fclose($fp);
					
					$filePath = '../csv_files/test2.txt';
					$fp = fopen($filePath,"w");
					fwrite($fp,$contents);
					fclose($fp);
  				break;		
      case 'import_csv_data': 
				include("../../library/CSVReader.php");
				$obj = new CSVReader();
				
				//$filePath = '../csv_files/'.$_FILES['csv_file']['name'];
				$filePath = '../csv_files/test2.txt';
				/* 
				if(strlen($_FILES['csv_file']['name'])>0 && $_FILES['csv_file']['size']>0)
				{
					move_uploaded_file($_FILES['csv_file']['tmp_name'],$filePath);
				}*/
			   
				$csvarr = $obj->parse_file($filePath);
				debug($csvarr);
				//chmod($filePath,755);
				//unlink( $filePath);
				foreach($csvarr as $key=>$eachrecord)
				{	 
				    unset($extracted_data);
					foreach($eachrecord as $field=>$value)
					{   
						$extracted_data[] = $value;
						
					}
					//debug($extracted_data);
					
					//check exits link
					
					  /*if(strlen($extracted_data[2])>0)
					   {
							 unset($info);
							 unset($data);
							$info['table']    = "import_data";
							$data['uploaded_users_id'] = $_SESSION['users_id'];
							$data['user']   = $extracted_data[0];
							$data['found_at']   = $extracted_data[1];
							$data['url']   = $extracted_data[2];
							$data['type']   = $extracted_data[3];
							$data['size']   = $extracted_data[4];
							$data['service']   = $extracted_data[5];
							$data['date_created']   = date("Y-m-d H:i:s");	
							$data['flag']   = 'new';
							//$info['debug']     = true;					
							$info['data']     =  $data;
							
							$db->insert($info);
						}*/
					
				} 				
				include("../import_data/import_data_list.php");
				break;    
		case "download_sample": 
					$path = "../sample/sample-csv-file.csv"; 
					header("Content-type: application/octet-stream");
					header("Content-disposition: attachment; filename=".basename($path));
					header("Content-Transfer-Encoding: binary");
					header("Content-Length: ".filesize("$path"));
					readfile($path);
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
				include("../import_data/import_data_list.php");
				break; 
        case "search_import_data":
				$_REQUEST['page'] = 1;  
				$_SESSION["search"]="yes";
				$_SESSION['field_name'] = $_REQUEST['field_name'];
				$_SESSION["field_value"] = $_REQUEST['field_value'];
				include("../import_data/import_data_list.php");
				break;  								   
						
	     default :    
		       include("../import_data/import_data_editor.php");		         
	   }

//Protect same image name
 function getMaxId($db)
 {
	   $info['table']    = "import_data";
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
 //check exits
 function isExists($db,$found_at,$url)  
 {
    $info["table"] = "import_data";
	$info["fields"] = array("import_data.*"); 
	$info["where"]   = "1   AND found_at='".$found_at."' AND url='".$url."'";
	$arr =  $db->select($info);
	if(count($arr)>0)
	{
	  return true;
	}
	return false;  
 }
?>
