<?php
session_start();
require("Msg.php");
$userName = $_SESSION["uID"];
$result=getbag();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>


<body>
<?php 
$r = getMoney($userName);
if ($r) {
 	while (	$r=mysqli_fetch_assoc($r)) {
         ?>
         您現在有<?php echo $r['Money'];?>元
     <?php 
         break;
     }
 }
 ?>

<p>福袋</p>
<hr />
<table width="1000" border="5">
  <tr>
    <td>福袋</td>
    <td>剩餘時間</td>
    <td>最高出價</td>
    <td>最高得標者</td>
    <td>出價</td>
  </tr>
<?php
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
		echo "<tr><td>" . $rs['bagID'] . "</td>";
		echo "<td>". $rs['expire'] ."</td>";
		echo "<td>" , $rs['highestprice'], "</td>";
		echo "<td>" . $rs['userName'] . "</td>";
        
    echo"<td><a href='setprice.php'>出價 </a> </td> </tr>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
<a href='loginForm.php'>登出</a>
</body>
</html>