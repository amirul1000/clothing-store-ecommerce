
<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">
          <h2 id="product-name">Cart</h2>
             <font color="#FF0000">
             <?php
			   if(isset($message))
			   {
			     echo $message;
			   }
			 ?>
             </font>
              <table cellspacing="3" cellpadding="3" class="bodytext">
				    <tr bgcolor="#33CCFF">
					    <td>Description</td>
						 <td>Item name</td>
						 <td>Item number</td>
						 <td>Quantity</td>
						 <td>Unit Price</td>
						 <td>Amount</td>
					</tr>
					<?php
					$count = count($_SESSION['cart']);
					$total=0;
					$total_shipping_charge = 0;
					if($count==0)
					{
				 	echo "<tr><td colspan=6>No Item in the cart</td></tr>";
					}
					else
					{
					 for($i=0;$i<$count;$i++)
					   {
					   
					   $subtotal = $_SESSION['cart'][$i]['amount']*$_SESSION['cart'][$i]['quantity'];
					   $shipping_charge =  $_SESSION['cart'][$i]['shipping_charge']*$_SESSION['cart'][$i]['quantity'];
					   
					   $total = $total+$subtotal;
					   $total_shipping_charge =  $total_shipping_charge + $shipping_charge;
					   
					   if($i % 2 == 0)
						{
							
							$row="#C8C8C8";
						}
						else
						{
							
							$row="#FFFFFF";
						}
					?>
					 <tr bgcolor="<?=$row?>">
					     <td valign="top">
                            <div style="width:300px;">
                             <img src="../<?=getImage($db,$_SESSION['cart'][$i]['item_number'])?>" style="width:100px;height:100px;float:left;" />
                             <?=$_SESSION['cart'][$i]['os0']?> 
                            </div> 
                         </td>
						 <td valign="top"><?=$_SESSION['cart'][$i]['item_name']?></td>
						 <td valign="top"><?=$_SESSION['cart'][$i]['item_number']?></td>
						 <td valign="top" nowrap>
                           <form action="" method="post">
                             <input type="text" name="quantity" value="<?=$_SESSION['cart'][$i]['quantity']?>" style="width:30px;">											
                             <input type="hidden" name="item_number" value="<?=$_SESSION['cart'][$i]['item_number']?>">
                             <input type="hidden" name="item_name" value="<?=$_SESSION['cart'][$i]['item_name']?>">
                             <input type="submit" name="cmd" value="update" style="width:45px;font-size:11px;">
                             <input type="submit" name="cmd" value="remove" style="width:45px;font-size:11px;">
                            </form> 
						</td>
						 <td valign="top"><?=number_format($_SESSION['cart'][$i]['amount'], 2, '.', '')?></td>
						 <td valign="top">$<?=number_format($subtotal, 2, '.', '')?></td>
					</tr>
					<?php					
					}
					?>
					 <tr bgcolor="#DDFFFF">
					     <td valign="top"></td>
						 <td valign="top"></td>										
						 <td valign="top" colspan="3">Shipping Charge</td>
						 <td valign="top">$<?=number_format($total_shipping_charge, 2, '.', '')?></td>
					</tr>
					 <tr bgcolor="#FFFEEEE">
					     <td valign="top"></td>
						 <td valign="top"></td>						
						 <td valign="top" colspan="3">Total</td>
						 <td valign="top">
                         $<?=number_format($total+$tax+$total_shipping_charge, 2, '.', '')?></td>
					</tr>
			    	<?php			
					   $_SESSION['tax'] = $tax;
					   $_SESSION['shipping_charge'] = $shipping_charge;		 
					   $_SESSION['total'] = $total+$tax+$total_shipping_charge;		
					}
					?>	  
				  </table>
                  
                 <div style="width:700px;"> 
                 <form action="" method="post">
                 <?php
				   if(isset($_SESSION['users_id']))
					 {
						//get lastest order 
						unset($info);
						$info["table"] = "orders";
						$info["fields"] = array("orders.*"); 
						$info["where"]   = "1   AND users_id='".$_SESSION['users_id']."' ORDER BY id DESC LIMIT 0,1";
						$arr =  $db->select($info);
						//get shipping address
						unset($info2);        
						$info2["table"] = "shipping_address";
						$info2["fields"] = array("shipping_address.*"); 
						$info2["where"]   = "1  AND id='".$arr[0]['shipping_address_id']."' LIMIT 0,1";
						$res2 =  $db->select($info2);						
						if(empty($_REQUEST['ship_first_name']))
						{
						  $_REQUEST['ship_first_name'] = $res2[0]['ship_first_name'];
						}
						if(empty($_REQUEST['ship_last_name']))
						{
						  $_REQUEST['ship_last_name'] = $res2[0]['ship_last_name'];
						}
						if(empty($_REQUEST['ship_adress1']))
						{
						  $_REQUEST['ship_adress1'] = $res2[0]['ship_adress1'];
						}
						if(empty($_REQUEST['ship_adress2']))
						{
						  $_REQUEST['ship_adress2'] = $res2[0]['ship_adress2'];
						}
						if(empty($_REQUEST['ship_zip_code']))
						{
						  $_REQUEST['ship_zip_code'] = $res2[0]['ship_zip_code'];
						}
						if(empty($_REQUEST['ship_city']))
						{
						  $_REQUEST['ship_city'] = $res2[0]['ship_city'];
						}
						if(empty($_REQUEST['ship_state']))
						{
						  $_REQUEST['ship_state'] = $res2[0]['ship_state'];
						}			   
						if(empty($_REQUEST['ship_country']))
						{
						  $_REQUEST['ship_country'] = $res2[0]['ship_country'];
						}
						
						//billing information
						unset($info2);        
						$info2["table"] = "billing_information";
						$info2["fields"] = array("billing_information.*"); 
						$info2["where"]   = "1  AND id='".$arr[0]['billing_information_id']."' LIMIT 0,1";
						$res2 =  $db->select($info2);
						if(empty($_REQUEST['first_name']))
						{
						  $_REQUEST['first_name'] = $res2[0]['first_name'];
						}
						if(empty($_REQUEST['last_name']))
						{
						  $_REQUEST['last_name'] = $res2[0]['last_name'];
						}
						if(empty($_REQUEST['country']))
						{
						  $_REQUEST['country'] = $res2[0]['country'];
						}
						if(empty($_REQUEST['adress1']))
						{
						  $_REQUEST['adress1'] = $res2[0]['adress1'];
						}
						if(empty($_REQUEST['adress2']))
						{
						  $_REQUEST['adress2'] = $res2[0]['adress2'];
						}
						if(empty($_REQUEST['city']))
						{
						  $_REQUEST['city'] = $res2[0]['city'];
						} 
						if(empty($_REQUEST['state']))
						{
						  $_REQUEST['state'] =$res2[0]['state'];
						} 
						if(empty($_REQUEST['zip_code']))
						{
						  $_REQUEST['zip_code'] = $res2[0]['zip_code'];
						}
						if(empty($_REQUEST['phone_no']))
						{
						  $_REQUEST['phone_no'] = $res2[0]['phone_no'];
						}
					}	
				 ?>
                  <table width="100%">
                    <tr>
                       <td>
                          <?php
							  include("../cart/cart_shipping_address.php");
						  ?>           
                       </td>
                       <td align="right">
                           <?php
							  include("../cart/cart_billing_info.php");
						   ?>     
                       </td>
                    </tr>
                  </table>
                  </form>
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
         