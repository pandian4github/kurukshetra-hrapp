<?php
	session_start();
	
	$dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr');

	$_SESSION['oldpasswrong']=0;
	$_SESSION['passchanged']=0;
	
	$password=$_POST['password'];
	$newpass=$_POST['newpass'];

	$query="SELECT * from `kuruk_hr`.`password` where pass1='$password';";
	$res=mysqli_query($dbc,$query);
	$count=mysqli_num_rows($res);

	if($count==1)
	{
		$query1="UPDATE `kuruk_hr`.`password` SET pass1='$newpass' where pass1='$password';";
		$res1=mysqli_query($dbc,$query1);

		$_SESSION['passchanged']=1;

		header("location:index.php");
	}
	else
	{
		$_SESSION['oldpasswrong']=1;
		header("location:changepass.php");
	}
	
?>