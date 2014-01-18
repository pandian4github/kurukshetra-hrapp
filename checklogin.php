<?php
	session_start();
	
	include("connect.php");

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query="SELECT * from `k14_tech_team`.`login` where `username` = '$username' and `password` = '$password';";
	$res=mysqli_query($dbc, $query);
	$count=mysqli_num_rows($res);

//	echo "<script>alert('$count');</script>";
	if($count==1)
	{
		$_SESSION['hrloggedin']=$username;
		if($username == "kore")
			header("location:index.php");
		else
			header("location:index2.php");
	}
	else
		header("location:login.php");
?>
