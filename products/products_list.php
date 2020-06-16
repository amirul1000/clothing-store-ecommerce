
<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">

                   <script>
						function formSubmit(i)
						{
						   frm  = "frm"+i;
						  document.getElementById(frm).submit();
						}
                  </script>
				   <?php
                    $rowsPerPage = 10;
					$pageNum = 1;
					if(isset($_REQUEST['page']))
					{
						$pageNum = $_REQUEST['page'];
					}
					$offset = ($pageNum - 1) * $rowsPerPage;  
				
                    //set value
                    if(isset($_REQUEST['search_key']))
                    {
                        $_SESSION['search_key'] = $_REQUEST['search_key'];
                    }
                    //search condition  
                    if(isset($_REQUEST['sub_category_id']))
                    {
                        $whrstr .= " AND products.sub_category_id='".$_REQUEST['sub_category_id']."'";
                        $cmd = 'list';  
                        unset($_SESSION['search_key']);				
                    }
                    else if(isset($_SESSION['search_key']))
                    {
                      $whrstr .= " AND (
                                          products.title like '%".$_SESSION['search_key']."%'
                                          OR brand.brand_name  like '%".$_SESSION['search_key']."%'
                                          OR category.cat_name like '%".$_SESSION['search_key']."%'
                                          OR sub_category.sub_cat_name like '%".$_SESSION['search_key']."%')";
                    
                    }
					
					unset($info);
				$info["table"] = "products  left outer join  category ON (products.category_id=category.id)
				                            left outer join  sub_category ON (products.sub_category_id=sub_category.id)
											left outer join  brand ON (products.brand_id=brand.id)";
				$info["fields"] = array("products.*"); 
				$info["where"]   = "1   $whrstr ORDER BY id DESC  LIMIT $offset, $rowsPerPage";
				
				$arr =  $db->select($info);
					
                   ?>
              <div id="product-list">
                 
                <?php		
                    for($i=0;$i<count($arr);$i++)
                    {
                ?>
                <div class="product-list-box">
                    <img src="../<?=$arr[$i]['file_image1']?>" style="width:200px;height:144px;">
                    <p class="prod-name">
                      <?=$arr[$i]['title']?>
                    </p>
                    <p class="list-price"><?=$arr[$i]['price']?></p>
                    <form name="frm<?=$i?>" id="frm<?=$i?>" action="" method="post">
                       <!-- Store data/-->
                       <input type="hidden" name="cmd" value="add_to_cart">
                       <input type="hidden" name="quantity" id="quantity"value="1">               
                       <input type="hidden" name="os0" value="<?=$arr[$i]['title']?>">
                       <input type="hidden" name="amount" value="<?=$arr[$i]['price']?>">
                       <input type="hidden" name="shipping_charge" value="<?=$arr[$i]['shipping_cost']?>">
                       <input type="hidden" name="item_name" value="<?=$arr[$i]['cat_name']?>  <?=$arr[$i]['sub_cat_name']?>  <?=$arr[$i]['brand_name']?>">
                       <input type="hidden" name="item_number" value="<?=$arr[$i]['id']?>">
                        <a href="#" class="cart-btn" onClick="formSubmit(<?=$i?>);">Add to cart</a>
                    </form>
                    <a href="../products/products.php?cmd=details&id=<?=$arr[$i]['id']?>" class="detail-btn">Details</a>
                </div>
                <?php
                   }
                ?> 
                <div class="clear"></div>
                   <?php              
					    	unset($info);
						$info["table"] = "products  left outer join  category ON (products.category_id=category.id)
													left outer join  sub_category ON (products.sub_category_id=sub_category.id)
													left outer join  brand ON (products.brand_id=brand.id)";
						$info["fields"] = array("products.*"); 
						$info["where"]   = "1   $whrstr ORDER BY id DESC";
					  
					    $res  = $db->select($info);  
	
	
						$numrows = count($res);
						$maxPage = ceil($numrows/$rowsPerPage);
						if(isset($_REQUEST['sub_category_id']))
						{
						  $req = "&sub_category_id=".$_REQUEST['sub_category_id'];
						}
						
						$self = 'products.php?cmd=list'.$req;
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
        
        
        
       