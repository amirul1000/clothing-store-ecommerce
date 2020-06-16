<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">
      <div id="product-page" class="clearfix">
			<b>My Orders</b>
                    <table cellspacing="1" cellpadding="3" border="0" style="font-family: Helvetica Neue,Helvetica,Arial,Verdana,sans-serif;font-size:11px;">
                        <tr bgcolor="#ABCAE0">			  
                          <td>Shipping Address </td>
                          <td>Billing Information </td>
                          <td>Items</td>
                          <td>Shipping Cost</td>
                          <td>Total Amount</td>
                          <td>Date Created</td>
                          <td>Delivery Status</td>
                        </tr>
                     <?php
                            $rowsPerPage = 10;
                            $pageNum = 1;
                            if(isset($_REQUEST['page']))
                            {
                                $pageNum = $_REQUEST['page'];
                            }
                            $offset = ($pageNum - 1) * $rowsPerPage;
                                          
                            $info["table"] = "orders";
                            $info["fields"] = array("orders.*"); 
                            $info["where"]   = "1   AND users_id='".$_SESSION['users_id']."' ORDER BY  FIELD(delivery_status, 'pending','completed','return'),id  DESC  LIMIT $offset, $rowsPerPage";
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
                        <tr bgcolor="<?=$row?>" onMouseOver=" this.style.background='#ECF5B6'; " onMouseOut=" this.style.background='<?=$row?>'; ">
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
                                    <tr bgcolor="<?=$row?>" onMouseOver=" this.style.background='#ECF5B6'; " onMouseOut=" this.style.background='<?=$row?>'; ">
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
                          <td valign="top"><?=$arr[$i]['delivery_status']?></td>		
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
                                  $info["where"]   = "1  AND users_id='".$_SESSION['users_id']."'  ORDER BY id DESC";
                                  
                                  $res  = $db->select($info);  
                
                
                                    $numrows = count($res);
                                    $maxPage = ceil($numrows/$rowsPerPage);
                                    $self = 'my_orders.php?cmd=list';
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
	<span class="stretch"></span>
      </div>

</div>
<div class="clear"></div>
</div>
</div>
    <?php
     include("../templates/footer.php");
   ?> 

</div>
</body>
</html>                
        