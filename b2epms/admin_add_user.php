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
$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email_address'];
// Lets do some error checking
if((!$username) || (!$first_name) || (!$last_name) || (!$email_address)){
    echo '<p><strong>You did not submit the following required information!</strong></p>';
    if(!$username){
        echo "User ID is a required field. Please enter it below.<br />";
    }
    if(!$first_name){
        echo "First Name is a required field. Please enter it below.<br />";
    }
    if(!$last_name){
        echo "Last Name is a required field. Please enter it below.<br />";
    }
    if(!$email_address){
        echo "Email Address is a required field. Please enter it below.</p>";
    }
    include_once "admin.php";  // Show the form again!
    exit(); // if the error checking has failed, we'll exit the script!
}
// Create the new user
$sql = mysql_query("INSERT INTO b2epms_user (username,
       first_name, last_name, email_address, login_date)
       VALUES('$username', '$first_name', '$last_name',  '$email_address',
        now())")
       or die ("User Creation Failed!&nbsp;&nbsp;" . mysql_error());
       	echo "<p><strong>User Creation Successful!</strong></p>";
	    echo '<p>Return to the <a href="./admin.php">Admin Center</a></p>';
// End user creation.
$userid = mysql_insert_id();
$sql = mysql_query("UPDATE b2epms_user SET activated='1' WHERE userid='$userid'");
// End the installation script
}
include_once './includes/footer.inc';
?>