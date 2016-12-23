<?php
session_start();
require("dbconnect.php");
//set the login mark to empty
$_SESSION['uID'] ="";
?>
<h1>註冊</h1><hr />
<form method="post" action="controller.php">
<input type="hidden" name="act" value="register">
User Name: <input type="text" name="userName"><br />
Password : <input type="password" name="passWord"><br />
<input type="submit" value="提交">
</form>