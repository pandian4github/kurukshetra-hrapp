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
<title>K! 14 Delete entry</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="searchstudent.css">
<link rel="icon" type="image/png" href="images/favicon.ico">
</head>
<body>
  <?php include("sitelayout.php"); ?>
  <div class="span8" id="main-content">
    <br/>
    <br/>
    <span id="searchstudentdetails"><center>Delete a student entry</center></span>
    <form class="form-horizontal" method="post" action="delete.php" id="searchform">
      <div class="control-group">
        <label class="control-label" for="srollno">Enter roll no : </label>
        <div class="controls">
          <input type="textbox" name="srollno" id="srollno"/>
        </div>
      </div>
      
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn btn-primary" name="ssubmit">Delete
        </div>
      </div>      
    </form>
    <br/>
    <br/>
    <?php
      if(isset($_SESSION['rollnonotentered']))
      {
        if($_SESSION['rollnonotentered'] == 1)
        {
          $_SESSION['rollnonotentered'] = 0;
          echo "<script type='text/javascript'>alert('Please enter roll number');</script>"; 
        }
      }
      if(isset($_SESSION['deletenoentry']))
      {
        if($_SESSION['deletenoentry'] == 1)
        {
          $_SESSION['deletenoentry'] = 0;
          echo "<script type='text/javascript'>alert('No entry found');</script>"; 
        }
      }
      if(isset($_SESSION['deletesuccess']))
      {
        if($_SESSION['deletesuccess'] == 1)
        {
          $_SESSION['deletesuccess'] = 0;
          echo "<script type='text/javascript'>alert('Entry deleted successfully');</script>"; 
        }
      }
    ?>
  </div>
  <?php include('sitelayout2.php'); include('footer.php');  ?>
</body>
</html>