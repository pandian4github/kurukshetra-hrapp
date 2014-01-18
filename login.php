<?php
session_start(); 
if(isset($_SESSION['hrloggedin']))
{
  if($_SESSION['hrloggedin'] == "kore")
    header("location:index.php");
  else
    header("location:index2.php");
}
?>
<html>
<head>
<title>K! 14 HR Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="login.css">
<link rel="icon" type="image/png" href="images/favicon.ico">
<script type="text/javascript">
</script>
</head>
<body>
  <?php include("sitelayout.php"); ?>
  <div class="span8" id="main-content">
    <br/>

  <form class="form-horizontal"  method="post" action="checklogin.php" id="loginform">
    <div class="control-group">
      <label for="username" class="control-label">Enter username : </label>
      <div class="controls">
        <input type="username" name="username"/>
      </div>
    </div>
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
  <br/>
  <br/>
  <?php include('sitelayout2.php'); include('footer.php');  ?>
  </body>
</html>
