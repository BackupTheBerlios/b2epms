<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta name="generator" content=
    "HTML Tidy for Linux/x86 (vers 12 April 2005), see www.w3.org" />

    <title>b2ePMS</title>
    <meta name="generator" content="Bluefish" />
    <meta name="author" content="Brian Cabunac" />
    <meta name="description" content="b2ePMS Phone Message System" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content=
    "application/xhtml+xml; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="./includes/b2epms.css" />
</head><?php
    include './includes/common.inc';
?>

<body>
    <?php
        // For security reasons, lets make sure the install directory has been deleted
        if (file_exists(install)){
        echo("<p><img src='./images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;Leaving the install directory in place is a big security risk!</p>
        <p><img src='./images/fail.png' width='12' height='12' border='0' name='fail.png' alt='Fail'>&nbsp;Please delete the install directory, then refresh this page.</p>");
        // If it hasn't been deleted, exit now
        exit();
        // If it has been deleted, lets continue
        }
        else
        {
        echo $header_open_table1;
        echo $image_webhome;
        echo $header_close_table1;
        echo $header_open_table2;
        echo date("M d, Y h:i a", mktime());
        echo $header_close_table2;
        echo '<hr />';
        }
        ?>