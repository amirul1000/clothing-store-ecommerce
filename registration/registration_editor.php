
<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">

      <div id="home-list">
	<h1>Registration</h1>
     <span class="error"><?php
	   if(isset($message ))
	   {
	    echo $message; 
	   }
	 ?></span>
	<table cellspacing="3" cellpadding="3" border="0" align="center"
		width="98%" class="bdr">
		<tr>
			<td>
				<form name="frm_users" method="post"  enctype="multipart/form-data" onSubmit="return checkRequired();">			
                    <table cellspacing="3" cellpadding="3" border="0" align="center" class="bodytext" width="100%">  
                     <tr>
                                     <td>Email</td>
                                     <td>
                                        <input type="email" name="email" id="email"  value="<?=$email?>" class="textbox" required>
                                     </td>
                                 </tr><tr>
                                     <td>Password</td>
                                     <td>
                                        <input type="password" name="password" id="password"  value="<?=$password?>" class="textbox" required>
                                     </td>
                                 </tr><tr>
                                     <td>Title</td>
                                     <td>
                                        <input type="text" name="title" id="title"  value="<?=$title?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>First Name</td>
                                     <td>
                                        <input type="text" name="first_name" id="first_name"  value="<?=$first_name?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>Last Name</td>
                                     <td>
                                        <input type="text" name="last_name" id="last_name"  value="<?=$last_name?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>Company</td>
                                     <td>
                                        <input type="text" name="company" id="company"  value="<?=$company?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>Address</td>
                                     <td>
                                        <input type="text" name="address" id="address"  value="<?=$address?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>City</td>
                                     <td>
                                        <input type="text" name="city" id="city"  value="<?=$city?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>State</td>
                                     <td>
                                        <input type="text" name="state" id="state"  value="<?=$state?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                     <td>Zip</td>
                                     <td>
                                        <input type="text" name="zip" id="zip"  value="<?=$zip?>" class="textbox">
                                     </td>
                                 </tr><tr>
                                         <td>Country</td>
                                         <td><?php
                                                $info['table']    = "country";
                                                $info['fields']   = array("*");   	   
                                                $info['where']    =  "1=1 ORDER BY id DESC";
                                                $rescountry  =  $db->select($info);
                                            ?>
                                            <select  name="country_id" id="country_id"   class="textbox" style="width:150px;">
                                                <option value="">--Select--</option>
                                                <?php
                                                   foreach($rescountry as $key=>$each)
                                                   { 
                                                ?>
                                                  <option value="<?=$rescountry[$key]['id']?>" <?php if($rescountry[$key]['id']==$country_id){ echo "selected"; }?>><?=$rescountry[$key]['country']?></option>
                                                <?php
                                                 }
                                                ?> 
                                            </select>
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
        
    