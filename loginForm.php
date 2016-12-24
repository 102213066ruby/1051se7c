<?php
session_start();
require("dbconnect.php");
//set the login mark to empty
$_SESSION['uID'] ="";
?>
<STYLE TYPE="text/css"> 
<!-- 
  @import url(http://www.mysite.com/style.css); 
--> 
body{
	font-family:cursive, Microsoft JhengHei;
}
</STYLE>
<center>
<body>
<h1>Login Form</h1>
<img src="user.png">
<form method="post" action="loginCheck.php">
User Name: <input type="text" name="userName"><br />
Password : <input type="password" name="passWord"><br />
<input type="submit">
<p><a href="register.php">註冊</a></p>
</body>
</center>
</form>