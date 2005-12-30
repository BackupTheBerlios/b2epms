<?php
// session_start has to occur first
session_start();
include './includes/dbconnect.php';
include './includes/common.inc';
// Convert to simple variables
$username = $_POST['username'];
$user_passwd = $_POST['user_passwd'];

if((!$username) || (!$user_passwd)){
	include_once './includes/header.inc';
	echo "<p>Please enter ALL of the information!</p>";
	include_once './search_login.php';
	include_once './includes/footer.inc';
	exit();
}



// Work on this so that anyone marked as userlevel 1 can go here



// Convert password to md5 hash
$admin_passwd = md5($user_passwd);
// check if the user info validates with the database
$sql = mysql_query("SELECT * FROM b2epms_user WHERE username='$username' AND user_passwd='$admin_passwd' AND activated='1' AND user_level='2'");
$login_check = mysql_num_rows($sql);
if($login_check > 0){
	while($row = mysql_fetch_array($sql)){
	foreach( $row AS $key => $val ){
		$$key = stripslashes( $val );
	}
		// Register session variables!
		session_register('userid');
		$_SESSION['userid'] = $user_level;
		mysql_query("UPDATE b2epms_user SET login_date=now() WHERE userid='$userid'");
      $url = "Location: search.php";
		header($url);
	}
} else {
	include_once './includes/common.inc';
	include_once './includes/header.inc';
	echo "<p><strong>You could not be logged in! Either the username and password do not match or you have not validated your account!</strong></p>
	<p><strong>Please try again!</strong></p>";
	include_once './search_login.php';
	include_once './includes/footer.inc';
}
?>
