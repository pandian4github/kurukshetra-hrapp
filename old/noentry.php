<?php 
session_start(); 
if(!isset($_SESSION['hrloggedin']))
{
	header("location:login.php");
}
?>
<html>
<head>
<title>K! 13 Search student</title>
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="stylesheet" type="text/css" href="searchstudent.css">
<link rel="stylesheet" type="text/css" href="noentry.css">
</head>
<body>
	<?php include("sitelayout.php"); ?>
	<div class="content">
		<br/>
		<span id="searchstudentdetails">Search student details</span><br/><br/>
		<span id="entercollegeid">Enter your college Roll no </span><br/>
		<form id="searchform" method="post" action="show_student.php">
			<input type="textbox" name="srollno" id="srollno"/><br/><br/>
			<span id="enterphone">Enter your phone number</span><br/>
			<input type="textbox" name="sphone" id="sphone"/><br/><br/>
			<span id="entermailid">Enter your email id</span><br/>
			<input type="textbox" name="smailid" id="smailid"/><br/>			
			<input type="submit" name="ssubmit" id="ssubmit" value="GO"><br/>

			</form>
		<span id="noentryfound">No entry found !</span>
		<div id="createentry"><a href="index.php">Create an entry ?</a></div>
	</div>
</body>
</html>
