<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
    <meta name="generator" content=
    "HTML Tidy for Linux/x86 (vers 12 April 2005), see www.w3.org">

    <title>b2ePMS Installation Successful</title>
    <meta name="generator" content="Bluefish">
    <meta name="author" content="cabu">
    <meta name="description" content="b2ePMS Installation Successful">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Type" content=
    "application/xhtml+xml; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../includes/b2epms.css">
</head>

<body>
    <p><a href="http://b2epms.berlios.de"><img src="../images/logo.png" title=
    "b2ePMS" alt="logo.png" style="border: 0px solid;"></a></p>
    <hr>
    <?php
    // Define post fields into simple variables
    $dbhost = $_POST['dbhost'];
    $dbusername = $_POST['dbusername'];
    $dbpasswd = $_POST['dbpasswd'];
    $database_name = $_POST['database_name'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $user_passwd = $_POST['user_passwd'];
    // Lets do some error checking
    if((!$dbhost) || (!$dbusername) || (!$database_name) || (!$username) || (!$first_name) || (!$last_name) || (!$email_address)){
        echo '<p><strong>You did not submit the following required information!</strong></p>';
        if(!$dbhost){
            echo "<p>Database Host is a required field. Please enter it below.</p>";
        }
        if(!$dbusername){
            echo "Database User Name is a required field. Please enter it below.</p>";
        }
         if(!$database_name){
            echo "Database Name is a required field. Please enter it below.</p>";
        }   
        if(!$username){
            echo "b2ePMS Administrator Username is a required field. Please enter it below.</p>";
        }
        if(!$first_name){
            echo "b2ePMS Administrator First Name is a required field. Please enter it below.</p>";
        }
        if(!$last_name){
            echo "b2ePMS Administrator Last Name is a required field. Please enter it below.</p>";
        }
        if(!$email_address){
            echo "b2ePMS Administrator Email Address is a required field. Please enter it below.</p>";
        }
        include_once "index.php"; // Show the form again!
        exit(); // if the error checking has failed, we'll exit the script!
    }
    //Create the tables
    $link_id = mysql_connect ($dbhost, $dbusername, $dbpasswd);
    echo "<p><img src='../images/success.png' width='12' height='12' border='0' name='success.png' alt='Success'>&nbsp;&nbsp;Successfully connected to MySQL server.</p>";
    mysql_select_db("$database_name") or die("<img src='../images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
    $query1 = 'CREATE TABLE b2epms_message( '.
              'msgid int(25) NOT NULL auto_increment, '.
              'phone_number varchar(50) NOT NULL default "", '.
              'phone_msg text NOT NULL, '.
              'msg_options text NOT NULL, '.
              'msg_private enum("0","1") NOT NULL default "0", '.
              'msg_caller text NOT NULL, '.
              'msg_recipients text NOT NULL, '.
              'signed text NOT NULL, '.
              'phone_msg_date datetime NOT NULL default "0000-00-00 00:00:00", '.
              'PRIMARY KEY  (msgid))';
    if (mysql_query($query1)){
    echo "<p><img src='../images/success.png' width='12' height='12' border='0' name='success.png' alt='Success'>&nbsp;&nbsp;Successfully created message table.</p>";
    } else {
    die("<img src='../images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
    }     
    $query2 = 'CREATE TABLE b2epms_user( '.
              'userid int(25) NOT NULL auto_increment, '.
              'first_name varchar(25) NOT NULL default "", '.
              'last_name varchar(25) NOT NULL default "", '.
              'email_address varchar(25) NOT NULL default "", '.
              'username varchar(25) NOT NULL default "", '.
              'user_passwd varchar(255) NOT NULL default "", '.
              'user_level enum("0","1","2") NOT NULL default "0", '.
              'login_date datetime NOT NULL default "0000-00-00 00:00:00", '.
              'activated enum("0","1") NOT NULL default "0", '.
              'PRIMARY KEY  (userid))';
    if (mysql_query($query2)){
    echo "<p><img src='../images/success.png' width='12' height='12' border='0' name='success.png' alt='Success'>&nbsp;&nbsp;Successfully created user table.</p>";
    } else {
    die("<img src='../images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
    }
    // End table creation
    // Create the admin user
    //
    // Encrypt the admin password before entering it into the database.
    $encrypted_user_passwd = md5($user_passwd);
    $sql = mysql_query("INSERT INTO b2epms_user (username,
           first_name, last_name, email_address,  user_passwd, login_date)
           VALUES('$username', '$first_name', '$last_name',  '$email_address',
           '$encrypted_user_passwd', now())")
           or die ("<img src='../images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;&nbsp;" . mysql_error());
    echo "<p><img src='../images/success.png' width='12' height='12' border='0' name='success.png' alt='Success'>&nbsp;&nbsp;Successfully created administrator account.</p>";      
    // End admin user creation.
    $userid = mysql_insert_id();
    $code = md5($user_passwd);
    $sql = mysql_query("UPDATE b2epms_user SET activated='1', user_level='2' WHERE userid='$userid' AND user_passwd='$code'");
    $sql_doublecheck = mysql_query("SELECT * FROM b2epms_user WHERE userid='$userid' AND user_passwd='$code' AND activated='1' AND user_level='2'");
    $doublecheck = mysql_num_rows($sql_doublecheck);
    if($doublecheck == 0){
            echo '<p><strong><font color=red>Your account could not be activated!</font></strong></p>';
    } elseif ($doublecheck > 0) {
            echo '<p><strong>b2ePMS installation Successful!</strong></p>';
            echo '<p><span style="color: red; ">For security reasons, you must remove the install directory.</span></p>';
            echo '<p>Please proceed to the <a href="../admin.php">Admin Center</a> to finish setting up your new Phone Message Center!</p>';
    // End the installation script
    }
    ?>
    <hr>
    <span style="font-size: x-small;">Powered by: <a href=
    "http://b2epms.berlios.de">b2ePMS-0.1</a> © 2005-2009 - All rights
    reserved.<br>
    b2ePMS is Free Software released under the <a href=
    "http://www.gnu.org/licenses/gpl.txt">GNU/GPL license</a></span>
</body>
</html>
