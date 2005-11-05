<?php
include_once './includes/header.inc';
?>
<p><strong>Login</strong></p>
<hr />
<form id="login_form" action="verify_user.php" method="post">
<p><span style="font-size: smaller;">Administrator Username<br />
<input type="text" name="username" id="username" /><br /><br />
Administrator Password<br />
<input name="user_passwd" type="password" id="user_passwd" /><br /><br />
<input type="submit" name="Submit" value="Login" />

</span>
</p>
</form>
<?php
include_once './includes/footer.inc';
?>