<?php
session_start(); 
?>
<html>
<head>
<title>K! 14 HR Login</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="changepass.css">
<link rel="icon" type="image/png" href="images/favicon.ico">
<script type="text/javascript">
</script>
</head>
<body>
  <?php include("sitelayout.php"); ?>
  <div class="span8" id="main-content">
    <br/>
    <br/>
    <br/>
  <br/>
  <form method="post" class="form-horizontal" action="change.php" id="changepassform">
    <div class="control-group">
      <label class="control-label" for="password">Enter old password : </label>
      <div class="controls">
        <input type="password" name="password"/>
      </div>    
    </div>
    <div class="control-group">
      <label class="control-label" for="newpass">Enter new password : </label>
      <div class="controls">
        <input type="password" name="newpass"/>
      </div>    
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn btn-primary">Submit
      </div>    
    </div>

  </form>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

  </div>

  <?
  if(isset($_SESSION['oldpasswrong']))
  {
    if($_SESSION['oldpasswrong']==1)
    {
      echo "<script>alert('Old password wrong');</script>";
      $_SESSION['oldpasswrong']=0;
    }
  }
  ?>
  <?php
  include('sitelayout2.php');
  include('footer.php');
  ?>
  </body>
</html>
