<?php
session_start();
require("Msg.php");
$userName=$_SESSION['uID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
</head>

<body>
<p><?php echo $userName;?>您好&nbsp [<a href="logout.php">登出</a>]</p>
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

 <hr />
<!--<a href=getMoney.php> 你有多少錢     </a>-->
<a href='bag.php'> 福袋競標</a>
<a href='cardingWhere.php'> 競標&拍賣</a>
<hr/>
<p>您擁有的卡片 </p>
 <table width="200" border="1">
<tr><td>cardname</td></tr>
<?php 
$result=get($userName);
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
        ?>
        <tr>
        <td><?php echo $rs['cardName'];?></td>
        <td><a href='carding.php?cardID=<?php echo $rs['cardID'];?>'>賣</a></td>
        </tr>
        <?php 
	}
}
?>
</table>
 
 <?php
 /*
 if ($result) {
 	while (	$rs=mysqli_fetch_assoc($result)) {
 	echo "<tr><td>" . $rs['cardName'] . "</td>";
 	echo "<td> 賣 </td></tr>";
     }
-}
+}*/
 ?>
<hr />
<p>您正在競標的卡片</p>

 <!--</body>-->
 <hr />
<p>您正在拍賣的卡片</p>
 <table width="1000" border="5">
  <tr>
    <td>卡片名稱</td>
    <td>剩餘時間</td>
    <td>最高出價</td>
    <td>最高得標者</td>
  </tr>
<?php 
$result=getMyCarding($userName);
if ($result) {
	while (	$rs=mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . getCardName($rs['cardID']) . "</td>";
		echo "<td>". $rs['deadline'] ."</td>";
		echo "<td>" , $rs['highestprice'], "</td>";
		echo "<td>" . $rs['bidName'] . "</td>";
	}
} else {
	echo "<tr><td>No data found!<td></tr>";
}
?>
</table>
<hr />

 </body>