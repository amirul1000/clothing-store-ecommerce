
<body class="bg">
<div class="container">
   <?php
     include("../templates/header.php");
   ?> 

<div class="slide_section">
      <div id="home-list">
	<h1>Login</h1>
	<form method="post">
		<table align="center" cellspacing="3" cellpadding="3">
			<tr>
				<td colspan="2"><span align="center"><font color="#FF0000"><?=$message?>
					</font> </span>
				</td>
			</tr>

			<tr>
				<td>Userid(Email)</td>
				<td><input type="text" name="email" id="email" value=""
					class="textbox" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" id="password" value=""
					class="textbox" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><a
					href="../login/login.php?cmd=forget_editor">Forget Password?</a>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="cmd" value="login" /> <input
					type="submit" name="submit" value="submit" />
				</td>
			</tr>
		</table>
	</form>
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
        

  