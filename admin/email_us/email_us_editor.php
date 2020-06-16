<?php
 include("../template/header.php");
?>
<script language="javascript" src="email_us.js"></script>
<script type="text/javascript" src="../../js/jquery.js"></script>
<script	src="../../js/main.js" type="text/javascript"></script>
<link rel="stylesheet" href="../../css/datepicker.css">
<b><?=ucwords(str_replace("_"," ","email_us"))?></b><br />
<table cellspacing="3" cellpadding="3" border="0" align="center" width="98%" class="bdr">
 <tr>
  <td>  
     <a href="email_us.php?cmd=list" class="nav3">List</a>
	 <form name="frm_email_us" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
		<table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
		 <tr>
						 <td>From Email</td>
						 <td>
						    <input type="text" name="from_email" id="from_email"  value="<?=$from_email?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td>Subject</td>
						 <td>
						    <input type="text" name="subject" id="subject"  value="<?=$subject?>" class="textbox">
						 </td>
				     </tr><tr>
						 <td valign="top">Message</td>
						 <td>
						    <textarea name="message" id="message"  class="textbox" style="width:200px;height:100px;"><?=$message?></textarea>
						 </td>
				     </tr><tr>
						 <td>Created Date Time</td>
						 <td>
						    <input type="text" name="created_date_time" id="created_date_time"  value="<?=$created_date_time?>" class="textbox">
							<a href="javascript:void(0);" onclick="displayDatePicker('created_date_time');"><img src="../../images/calendar.gif" width="16" height="16" border="0" /></a>
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

