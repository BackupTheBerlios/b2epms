<?php
include_once './includes/header.inc';
// Connect to the database
include './includes/dbconnect.php';
  // Get the search variable from URL

  $var = @$_GET['q'] ;
  $trimmed = trim($var); //trim whitespace from the stored variable

// check for an empty string and display a message.
if ($trimmed == "")
  {
  echo "";
  exit;
  }
	
// check for a search parameter
if (!isset($var))
  {
  echo "</p>";
  exit;
  }
// Build SQL Query  
$query = "select * from b2epms_message where msg_recipients like \"%$trimmed%\"  order by phone_msg_date DESC"; // EDIT HERE and specify your table and field names for the SQL query

  $result = mysql_query($query) or die("Couldn't execute query");

// display what the person searched for
echo "<p>Your search for &quot;" . $var . "&quot; returned the following results:</p>";

// begin to show results set
  while ($row= mysql_fetch_array($result)) {
// Begin your formatted output
echo '<h4>';
echo "<span style='color:red'>";
echo "&nbsp;$title" ;
echo($row["msg_recipients"]);
echo "</span>";
echo '</h4>';
echo '<span style="font-size: x-small">';
echo($row["phone_msg_date"]);
echo '</span>';
echo '<p>';
echo '<span style="font-size: small">';
echo($row["msg_caller"]);
echo '</span>';
echo '</p>';
echo '<p>';
echo '<span style="font-size: small">';
echo($row["phone_msg"]);
echo '</span>';
echo '</p>';
echo '<p>';
echo '<span style="font-size: small">';
echo($row["msg_options"]);
echo '</span>';
echo '</p>';
echo '<p>';
echo '<span style="font-size: small">';
echo($row["phone_number"]);
echo '</span>';
echo '</p>';
echo '<p>';
echo '<span style="font-size: x-small">';
echo($row["signed"]);
echo '</span>';
echo '</p>';
// End your formatted output
}
  echo "<br />";
require './includes/footer.inc'; 
?>