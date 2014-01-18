<?php
	session_start();
	$dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr');
	
	$password=$_POST['password'];
	//echo "<script>alert('$password');</script>";
	$query="SELECT * from `kuruk_hr`.`password` where pass1='$password';";
	$res=mysqli_query($dbc,$query);
	$count=mysqli_num_rows($res);
	//echo "<script>alert('$count');</script>";
	if($count==1)
	{
		$_SESSION['hrloggedin']=1;
		//echo "dsfads";
		header("location:index.php");
	}
	else
		header("location:login.php");
?>
