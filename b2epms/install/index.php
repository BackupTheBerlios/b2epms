<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>b2ePMS Installation</title>
    <meta name="generator" content="Bluefish" />
    <meta name="author" content="Brian Cabunac" />
    <meta name="description" content="b2ePMS Installation" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Type" content=
    "application/xhtml+xml; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../includes/b2epms.css" />
</head>

<body onload="self.focus();document.getElementById('install').dbhost.focus()">
    <p><a href="http://b2epms.berlios.de"><img src="../images/logo.png" title=
    "b2ePMS" alt="logo.png" style="border: 0px solid;" /></a></p>
    <hr />

    <p><strong>b2ePMS Installation</strong> [Please fill in all blanks]</p>
    <hr />

    <form id="install" action="install.php" method="post">
        <fieldset>
            <legend><span style="font-weight: bold;">Database
            Information</span></legend><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">Database
            Host</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="dbhost" size="40"
            maxlength="50" id="dbhost" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">Database User
            Name</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="dbusername" size="40"
            maxlength="50" id="dbusername" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">Database User
            Password</span><br />
            &nbsp;&nbsp;&nbsp;<input type="password" name="dbpasswd" size="40"
            maxlength="50" id="dbpasswd" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">Database
            Name</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="database_name" size="40"
            maxlength="50" id="database_name" />
        </fieldset>

        <fieldset>
            <legend><span style="font-weight: bold;">Administrator
            Information</span></legend><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">b2ePMS
            Administrator Username</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="username" size="40"
            maxlength="50" id="username" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">b2ePMS
            Administrator First Name</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="first_name" size="40"
            maxlength="50" id="first_name" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">b2ePMS
            Administrator Last Name</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="last_name" size="40"
            maxlength="50" id="last_name" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">b2ePMS
            Administrator Email Address</span><br />
            &nbsp;&nbsp;&nbsp;<input type="text" name="email_address" size="40"
            maxlength="50" id="email_address" /><br />
            &nbsp;&nbsp;&nbsp;<span style="font-size: smaller;">b2ePMS
            Administrator Password</span><br />
            &nbsp;&nbsp;&nbsp;<input type="password" name="user_passwd" size=
            "40" maxlength="50" id="user_passwd" />
        </fieldset>

        <p>&nbsp;&nbsp;&nbsp;<input type="reset" name="Cancel" value=
        "Cancel" /> <input type="submit" name="Submit" value=
        "Install Now" /></p>
    </form>
    <hr />

    <table style="text-align: left; width: 100%;" border="0" cellspacing="0"
    cellpadding="2">
        <tr>
            <td style="width: 75%; text-align: left; vertical-align: top;">
                <p><span style="font-size: x-small;">Powered by: <a href=
                "http://b2epms.berlios.de">b2ePMS-0.1</a> © 2005-2009 - All
                rights reserved.<br />
                b2ePMS is Free Software released under the <a href=
                "http://www.gnu.org/licenses/gpl.txt">GNU/GPL
                license</a></span></p>
            </td>

            <td style="width: 25%; text-align: right; vertical-align: top;">
                <p><a href=
                "http://validator.w3.org/check?uri=referer"><img src="../images/vxhtml10.png"
                alt="Valid XHTML 1.0!" height="31" width="88" style=
                "border: 0px solid;" /></a></p>
            </td>
        </tr>
    </table>
</body>
</html>
