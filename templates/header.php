<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="stylesheet" href="../css/style.css" type="text/css" />
  <link rel="stylesheet" href="../css/style2.css" type="text/css" />
  <link rel="stylesheet" href="../css/jquery.megamenu.css" type="text/css" />
 <script type="text/javascript" src="../js/jquery-1.7.2.min.js" ></script> 
 <script type="text/javascript" src="../js/jquery.megamenu.js" ></script>
 <script type="text/javascript" src="../js/core.js" ></script>
 
 
 <script type="text/javascript">
jQuery(function(){
        var SelfLocation = window.location.href.split('?');
        switch (SelfLocation[1]) {
          case "justify_right":
            jQuery(".megamenu").megamenu({ 'justify':'right' });
            break;
          case "justify_left":
          default:
            jQuery(".megamenu").megamenu();
        }
      });
 </script>


</head> 


<div class="header_section"> 
    <div style="float:right;"> 
		 <?php
         ob_start(); 
         session_start();
         $count = count($_SESSION['cart']);
        ?>
        <p style="color:#FFFFFF;"><?=$count?> Items in cart</p>
        <a href="../cart/cart.php" id="view-cart" class="eye-btn">View Cart</a>
        <a href="../cart/cart.php" id="check-out" class="eye-btn">Check Out</a>  
    </div>

      <div class="con_box">
 		<div class="logo"><a href="/home"><img src="../images/logo2.png" /></a></div>
 			<div class="nav_menu"> 
              <div class="margin_div"></div>
			  <div class="HeaderNavigation"> 
                <div class="header_nav_menu_box">
                <ul class="sf-menu megamenu">
                  
                  <?php
				       unset($info);
				    $info["table"] = "category";
					$info["fields"] = array("category.*"); 
					$info["where"]   = "1  ORDER BY order_no ASC";
										
					
					$arr =  $db->select($info);
					
					for($i=0;$i<count($arr);$i++)
					{
				  
				  ?>
                     <?php 
					    if($i==0)
						{
					 ?> 	
                    <li class="home_first_li"><a class="first_menu_id" href="javascript:void(0)"><?=$arr[$i]['cat_name']?></a>
                    <?php
					}else
					{
					?>
                    <li ><a href="javascript:void(0)" id=""><?=$arr[$i]['cat_name']?></a>
                    <?php
					}
					?>
                    <div id="drop_down_menu">
                    
                    <div class="arrow" style="margin-left:253px"></div>
                   
                    <div class="drop_right_box">
                    <ul>
                        
                        <?php
						     unset($info);
						    $info["table"] = "category  left outer join sub_category  on(sub_category.category_id=category.id)";
							$info["fields"] = array("sub_category.*");
							$info["where"]   = "1 AND  category_id='".$arr[$i]['id']."' ORDER BY sub_cat_name ASC";
							
							$arr2 =  $db->select($info);
							for($j=0;$j<count($arr2);$j++)
							{
						?>
                        <li><a href="../products/products.php?cmd=list&scategory_id=<?=$arr[$i]['id']?>&sub_category_id=<?=$arr2[$j]['id']?>"><?=$arr2[$j]['sub_cat_name']?></a></li>
                        <?php
						    }
						?>	
                          
                    </ul>
                    <?php
					  }
					 ?> 
                    </div>
                    </div>
                    </li>
                    
                </ul>  
                
</div>
</div> 
</div>
<div style="float:right;">
 <?php
	   include("../templates/header_login.php");
	?>
</div>    
<div class="clear"></div>
   
</div> 
</div>