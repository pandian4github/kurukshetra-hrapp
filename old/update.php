<?php
	session_start();
	$filename="records/".$_POST['srollno'].".txt";
	$open=fopen($filename,"w+");
	$text=$_POST['textarea'];
//	echo $text;
	fwrite($open,$text);
	fclose($open);
	//$_SESSION['prevrollno']=$_POST['srollno'];
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
	$_SESSION['updatesuccess']=1;
	//echo "<script>alert('updated successfully');</script>";
	header("location:evaluate.php");
	//header('Location: ' . $_SERVER['HTTP_REFERER']);

?>