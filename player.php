<?php
session_start();
require("Msg.php");
$userName=$_SESSION['uID'];
$result=get($userName);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>您擁有的卡片</title>
</head>

<body>
<?php 
$r = getMoney($userName);
if ($result) {
	while (	$r=mysqli_fetch_assoc($r)) {
        ?>
        您現在有<?php echo $r['Money'];?>錢
    <?php 
        break;
    }
}
?>
<p><a href="logout.php">登出</a></p>
<p>您擁有的卡片 </p>
<hr />
<!--<a href=getMoney.php> 你有多少錢     </a>-->
<table width="200" border="1">
  <tr>
    <td>cardName</td>
    <td>  </td>
  </tr>

<?php

if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
	echo "<tr><td>" . $rs['cardName'] . "</td>";
	echo "<td> 賣 </td></tr>";
    }
}
?>

</body>