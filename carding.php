<?php
session_start();
require("Msg.php");
$uID = $_SESSION["uID"];
$cardID = $_GET['cardID'];
//echo $cardID;
//$result=noWorkList();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出售卡片表單</title>
</head>

<body>

<p>拍賣</p>
<hr />
<?php 
$result=getcardID($cardID);
if($result) {
    while (	$rs=mysqli_fetch_assoc($result)) {
?>
        <table width="300" border="5">
            <tr>
                <td>卡片名稱</td><td><?php echo $rs['cardName'];?></td>
            </tr>
            <tr>
                <td>出售者</td><td><?php echo $rs['userName'];?></td>
            </tr>
                <!--<td>剩餘時間</td>
                <td>招標底價</td>
                <td>最高出價</td>
                <td>最高得標者</td>-->
            <tr>
                <td>出價</td>
            </tr>
            <tr>
                <td>截標時間</td>
            </tr>
            <tr>
                <form method="post" action="controller.php">
                    <input type="hidden" name="act" id="act" value="sell">
                    <input type="hidden" name="uID" id="uID" value="<?php echo $uID;?>">
                    <input type="hidden" name="cardID" id="cardID" value="<?php echo $cardID;?>">
                    <td><input type="text" name="bidMoney" id="bidMoney"></td>
                    <td><input type="datetime-Local" name="deadline" id="deadline"></td>
                    <td><input type="submit" name="Submit" value="送出" /></td>
                    </td>
                </form>
            </tr>
            
        </table>
<?php     
    }
}
?>
<p><a href='loginForm.php'>登出</a></p>
<p><a href='player.php'>玩家主頁</a></p>
</body>
</html>