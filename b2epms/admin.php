<?php
// session_start has to occur first
session_start();
if (! session_is_registered ( "userid") )
{
session_unset ();
session_destroy ();
$url = "Location: login.php";
header ( $url );
}
else
{
include_once './includes/header.inc';
include './includes/dbconnect.php';
?>   
<p><strong>Administration Center</strong>&nbsp;&nbsp;&nbsp;<a href="./logout.php">Logout</a></p>

<hr />

<table style="width: 100%; text-align: left;" border="0"
cellpadding="2" cellspacing="2">
<tr>
<td style="width: 50%; text-align: left; vertical-align: bottom;">
<form id="add_user" action="admin_add_user.php" method="post">
    <fieldset>
        <legend>Add New User</legend>
        <p>
        <span style="font-size: small;">
        <label for="first_name">First name<br />
        <input type="text" name="first_name" size="20" maxlength="50" id="first_name" /><br /><br />
        <label for="last_name">Last name<br />
        <input type="text" name="last_name" size="20" maxlength="50" id="last_name" /><br /><br />
        <label for="email_address">Email address<br />
        <input type="text" name="email_address" size="20" maxlength="50" id="email_address" /><br /><br />
        <label for="username">User Name<br />
        <input type="text" name="username" size="20" maxlength="50" id="username" /><br /><br />
        <input type="reset" name="Cancel" value="Cancel" />
        <input type="submit" name="Submit" value="Add User" />
        </span>
        </p>
    </fieldset>
</form>
</td>
<td style="width: 50%; text-align: left; vertical-align: top;">
<fieldset>
    <legend>Edit Existing User</legend>
    <p>
    <span style="font-size: small">
<?php
$query  = "SELECT * FROM b2epms_user ORDER BY last_name ASC";
$result = mysql_query($query) or die("Error: " . mysql_error());
if(mysql_num_rows($result) == 0){
echo("Oops, there is nothing here!");
}
while($row = mysql_fetch_array($result)){
// Begin your formatted output
// The main administrator should not be viewed/edited from here
if(($row["user_level"] == 2) || ($row["userid"] == 1)){
echo '';
}
else {
echo '&nbsp;&nbsp;';
echo '<a href="./admin_edit_user.php?userid='.$row['userid'].'">';
echo($row["last_name"]);
echo ',';
echo '&nbsp;';
echo($row["first_name"]);
echo '</a>';
echo '<br />';
// End your formatted output
}
}
?>
</span>
</p>
</fieldset>
</td>
</tr>
</table>
<?php
}
include_once './includes/footer.inc';
?>
