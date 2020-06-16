<?php
 include("../template/header.php");
?>
<div class="title"><?=ucwords(str_replace("_"," ","import_data"))?></div>
  <table cellspacing="3" cellpadding="3" border="0"  width="100%" class="bdr">
   <tr>
      <td>
         <form name="frm_users" method="post"  enctype="multipart/form-data">			
          	<fieldset>
   				 <legend>Upload CSV</legend>
                <table cellspacing="3" cellpadding="3" border="0" align="left" class="bodytext">  
                     <tr>
                       <!-- <td>
                           Flag
                        </td>
                        <td align="left">
                            <input type="text" name="flag"  id="flag"  value=""  required/>
                        </td>     -->
                        <td>
                           <input type="file" name="csv_file" value="" />
                            <input type="hidden" name="cmd" value="import_csv_data" /> 
                            <input type="submit" name="btn_submit" id="btn_submit" value="submit" class="button_blue">
                            <a href="import_data.php?cmd=download_sample">Download sample</a>
                            <br />
                            <code><font color="#993300">[N.B. CSV file is comma(,) separated.So csv data  will not be with comma.
                            Before upload please serach & remove all comma]</font></code>
                        </td>
                     </tr>
              </table>
            </fieldset>  
         </form>
      </td>
   </tr>
        <td>     
		</td>
   </tr>
</table>

</td>
</tr>
</table>

<?php
include("../template/footer.php");
?>









