<?php
session_start();
require("Msg.php");
$userName=$_SESSION['uID'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>您擁有的卡片</title>
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
        <td>賣</td>
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
}*/
?>
<hr />
<p>您正在競標的卡片</p>

</body>