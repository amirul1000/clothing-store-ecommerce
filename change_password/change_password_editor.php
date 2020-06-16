<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">

      <div id="home-list">
	<h1>Registration</h1>
     <span style="color:#FF0000;"><?php
	   if(isset($message ))
	   {
	    echo $message; 
	   }
	 ?></span>
                <table cellspacing="3" cellpadding="3" border="0" align="center"
                    width="98%" class="bdr">
                    <tr>
                        <td>                          
                            <form name="frm_users" method="post" enctype="multipart/form-data"
                                onSubmit="return checkRequired();">
                                <table cellspacing="3" cellpadding="3" border="0" align="center"
                                    class="bodytext" width="100%">
                                    <tr>
                                        <td colspan="2" align="center" class="registration_title">Account
                                            Info</td>
                                    </tr>
                                    <tr>
                                    <tr>
                                        <td>Email<span>*</span>
                                        </td>
                                        <td><input type="email" name="email" id="email"
                                            value="<?=$email?>" class="textbox" readonly="readonly" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Old Password<span>*</span>
                                        </td>
                                        <td><input type="password" name="old_password" id="old_password"
                                            value="" class="textbox" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>New Password<span>*</span>
                                        </td>
                                        <td><input type="password" name="password" id="password"
                                            value="" class="textbox" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <input type="hidden" name="cmd" value="add"> 
                                        <input type="hidden" name="id" value="<?=$Id?>"> 
                                        <input type="submit" name="btn_submit" id="btn_submit" value="submit"  class="button_blue"> 
                                    </tr>
                                </table>
                            </form>
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
     