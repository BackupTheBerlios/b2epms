<?php
// session_start has to occur first
// Not using right now - will be added in later release for secure database searching
// session_start();
include './includes/dbconnect.php';
// Define post fields into variables
$phone_number = $_POST['phone_number'];
$msg_caller = $_POST['msg_caller'];
$phone_msg = $_POST['phone_msg'];
$msg_options = $_POST['msg_options'];
// This needs to be working in the next release
// $msg_private = $_POST['msg_private'];
$msg_recipients = @implode(',', $_POST['msg_recipients']);
$signed = $_POST['signed'];
$sql = "SELECT * FROM b2epms_user WHERE username='$msg_recipients'";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
$email_address = $row['email_address'];
// Lets error check to get rid of the bounces for no recipient
if(!$msg_recipients){
echo '<p><span style="color:red; font-size:2em"><strong>You must select at least one recipient!</strong></span></p>';
include "./index.php"; // Show the form again!
exit(); //if the error check has failed, we'll exit the script!
}
$sql = mysql_query("INSERT INTO b2epms_message (phone_number, msg_caller, phone_msg, msg_options, msg_recipients, signed, phone_msg_date)
		VALUES('$phone_number', '$msg_caller', '$phone_msg', '$msg_options', '$msg_recipients', '$signed', now())") or die("<img src='../images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
$id = mysql_insert_id();
$sql="SELECT * FROM b2epms_message WHERE msgid='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$date = date("m-d-Y g:i:s a", strtotime($row['phone_msg_date']));
if(!$sql){
	die("<img src='./images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
} else {
$userid = mysql_insert_id();
// Mail the phone message
    $subject = "***PHONE MESSAGE***";
    $header = "FROM: b2ePMS<b2ePMS> \n";
    $header .= "X-Priority: 2";
    $message = "
Date/Time:  $date

    Caller:  $msg_caller
    
    Message:  $phone_msg
	
    Action:  $msg_options

    Phone Number:  $phone_number

Thank you,

$signed

********************************************************************
This is an automated message, please do not reply! 
";
mail($email_address, $subject, $message, $header);	
// Let's thank the user and send them back to the message center
// This is not a very elegant method and is not xhtml 1.0 strict compliant
// but it works for now.
// Fixing this needs to be in the TODO file
echo '<head>';
echo '<META HTTP-EQUIV="Refresh" CONTENT="5;URL=./index.php">';
echo '</head>';
include 'includes/common.inc';
include_once 'includes/header.inc';
echo "<br /><img src='./images/success.png' width='12' height='12' border='0' name='success.png' alt='Success'>&nbsp;&nbsp;Message successfully sent!<br /><br />";
echo "Please wait to be returned to the Phone Message System.";
include_once 'includes/footer.inc';
}
?>
