<?php
session_start();
require("dbconnect.php");
require("Msg.php");
require("User.php");
if(! isset($_POST["act"])) {
	exit(0);
    
}


$act =$_POST["act"];
switch($act) {   

    case "sell":
        $cardID=$_POST['cardID'];
        $deadline=$_POST['deadline'];
        $bidMoney=$_POST['bidMoney'];
        $uID=$_POST['uID'];
        if(bid($cardID,$deadline,$bidMoney,$uID)){
            header("Location:player.php");
            //echo"sucess";
        }else{
            echo "Error";
        }
        break;
    
    case "update":
        $loginID=$_SESSION['uID'];
        $name=$_POST['name'];
        $skill=$_POST['skill'];
        $status=$_POST['status'];
        $salary=$_POST['salary'];
        $birth=$_POST['birth'];
        $employer=$_POST['employer'];
        if(update($name,$skill,$status,$salary,$birth,$employer,$loginID)){
            echo"sucess";
        }else{
            echo "Error";
        }
        break;
	case "login":
		$UserID = $_POST['id'];
		$password = $_POST['pwd'];
		$role=checkUser($loginName, $password);
        $department = checkDepartment($loginName, $password);
		if ( $role == 0 ) {
			//set login session mark
			$_SESSION['uID'] = $loginName;
			$_SESSION['role'] = $role;
            $_SESSION['department'] = $department;
			echo "login OK<br>";
			echo "<a href='index.php'>guest Book Home</a>";
        }else if ( $role> 0 ) {
			//set login session mark
			$_SESSION['uID'] = $loginName;
			$_SESSION['role'] = $role;
            $_SESSION['department'] = $department;
			echo "login OK<br>";
			echo "<a href='index.php'>guest Book Home</a>";
		} else {
			//set login mark to empty
			$_SESSION['uID'] = "";
			$_SESSION['role'] = -1;
			echo "Login failed.<br>";
			echo "<a href='loginForm.php'>login</a>";
		}
	default:
}
?>