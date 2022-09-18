	<?php
		session_start();

		$userid=$_POST["email"];
		$pw=$_POST["password"];
		require_once("cls_select.php");

		$obj=new login();
		$obj->userid=$userid;
		$obj->password=$pw;
    	$result=$obj->DBlogin();


    	if($result==true){
    		$_SESSION['success_login']= TRUE;
			header('Location:../Pages/index.php');
    	}
    	else{
    		$_SESSION['Invalid']= 'Invalid User Id or Password';
			header('Location:../Pages/Login.php');
    	}
   ?>