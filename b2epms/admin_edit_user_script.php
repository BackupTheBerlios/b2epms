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
// Define post fields into simple variables
$userid = $_GET['userid'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
$username = $_POST['username'];
switch ($_POST['submit']) {
case 'Modify':
// Update the user table
$sql_update = mysql_query("UPDATE b2epms_user SET first_name='$first_name', last_name='$last_name', email_address='$email_address', username='$username' WHERE userid='$userid'")
       or die ("User Edit Failed!&nbsp;&nbsp;" . mysql_error());
       	echo "<p><strong>User Edit Successful!</strong></p>";
	    echo '<p>Return to the <a href="./admin.php">Admin Center</a></p>';
break;
case 'Delete':
// Delete the user from the table
$sql_delete = mysql_query("DELETE FROM b2epms_user WHERE userid='$userid'")
       or die ("User Deletion Failed!&nbsp;&nbsp;" . mysql_error());
       	echo "<p><strong>User Deletion Successful!</strong></p>";
	    echo '<p>Return to the <a href="./admin.php">Admin Center</a></p>';
break; 
} 
 } 
include_once './includes/footer.inc';
?>