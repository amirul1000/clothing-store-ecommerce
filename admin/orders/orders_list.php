<?php
 include("../template/header.php");
?>
<b><?=ucwords(str_replace("_"," ","orders"))?></b>
  <table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
   <tr>
			<td align="center" valign="top">
			  <form name="search_frm" id="search_frm" method="post">
				<table width="60%" border="0"  cellpadding="0" cellspacing="0" class="bodytext">
				  <TR>
					<TD  nowrap="nowrap">
					  <?php
						  $hash    =  getTableFieldsName("orders");
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
					<TD  nowrap="nowrap" align="right"><label for="searchbar"><img src="../../images/icon_searchbox.png" alt="Search"></label>
					   <input type="text"    name="field_value" id="field_value" value="<?=$_SESSION["field_value"]?>" class="textbox"></TD>
					<td nowrap="nowrap" align="right">
					  <input type="hidden" name="cmd" id="cmd" value="search_orders" >
					  <input type="submit" name="btn_submit" id="btn_submit"  value="Search" class="button" />
					</td>
				  </TR>
				</table>
			  </form>
			</td>
   </tr>
   <tr>
   <td> 
		<a href="orders.php?cmd=edit" class="nav3">Add a orders</a>
		<table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
			<tr bgcolor="#ABCAE0">
			  <td>Users</td>
			  <td>Shipping Address </td>
			  <td>Billing Information </td>
              <td>Items</td>
			  <td>Shipping Cost</td>
			  <td>Total Amount</td>
			  <td>Date Created</td>
			  <td>Delivery Status</td>
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
							  
				$info["table"] = "orders";
				$info["fields"] = array("orders.*"); 
				$info["where"]   = "1   $whrstr ORDER BY  FIELD(delivery_status, 'pending','completed','return'),id  DESC  LIMIT $offset, $rowsPerPage";
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
			  <td valign="top">
					<?php
                      	  unset($info2);        
                        $info2['table']    = "users";	
                        $info2['fields']   = array("users.*");	   	   
                        $info2['where']    =  "1 AND id='".$arr[$i]['users_id']."' LIMIT 0,1";
                        $res2  =  $db->select($info2);
                        echo $res2[0]['email'].'<br>';	
						echo $res2[0]['first_name'].' '.$res2[0]['last_name'];	
                    ?>
               </td>
			  <td valign="top">
					<?php
							unset($info2);        
						$info2["table"] = "shipping_address";
						$info2["fields"] = array("shipping_address.*"); 
						$info2["where"]   = "1  AND id='".$arr[$i]['shipping_address_id']."' LIMIT 0,1";
						$res2 =  $db->select($info2);
                    ?>
                    First name:<?=$res2[0]['ship_first_name']?><br />
                    Last name:<?=$res2[0]['ship_last_name']?><br />
                    Adress1:<?=$res2[0]['ship_adress1']?><br />
                    Adress2:<?=$res2[0]['ship_adress2']?><br />
                    Zip code:<?=$res2[0]['ship_zip_code']?><br />
                    City:<?=$res2[0]['ship_city']?><br />
                    State:<?=$res2[0]['ship_state']?><br />
                    Country:<?=$res2[0]['ship_country']?><br />
               </td>
			  <td valign="top">
				  <?php
                          unset($info2);        
                        $info2["table"] = "billing_information";
                        $info2["fields"] = array("billing_information.*"); 
                        $info2["where"]   = "1  AND id='".$arr[$i]['billing_information_id']."' LIMIT 0,1";
                        $res2 =  $db->select($info2);
                  ?>
                  First name:<?=$res2[0]['first_name']?><br />
                  Last name:<?=$res2[0]['last_name']?><br />
                  Country:<?=$res2[0]['country']?><br />
                  Adress1:<?=$res2[0]['adress1']?><br />
                  Adress2:<?=$res2[0]['adress2']?><br />
                  City:<?=$res2[0]['city']?><br />
                  State:<?=$res2[0]['state']?><br />
                  Zip code:<?=$res2[0]['zip_code']?><br />
              </td>
              <td valign="top">
                  <!--Item-->
                       <table cellspacing="1" cellpadding="3" border="0" width="100%" class="bodytext">
                        <tr bgcolor="#ABCAE0">
                          <td>Os0</td>
                          <td>Item Name</td>
                          <td>Item Number</td>
                          <td>Quantity</td>
                          <td>Amuont</td>
                        </tr>
                       <?php
                              unset($info2);
                            $info2["table"] = "items";
                            $info2["fields"] = array("items.*"); 
                            $info2["where"]   = "1    AND orders_id='".$arr[$i]['id']."' ORDER BY id ASC";
                            $res2 =  $db->select($info2);                        
                            for($j=0;$j<count($res2);$j++)
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
                          <div style="width:100px;">
						  <img src="../<?=getImage($db,$res2[$j]['item_number'])?>" style="width:25px;height:25px;float:left;" />
						   <?=$res2[$j]['os0']?>
                          </div>
                         </td>
                          <td><?=$res2[$j]['item_name']?></td>
                          <td><?=$res2[$j]['item_number']?></td>
                          <td><?=$res2[$j]['quantity']?></td>
                          <td><?=$res2[$j]['amount']?></td>
                        </tr>
                    <?php
                              }
                    ?>
                    </table>
                  <!--Item/-->
              </td>
			  <td valign="top"><?=$arr[$i]['shipping_cost']?></td>
			  <td valign="top"><?=$arr[$i]['total_amount']?></td>
			  <td valign="top"><?=date("D F j, Y H:i:s",strtotime($arr[$i]['date_created']))?></td>
			  <td valign="top">
                   <form action="" method="post">
                      <select name="delivery_status">
                        <option value="pending" <?php if($arr[$i]['delivery_status']=="pending") { echo "selected";}?>>pending</option>
                        <option value="completed" <?php if($arr[$i]['delivery_status']=="completed") { echo "selected";}?>>completed</option>
                        <option value="return" <?php if($arr[$i]['delivery_status']=="return") { echo "selected";}?>>return</option>
                      </select>
                      <br />
                      <input type="hidden" name="cmd" value="change_delivery_status"/>
                      <input type="hidden" name="id" value="<?=$arr[$i]['id']?>" />
                      <input type="submit" value="submit" />
                  </form>
              </td>			  
			  <td nowrap  valign="top">
				  <a href="orders.php?cmd=edit&id=<?=$arr[$i]['id']?>" class="nav">Edit</a> |
				  <a href="orders.php?cmd=delete&id=<?=$arr[$i]['id']?>" class="nav" onClick=" return confirm('Are you sure to delete this item ?');">Delete</a> 
			 </td>
		
			</tr>
		<?php
				  }
		?>
		
		<tr>
		   <td colspan="10" align="center">
			  <?php              
					  unset($info);
	
					  $info["table"] = "orders";
					  $info["fields"] = array("*"); 
					  $info["where"]   = "1  $whrstr ORDER BY id DESC";
					  
					  $res  = $db->select($info);  
	
	
						$numrows = count($res);
						$maxPage = ceil($numrows/$rowsPerPage);
						$self = 'orders.php?cmd=list';
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









