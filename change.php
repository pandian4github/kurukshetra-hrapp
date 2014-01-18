<?php
	session_start();
	
	include("connect.php");

	$_SESSION['oldpasswrong']=0;
	$_SESSION['passchanged']=0;
	
	$password=$_POST['password'];
	$newpass=$_POST['newpass'];

	$query="SELECT * from `k14_tech_team`.`login` where `username`='".$_SESSION['hrloggedin']."' and `password` = '$password';";
	$res=mysqli_query($dbc,$query);
	$count=mysqli_num_rows($res);

	if($count==1)
	{
		$query1="UPDATE `k14_tech_team`.`login` SET `password`='$newpass' where `username` = '".$_SESSION['hrloggedin']."';";
		$res1=mysqli_query($dbc,$query1);
		$_SESSION['passchanged']=1;
		if($_SESSION['hrloggedin'] != "kore")
			header("location:index2.php");
		else
			header("location:index.php");
	}
	else
	{
		$_SESSION['oldpasswrong']=1;
		header("location:changepass.php");
	}
	
?>