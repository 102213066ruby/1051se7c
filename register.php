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
<h1>註冊</h1>
<img src="user.png">
<form method="post" action="controller.php">
<input type="hidden" name="act" value="register">
User Name: <input type="text" name="userName"><br />
Password : <input type="password" name="passWord"><br />
<input type="submit" value="提交">
<p><a href="loginForm.php">登入</a></p>
</body>
</center>
</form>