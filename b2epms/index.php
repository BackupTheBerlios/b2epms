<?php
include_once './includes/header.inc';
include './includes/dbconnect.php';
?>
<p><strong>Phone Message Center</strong></p>
<hr />
<form action="post_msg.php" method="post">
    <fieldset>
        <legend>New Phone Message</legend>
         <span style="font-size: small;">
        Phone number<br />
        <input type="text" name="phone_number" size="14" maxlength="14" id="phone_number" value="<? echo $phone_number; ?>" /><br /><br />
        Caller name<br />
        <input type="text" name="msg_caller" size="50" maxlength="50" id="msg_caller" value="<? echo $msg_caller; ?>" /><br /><br />
        Message<br />
	<textarea name="phone_msg" rows="4" cols="50" id="phone_msg"><? echo $phone_msg; ?></textarea><br /><br />
	&nbsp;<input type="radio" name="msg_options" value="Please call" id="please_call" checked />Please call&nbsp;
	<input type="radio" name="msg_options" value="Will call back" id="will_call_back" />Will call back&nbsp;
	<input type="radio" name="msg_options" value="Returned your call" id="returned_your_call" />Returned your call&nbsp;
	<!-- This needs to be working in the next release <span style="color: red; font-weight:bold; "><input type="checkbox" name="msg_private[]" value="Private" />Private</span> -->
<br /><br />
Message Recipient
</span>
<table>
<tr>
<?php
// Lets query all our users so we can list them
$query  = "SELECT * FROM b2epms_user ORDER BY last_name ASC";
$result = mysql_query($query) or die("Error: " . mysql_error());
if(mysql_num_rows($result) == 0){
echo("Oops, there is nothing here!");
}
$i = 1;
while($row = mysql_fetch_array($result)){
// Begin your formatted output
echo '<td>';
echo '<span style="font-size: small;">';
echo '<input type="checkbox" name="msg_recipients[]" value="'.$row["email_address"].'" />';
echo '&nbsp;';
echo($row["last_name"]);
echo ', ';
echo($row["first_name"]);
echo '&nbsp;&nbsp;&nbsp;';
echo '</span></td>'; 
if (($i++ % 5) == false) {
echo "</tr>\n<tr>\n";
}
}
// End your formatted output
?>
</tr>
</table>
<br />
<span style="font-size: small;">
Signed
<input type="text" name="signed" size="3" maxlength="3" value="<? echo $signed; ?>" />
<br /><br />
<input type="submit" name="Submit" value="Send" />
<input type="reset" name="Cancel" value="Cancel" />
</span>
</fieldset>
</form>
<?php
include_once './includes/footer.inc';
?>
