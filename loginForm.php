<?php
session_start();
require("dbconnect.php");
//set the login mark to empty
$_SESSION['uID'] ="";
?>
<h1>登入</h1><hr />
<form method="post" action="loginCheck.php">
User Name: <input type="text" name="userName"><br />
Password : <input type="password" name="passWord"><br />
<input type="submit" value="登入">
</form>
<p><a href="register.php">註冊</a></p>