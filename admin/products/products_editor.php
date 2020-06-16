<?php
 include("../template/header.php");
?>
<script language="javascript" src="products.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<b><?=ucwords(str_replace("_"," ","products"))?></b><br />
<script language="javascript">
  function fillUpSubCategory(category_id)
	{
	   var select = document.getElementById('sub_category_id');
	   select.options.length = 0; 	  
	  $("#spinner").html('<img src="../../images/indicator.gif" alt="Wait" />');		
	  $.ajax({  
		  url: 'products.php?cmd=get_sub_category&category_id='+category_id,
		  success: function(data) {
			if(data=="")
			{
			   $("#spinner").html('');
			}
			else
			{
				var myObject = eval(data);
			    var select = document.getElementById('sub_category_id');
			    select.options.length = 0; 	 
				select.options.add(new Option('--Select--', ''));	 
				  for (var i = 1; i <= myObject.length; i++) 
				  {
					  var d = myObject[i-1];
					  select.options.add(new Option(d.sub_cat_name, d.id));
				  }
				$("#spinner").html('');
			}
		  }
		});
	}
</script>	
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="products.php?cmd=list" class="nav3">List</a>
	 <form name="frm_products" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
		          <tr>
						<td>Category</td>
						<td><?php
						$info['table']    = "category";
						$info['fields']   = array("*");
						$info['where']    =  "1=1 ORDER BY id DESC";
						$rescategory  =  $db->select($info);
						?> <select name="category_id" id="category_id"  class="textbox" onchange="fillUpSubCategory(this.value);">
								<option value="">--Select--</option>
								<?php
								foreach($rescategory as $key=>$each)
								{
									?>
								<option value="<?=$rescategory[$key]['id']?>"
								<?php if($rescategory[$key]['id']==$category_id){ echo "selected"; }?>>
									<?=$rescategory[$key]['cat_name']?>
								</option>
								<?php
								}
								?>
						</select></td>
					</tr>
                    <tr>
							 <td>Sub Category</td>
							 <td><?php
									$info['table']    = "category";
									$info['fields']   = array("*");   	   
									$info['where']    =  "1=1 ORDER BY id DESC";
									$rescategory  =  $db->select($info);
								?>
								<select  name="sub_category_id" id="sub_category_id"   class="textbox">
									<option value="">--Select--</option>
									<?php
									   foreach($rescategory as $key=>$each)
									   { 
									?>
									  <option value="<?=$rescategory[$key]['id']?>" <?php if($rescategory[$key]['id']==$sub_category_id){ echo "selected"; }?>><?=$rescategory[$key]['cat_name']?></option>
									<?php
									 }
									?> 
								</select>
                                <div id="spinner"></div>
                                </td>
					  </tr>
                      <tr>
							 <td>Brand</td>
                                                         <td><?php
                                $info['table']    = "brand";
                                $info['fields']   = array("*");   	   
                                $info['where']    =  "1=1 ORDER BY id DESC";
                                $resbrand  =  $db->select($info);
                            ?>
                            <select  name="brand_id" id="brand_id"   class="textbox">
                                <option value="">--Select--</option>
                                <?php
                                   foreach($resbrand as $key=>$each)
                                   { 
                                ?>
                                  <option value="<?=$resbrand[$key]['id']?>" <?php if($resbrand[$key]['id']==$brand_id){ echo "selected"; }?>><?=$resbrand[$key]['brand_name']?></option>
                                <?php
                                 }
                                ?> 
                            </select>
                            </td>
					  </tr>
                      <tr>
						 <td>Title</td>
						 <td>
						    <input type="text" name="title" id="title"  value="<?=$title?>" class="textbox">
						 </td>
				     </tr>
                     <tr>
		           		 <td>Product Condition</td>
                          <td>
						    <?php
                                $enumproducts = getEnumFieldValues('products','product_condition');
                            ?>
                            <select  name="product_condition" id="product_condition"   class="textbox">
                            <?php
                               foreach($enumproducts as $key=>$value)
                               { 
                            ?>
                              <option value="<?=$value?>" <?php if($value==$product_condition){ echo "selected"; }?>><?=$value?></option>
                             <?php
                              }
                            ?> 
                            </select></td>
				  </tr>
                  <tr>
		           		 <td>Sale Type</td>
				   		 <td><?php
								$enumproducts = getEnumFieldValues('products','sale_type');
							?>
							<select  name="sale_type" id="sale_type"   class="textbox">
							<?php
							   foreach($enumproducts as $key=>$value)
							   { 
							?>
							  <option value="<?=$value?>" <?php if($value==$sale_type){ echo "selected"; }?>><?=$value?></option>
							 <?php
							  }
							?> 
							</select>
                         </td>
				  </tr>
                  <tr>
						 <td>Quantity</td>
						 <td>
						    <input type="text" name="quantity" id="quantity"  value="<?=$quantity?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Price</td>
						 <td>
						    <input type="text" name="price" id="price"  value="<?=$price?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Discount</td>
						 <td>
						    <input type="text" name="discount" id="discount"  value="<?=$discount?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Shipping Cost</td>
						 <td>
						    <input type="text" name="shipping_cost" id="shipping_cost"  value="<?=$shipping_cost?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td valign="top">Description</td>
						 <td>
						    <textarea name="description" id="description"  class="textbox" style="width:200px;height:100px;"><?=$description?></textarea>
						 </td>
				     </tr><tr>
						 <td>Size</td>
						 <td>
						    <input type="text" name="size" id="size"  value="<?=$size?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Weight</td>
						 <td>
						    <input type="text" name="weight" id="weight"  value="<?=$weight?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Color</td>
						 <td>
						    <input type="text" name="color" id="color"  value="<?=$color?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td valign="top">Shipping Desc</td>
						 <td>
						    <textarea name="shipping_desc" id="shipping_desc"  class="textbox" style="width:200px;height:100px;"><?=$shipping_desc?></textarea>
						 </td>
				     </tr><tr>
						 <td valign="top">Delivery Desc</td>
						 <td>
						    <textarea name="delivery_desc" id="delivery_desc"  class="textbox" style="width:200px;height:100px;"><?=$delivery_desc?></textarea>
						 </td>
				     </tr><tr>
						 <td valign="top">Payment Desc</td>
						 <td>
						    <textarea name="payment_desc" id="payment_desc"  class="textbox" style="width:200px;height:100px;"><?=$payment_desc?></textarea>
						 </td>
				     </tr><tr>
						 <td valign="top">Return Desc</td>
						 <td>
						    <textarea name="return_desc" id="return_desc"  class="textbox" style="width:200px;height:100px;"><?=$return_desc?></textarea>
						 </td>
				     </tr><tr>
						 <td>File Image1</td>
						 <td><input type="file" name="file_image1" id="file_image1"  value="<?=$file_image1?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>File Image2</td>
						 <td><input type="file" name="file_image2" id="file_image2"  value="<?=$file_image2?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>File Image3</td>
						 <td><input type="file" name="file_image3" id="file_image3"  value="<?=$file_image3?>" class="textbox">
						 </td>
				     </tr>
		 <tr> 
			 <td align="right"></td>
			 <td>
				<input type="hidden" name="cmd" value="add">
				<input type="hidden" name="id" value="<?=$Id?>">			
				<input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
			 </td>     
		 </tr>
		</table>
	</form>
  </td>
 </tr>
</table>
<?php
 include("../template/footer.php");
?>

