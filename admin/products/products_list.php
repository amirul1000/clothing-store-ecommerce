<?php
 include("../template/header.php");
?>
<b><?=ucwords(str_replace("_"," ","products"))?></b>
  <table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
   <tr>
			<td align="center" valign="top">
			  <form name="search_frm" id="search_frm" method="post">
				<table width="60%" border="0"  cellpadding="0" cellspacing="0" class="bodytext">
				  <TR>
					<TD  nowrap="nowrap">
					  <?php
						  $hash    =  getTableFieldsName("products");
						  $hash    = array_diff($hash,array("id"));
					  ?>
					  Search Key:
					  <select   name="field_name" id="field_name"  class="textbox">
						<option value="">--Select--</option>
						<?php
						foreach($hash as $key=>$value)
						{
					    ?>
						<option value="<?=$key?>" <?php if($_SESSION['field_name']==$key) echo "selected"; ?>><?=str_replace("_"," ",$value)?></option>
						<?php
					    }
					  ?>
					  </select>
					</TD>
					<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../images/icon_searchbox.png" alt="Search"></label>
					   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="textbox"></TD>
					<td nowrap="nowrap" align="right">
					  <input type="hidden" name="cmd" id="cmd" value="search_products" >
					  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
					</td>
				  </TR>
				</table>
			  </form>
			</td>
   </tr>
   <tr>
   <td> 
		<a href="products.php?cmd=edit" class="nav3">Add a products</a>
		<table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
			<tr bgcolor="#ABCAE0">
			  <td>Category</td>
			  <td>Sub Category</td>
			  <td>Brand Id</td>
			  <td>Title</td>
			  <td>Product Condition</td>
			  <td>Sale Type</td>
			  <td>Quantity</td>
			  <td>Price</td>
			  <td>Discount</td>
			  <td>Shipping Cost</td>
			  <td>Description</td>
			  <td>Size</td>
			  <td>Weight</td>
			  <td>Color</td>
			  <td>Shipping Desc</td>
			  <td>Delivery Desc</td>
			  <td>Payment Desc</td>
			  <td>Return Desc</td>
			  <td>File Image1</td>
			  <td>File Image2</td>
			  <td>File Image3</td>
			  
				<td>Action</td>
			</tr>
		 <?php
				
				if($_SESSION["search"]=="yes")
				  {
					$whrstr = " AND ".$_SESSION['field_name']." LIKE '%".$_SESSION["field_value"]."%'";
				  }
				  else
				  {
					$whrstr = "";
				  }
		 
				$rowsPerPage = 10;
				$pageNum = 1;
				if(isset($_REQUEST['page']))
				{
					$pageNum = $_REQUEST['page'];
				}
				$offset = ($pageNum - 1) * $rowsPerPage;  
		 
		 
							  
				$info["table"] = "products";
				$info["fields"] = array("products.*"); 
				$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
									
				
				$arr =  $db->select($info);
				
				for($i=0;$i<count($arr);$i++)
				{
				
				   $rowColor;
		
					if($i % 2 == 0)
					{
						
						$row="#C8C8C8";
					}
					else
					{
						
						$row="#FFFFFF";
					}
				
		 ?>
			<tr bgcolor="<?=$row?>" onmouseover=" this.style.background='#ECF5B6'; " onmouseout=" this.style.background='<?=$row?>'; ">
			  <td>
					<?php
                        unset($info2);        
                        $info2['table']    = "category";	
                        $info2['fields']   = array("*");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['category_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['cat_name'];	
                    ?>
               </td>
			  <td>
					<?php
                        unset($info2);        
                        $info2['table']    = "sub_category";	
                        $info2['fields']   = array("*");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['sub_category_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['sub_cat_name'];	
                    ?>
               </td>
			  <td>
					<?php
                        unset($info2);        
                        $info2['table']    = brand;	
                        $info2['fields']   = array("brand_name");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['brand_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['brand_name'];	
                    ?>
              </td>
			  <td><?=$arr[$i]['title']?></td>
			  <td><?=$arr[$i]['product_condition']?></td>
			  <td><?=$arr[$i]['sale_type']?></td>
			  <td><?=$arr[$i]['quantity']?></td>
			  <td><?=$arr[$i]['price']?></td>
			  <td><?=$arr[$i]['discount']?></td>
			  <td><?=$arr[$i]['shipping_cost']?></td>
			  <td><?=$arr[$i]['description']?></td>
			  <td><?=$arr[$i]['size']?></td>
			  <td><?=$arr[$i]['weight']?></td>
			  <td><?=$arr[$i]['color']?></td>
			  <td><?=$arr[$i]['shipping_desc']?></td>
			  <td><?=$arr[$i]['delivery_desc']?></td>
			  <td><?=$arr[$i]['payment_desc']?></td>
			  <td><?=$arr[$i]['return_desc']?></td>
			  <td><?=$arr[$i]['file_image1']?></td>
			  <td><?=$arr[$i]['file_image2']?></td>
			  <td><?=$arr[$i]['file_image3']?></td>
			  
			  <td nowrap >
				  <a href="products.php?cmd=edit&id=<?=$arr[$i]['id']?>" class="nav">Edit</a> |
				  <a href="products.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a> 
			 </td>
		
			</tr>
		<?php
				  }
		?>
		
		<tr>
		   <td colspan="10" align="center">
			  <?php              
					  unset($info);
	
					  $info["table"] = "products";
					  $info["fields"] = array("*"); 
					  $info["where"]   = "1  $whrstr ORDER BY id DESC";
					  
					  $res  = $db->select($info);  
	
	
						$numrows = count($res);
						$maxPage = ceil($numrows/$rowsPerPage);
						$self = 'products.php?cmd=list';
						$nav  = '';
						
						$start    = ceil($pageNum/5)*5-5+1;
						$end      = ceil($pageNum/5)*5;
						
						if($maxPage<$end)
						{
						  $end  = $maxPage;
						}
						
						for($page = $start; $page <= $end; $page++)
						//for($page = 1; $page <= $maxPage; $page++)
						{
							if ($page == $pageNum)
							{
								$nav .= " $page "; 
							}
							else
							{
								$nav .= " <a href=\"$self&&page=$page\" class=\"nav\">$page</a> ";
							} 
						}
						if ($pageNum > 1)
						{
							$page  = $pageNum - 1;
							$prev  = " <a href=\"$self&&page=$page\" class=\"nav\">[Prev]</a> ";
					
						   $first = " <a href=\"$self&&page=1\" class=\"nav\">[First Page]</a> ";
						} 
						else
						{
							$prev  = '&nbsp;'; 
							$first = '&nbsp;'; 
						}
					
						if ($pageNum < $maxPage)
						{
							$page = $pageNum + 1;
							$next = " <a href=\"$self&&page=$page\" class=\"nav\">[Next]</a> ";
					
							$last = " <a href=\"$self&&page=$maxPage\" class=\"nav\">[Last Page]</a> ";
						} 
						else
						{
							$next = '&nbsp;'; 
							$last = '&nbsp;'; 
						}
						
						if($numrows>1)
						{
						  echo $first . $prev . $nav . $next . $last;
						}
						
					?>     
		   </td>
		</tr>
		</table>

</td>
</tr>
</table>

<?php
include("../template/footer.php");
?>









