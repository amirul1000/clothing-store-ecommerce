<?php
 include("../template/header.php");
?>
<script language="javascript" src="brand.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<b><?=ucwords(str_replace("_"," ","brand"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="brand.php?cmd=list" class="nav3">List</a>
	 <form name="frm_brand" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
		 <tr>
						 <td>Brand Name</td>
						 <td>
						    <input type="text" name="brand_name" id="brand_name"  value="<?=$brand_name?>" class="textbox">
						 </td>
				     </tr><tr>
		           		 <td>Status</td>
				   		 <td><?php
	$enumbrand = getEnumFieldValues('brand','status');
?>
<select  name="status" id="status"   class="textbox">
<?php
   foreach($enumbrand as $key=>$value)
   { 
?>
  <option value="<?=$value?>" <?php if($value==$status){ echo "selected"; }?>><?=$value?></option>
 <?php
  }
?> 
</select></td>
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

