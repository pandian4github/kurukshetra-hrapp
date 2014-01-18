<?php
session_start(); 
?>
<html>
<head>
<title>K! 13 HR Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="login.css">
<script type="text/javascript">
</script>
</head>
<body>
	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>

	<form class="form-horizontal"  method="post" action="checklogin.php" id="loginform">
		<div class="control-group">
			<label for="password" class="control-label">Enter password : </label>
			<div class="controls">
				<input type="password" name="password"/>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<button type="submit" class="btn btn-success">Enter
			</div>
		</div>

	</form>
	</div><br/>
	<?php include('sitelayout2.php'); include('footer.php');  ?>
	</body>
</html>
