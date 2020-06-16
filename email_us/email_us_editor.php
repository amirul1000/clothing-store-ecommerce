<?php
  include("../templates/header.php");
  include("tinymce.php");
?>
<div class="container clearfix">
    <?php
	  include("../templates/sidebar.php");
	?>
    <div id="content">
      
     <!--<div id="slides">
            <div class="slides_container">
                <div>
                    <img src="../images/slides/slid1.jpg">
                </div>
                <div>
                    <img src="http://placehold.it/729x397">
                </div>
                <div>
                    <img src="http://placehold.it/729x397">
                </div>
                <div>
                    <img src="http://placehold.it/729x397">
                </div>
            </div>
        </div>-->

       <div id="home-list">
         <b><?=ucwords(str_replace("_"," ","email_us"))?></b>
         <form name="frm_email_us" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
           <table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
                <tr>
                     <td>Your Email</td>
                     <td>
                        <input type="email" name="from_email" id="from_email"  value="<?=$from_email?>" class="textbox" required>
                     </td>
                 </tr>
                 <tr>
                     <td>Subject</td>
                     <td>
                        <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="textbox" style="width:300px;" required>
                     </td>
                 </tr>
                 <tr>
                     <td valign="top">Message</td>
                     <td>
                        <textarea name="message" id="message"  class="textbox" style="width:200px;height:100px;"><?=$message?></textarea>
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
  <span class="stretch"></span>
      </div>
      <div id="home-content-text">
      <p>Out of Box Deals is located in upstate New York and has been a trusted eBay seller since 2008. We offer a wide variety of Major <a href="#">Home Appliances</a>, Electronics, Cosmetics, and Miscellaneous Wholesale items at unbeatable prices. We believe that you have the right to purchase quality products without having to pay a premium price. We don’t have a brick and mortar store or showroom, which means we have less overhead to pass on to our customers. We do carry inventory though and everything we have listed is in stock allowing us to quickly prepare your order for shipment.</p>
<p>
We are always looking for ways to offer the best products to our customers for the lowest possible prices. Our inventory is always changing so check our store frequently! Maybe some more google text will go down here.</p>
      </div>
    </div>
  </div>
<?php
  include("../templates/footer.php");
?>  