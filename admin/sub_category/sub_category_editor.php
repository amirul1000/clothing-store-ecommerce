<?php
include("../template/header.php");
?>

<script
	language="javascript" src="sub_category.js"></script>
<b>Sub category</b>
<br />
<table cellspacing="3" cellpadding="3" border="0" align="center"
	width="98%" class="bdr">
	<tr>
		<td><a href="sub_category.php?cmd=list" class="nav3">List</a>
			<form name="frm_sub_category" method="post"
				onSubmit="return checkRequired();">
				<table cellspacing="3" cellpadding="3" border="0" align="center"
					class="bodytext">
					<tr>
						<td>Category</td>
						<td><?php
						$info['table']    = "category";
						$info['fields']   = array("*");
						$info['where']    =  "1=1 ORDER BY cat_name ASC";

						$rescat  =  $db->select($info);
							
						?> <select type="text" name="category_id" id="category_id"
							class="textbox">
								<option value="">--Select--</option>
								<?php
								foreach($rescat as $key=>$each)
								{
									?>
								<option value="<?=$each['id']?>"
								<?php if($each['id']==$category_id){ echo "selected"; }?>>
									<?=$each['cat_name']?>
								</option>
								<?php
								}
								?>
						</select>
						</td>
					</tr>
					<tr>
						<td>Sub category</td>
						<td><input type="text" name="sub_cat_name" id="sub_cat_name"
							value="<?=$sub_cat_name?>" style="width: 250px;" class="textbox">
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="hidden" name="cmd" value="add"> <input
							type="hidden" name="id" value="<?=$Id?>"> <input type="submit"
							name="btn_submit" id="btn_submit" value="submit"
							class="button_blue">
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

