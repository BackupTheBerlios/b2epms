<?php
// session_start has to occur first
session_start();
if (! session_is_registered ( "userid") )
{
session_unset ();
session_destroy ();
$url = "Location: search_login.php";
header ( $url );
}
else
{
include_once './includes/header.inc';
include './includes/dbconnect.php';
?>   
<p><strong>Message Search</strong>&nbsp;&nbsp;&nbsp;<a href="./logout.php">Logout</a></p>
<hr />
<form id="search" action="search_script.php" method="get">
<fieldset>
<legend>Search by Message Recipient</legend>
<p>
<span style="font-size: small;">
<select name="q">
<?php
$query  = "SELECT * FROM b2epms_user ORDER BY last_name ASC";
$result = mysql_query($query) or die("Error: " . mysql_error());
if(mysql_num_rows($result) == 0){
echo("Oops, there is nothing here!");
}
while($row = mysql_fetch_array($result)){
// Begin your formatted output
 
echo '<option value='.$row["username"].'>';
echo($row["last_name"]);
echo ', ';
echo($row["first_name"]);
}
}
?>
</option>
</select>
</span>
</p>
<p><input type="submit" name="Submit" value="Search" />
</p>
</fieldset>
</form>
<br />
<?php
include_once './includes/footer.inc';
?>
