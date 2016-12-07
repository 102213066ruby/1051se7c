<?php
session_start();
require("dbconnect.php");
//set the login mark to empty
$_SESSION['uID'] ="";
?>
<h1>Login Form</h1><hr />
<form method="post" action="loginCheck.php">
User Name: <input type="text" name="userName"><br />
Password : <input type="password" name="passWord"><br />
<input type="submit">
</form>