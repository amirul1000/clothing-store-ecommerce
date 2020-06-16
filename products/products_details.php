
<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">
		<?php
                    unset($info);
                $info["table"] = "products  left outer join  category ON (products.category_id=category.id)
                                            left outer join  sub_category ON (products.sub_category_id=sub_category.id)
                                            left outer join  brand ON (products.brand_id=brand.id)";
                $info["fields"] = array("products.*"); 
                $info["where"]   = "1   AND products.id='".$_REQUEST['id']."'";
                
                $arr =  $db->select($info);
        ?>
        
        <table>
           <tr>
              <td>file_image1</td>
              <td><img src="../<?=$arr[0]['file_image1']?>" style="width:200px;height:144px;"></td>
           </tr>
           <tr>
              <td>title</td>
              <td><?=$arr[0]['title']?></td>
           </tr>
           <tr>
              <td>price</td>
              <td><?=$arr[0]['price']?></td>
           </tr>
           <tr>
              <td>cat_name</td>
              <td><?=$arr[0]['cat_name']?></td>
           </tr>
           <tr>
              <td>sub_cat_name</td>
              <td><?=$arr[0]['sub_cat_name']?></td>
           </tr>
           <tr>
              <td>brand_name</td>
              <td><?=$arr[0]['brand_name']?></td>
           </tr>
           <tr>
              <td>product_condition</td>
              <td><?=$arr[0]['product_condition']?></td>
           </tr>
           <tr>
              <td>sale_type</td>
              <td><?=$arr[0]['sale_type']?></td>
           </tr>
           <tr>
              <td>price</td>
              <td><?=$arr[0]['price']?></td>
           </tr>
           <tr>
              <td>discount</td>
              <td><?=$arr[0]['discount']?></td>
           </tr>
           <tr>
              <td>shipping_cost</td>
              <td><?=$arr[0]['shipping_cost']?></td>
           </tr>
            <tr>
              <td>description</td>
              <td><?=$arr[0]['description']?></td>
           </tr>
           <tr>
              <td>size</td>
              <td><?=$arr[0]['size']?></td>
           </tr>
           <tr>
              <td>weight</td>
              <td><?=$arr[0]['weight']?></td>
           </tr>
           <tr>
              <td>color</td>
              <td><?=$arr[0]['color']?></td>
           </tr>
           <tr>
              <td>shipping_desc</td>
              <td><?=$arr[0]['shipping_desc']?></td>
           </tr>
            <tr>
              <td>delivery_desc</td>
              <td><?=$arr[0]['delivery_desc']?></td>
           </tr>
           <tr>
              <td>payment_desc</td>
              <td><?=$arr[0]['payment_desc']?></td>
           </tr>
           <tr>
              <td>return_desc</td>
              <td><?=$arr[0]['return_desc']?></td>
           </tr>
           <tr>
              <td></td>
              <td><img src="../<?=$arr[0]['file_image2']?>" style="width:200px;height:144px;"></td>
           </tr>
           <tr>
              <td></td>
              <td><img src="../<?=$arr[0]['file_image3']?>" style="width:200px;height:144px;"></td>
           </tr>
        </table>
        <script language="javascript">
		  function formSubmit()
		  {
		    frm1.submit();
		  }
		</script>
       <form  name="frm1" id="frm1" action="" method="post">
               <input type="hidden" name="cmd" value="add_to_cart">
               <input type="hidden" name="quantity" id="quantity"value="1">               
               <input type="hidden" name="os0" value="<?=$arr[0]['title']?>">
               <input type="hidden" name="amount" value="<?=$arr[0]['price']?>">
               <input type="hidden" name="shipping_charge" value="<?=$arr[0]['shipping_cost']?>">
               <input type="hidden" name="item_name" value="<?=$arr[0]['cat_name']?>  <?=$arr[0]['sub_cat_name']?>  <?=$arr[0]['brand_name']?>">
               <input type="hidden" name="item_number" value="<?=$arr[0]['id']?>">
              <a href="javascript:void();" id="add-out" onClick="formSubmit();">Add to Cart 
                         <input type="image" src="../images/global/cart.png"  />
              </a>
         </form>
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