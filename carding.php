<?php
session_start();
require("Msg.php");
$uID = $_SESSION["uID"];
//$result=noWorkList();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>

<body>

<p>拍賣&競標 </p>
<hr />
<table width="1000" border="5">
  <tr>
    <td>卡片名稱</td>
    <td>剩餘時間</td>
    <td>招標底價</td>
    <td>最高出價</td>
    <td>最高得標者</td>
    <td>出價</td>
  </tr>
<a href='loginForm.php'>登出</a>
</table>
</body>
</html>