<?php 
session_start(); 
if(isset($_SESSION['hrloggedin']))
{
  if($_SESSION['hrloggedin'] != "kore")
    header("location:index2.php");
}
else
  header("location:login.php");
?>
<html>
<head>
<title>K! 14 Search student</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="searchstudent.css">
<link rel="icon" type="image/png" href="images/favicon.ico">
</head>
<body>
  <?php include("sitelayout.php"); ?>
  <div class="span8" id="main-content">
    <br/>
    <span id="searchstudentdetails"><center>Search student details</center></span>
    <form class="form-horizontal" method="post" action="show_student.php" id="searchform">
      <div class="control-group">
        <label class="control-label" for="srollno">Enter roll no : </label>
        <div class="controls">
          <input type="textbox" name="srollno" id="srollno"/>
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="sphone">Enter phone no : </label>
        <div class="controls">
          <input type="textbox" name="sphone" id="sphone"/>
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="srollno">Enter email id : </label>
        <div class="controls">
          <input type="textbox" name="smailid" id="smailid"/>    
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-primary" name="ssubmit">Show
        </div>
      </div>      
    </form>
  </div>
  <?php include('sitelayout2.php'); include('footer.php');  ?>
</body>
</html>
