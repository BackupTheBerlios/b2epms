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
<p><strong>Edit User</strong></p>
<hr />
<?php
$userid = $_GET['userid'];
$query  = "SELECT * FROM b2epms_user WHERE userid='$userid'";
$result = mysql_query($query) or die("Error: " . mysql_error());
if(mysql_num_rows($result) == 0){
echo("Oops, there is nothing here!");
}
while($row = mysql_fetch_array($result)){
// Begin your formatted output
// Prevent someone from changing the url in order to change the main administrator information
if(($row["user_level"] == 2) || ($row["userid"] == 1)){
echo '<font color=red>Editing the main administrator from here is not allowed!</font>';
echo '<p>Return to the <a href="./admin.php">Admin Center</a></p>';
}
else {
echo '<form id="edit_user" action="admin_edit_user_script.php?userid='.$row['userid'].'" method="POST">';
echo '<fieldset>';
echo '<legend>';
echo($row["last_name"]);
echo ',';
echo '&nbsp;';
echo($row["first_name"]);
echo '</legend>';
echo '<p>';
echo '<span style="font-size: small">';
echo '<label for="first_name">Modify First Name</label><br />';
echo '<input type="text" name="first_name" size="20" maxlength="50" id="first_name" value='.$row["first_name"].'  /><br /><br />';
echo '<label for="last_name">Modify Last Name</label><br />';
echo '<input type="text" name="last_name" size="20" maxlength="50" id="last_name" value='.$row["last_name"].' /><br /><br />';
echo '<label for="email_address">Modify Email Address</label><br />';
echo '<input type="text" name="email_address" size="20" maxlength="50" id="email_address" value='.$row["email_address"].' /><br /><br />';
echo '<label for="username">Modify Username</label><br />';
echo '<input type="text" name="username" size="20" maxlength="50" id="username" value='.$row["username"].' /><br /><br />';
echo '<input type="submit" name="submit" value="Modify" />';
echo '&nbsp;or&nbsp;';
echo '<input type="submit" name="submit" value="Delete" />';
echo '</span>';
echo '</p>';
echo '</fieldset>';
echo '</form>';
echo '<br />';
// End your formatted output
}
}
}
include_once './includes/footer.inc';
?>
