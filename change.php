<?php
session_start();
require("Msg.php");
$userName = $_SESSION["uID"];
$result=getCarding();
$re=getbag();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>拍賣&競標&福袋</title>
</head>
<script type="text/javascript" src="jquery.js"></script>
<script language="javascript">
function check() {
	for (i=0; i < pArray.length;i++) {	
		cardName=new card(pArray[i]['cardName']); //convert the date string into date object in javascript
		if (tday <= now) { 
			//expired, set the explode image and text
			//$("#bomb" + i).attr('src',"images/explode.jpg");
			$("#timer"+i).html("截標")
            location.href="timesup.php? act=timesup";
		} else {
			//set the bomb image  and calculate count down
			//$("#bomb" + i).attr('src',"images/bomb.jpg");
			$("#timer"+i).html(Math.floor((tday-now)/1000))			
		}
	}
}
</script>
<body>
<?php 
$flag = Satisfy($userName);
if($flag == 8) {
    if(reward($userName)) {
        echo "Congratulation!!! you got 10000 dollars.";
    } else {
        echo "Ooops, sorry, there is something wrong.";
    }
} else {
    echo "你尚未集滿所有卡片，無法兌換，請再加油";
}
?>

<a href='player.php'>返回</a>

<a href='loginForm.php'>登出</a>
</body>
</html>