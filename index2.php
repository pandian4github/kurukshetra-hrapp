<?php 
session_start(); 
if(isset($_SESSION['hrloggedin']))
{
  if($_SESSION['hrloggedin'] == "kore")
    header("location:index.php");
}
else
  header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>K! 14 HR App</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="icon" type="image/png" href="images/favicon.ico">

<script type="text/javascript">
function showerror(i)
{
  var error=["nameerror","rollnoerror","phoneerror","mailiderror","batcherror","rollnoduplicate","teamerror"];
  var x=document.getElementById(error[i]);
  x.className="visible";
}
</script>
</head>
<body>

  <?php include("sitelayout.php"); ?>
  <div class="span8" id="main-content">
    <?php
    if(isset($_SESSION['updateremaining']))
    {
      if($_SESSION['updateremaining'] == 1)
      {
        ?>

      <center><span id="entryhead">Make an entry</span></center>
  
        <form class="form-horizontal" method="post" action="doentryoptional.php" id="entryform">
          <div class="control-group">
            <label class="control-label" for="name">Name</label>
            <div class="controls">
              <input type="textbox" id="name" name="name"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="rollno">Roll no</label>
            <div class="controls">
              <input type="textbox" id="rollno" readonly="true" name="rollno" value="<?echo $_SESSION['rollno'];?>"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="course">Course</label>
            <div class="controls">
            <select name="course" id="course" class="span2">
              <option value="B.E">B.E</option>
              <option value="B.E">M.E</option>
              <option value="B.E">M.Sc</option>
            </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="dept">Department</label>
            <div class="controls">
            <select name="dept" id="dept" class="span2">
              <option value="ECE">ECE</option>
              <option value="CSE">CSE</option>
              <option value="Civil">Civil</option>
              <option value="Mech">Mech</option>
              <option value="EEE">EEE</option>
              <option value="Printing">Printing</option>
              <option value="Industrial">Industrial</option>
              <option value="IT">IT</option>
              <option value="Mining">Mining</option>
              <option value="Manu">Manu</option>
              <option value="Agri">Agri</option>
              <option value="Mat Sci">Mat Sci</option>
              <option value="Geo Info">Geo Info</option>
              <option value="Biomedical">Biomedical</option>
              <option value="Maths">Maths</option>
              <option value="Physics">Physics</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Others">Others</option>
            </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="batch">Batch</label>
            <div class="controls">
              <input type="textbox" id="batch" name="batch" size="2"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="year">Year of study</label>
            <div class="controls">
            <select name="year" id="year" class="span2">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="phone">Phone no</label>
            <div class="controls">
              <input type="textbox" id="phone" name="phone"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="mailid">Email id</label>
            <div class="controls">
              <input type="textbox" id="mailid" name="mailid"/>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="fbusername">FB username</label>
            <div class="controls">
              <input type="textbox" id="fbusername" name="fbusername"/><span id="optional">Optional</span>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="native">Nativity</label>
            <div class="controls">
              <input type="textbox" id="native" name="native"/>    
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-primary" name="submit">Submit
            </div>
          </div>

        </form>

        <?
        $_SESSION['updateremaining'] = 0;
      }
      else
      {
        ?>
      
        <br/>
        <br/>
        <br/>
        <br/>
        <center><span id="entryhead">Make an entry</span></center>

        <form class="form-horizontal" method="post" action="updateteam.php" id="entryform">

          <div class="control-group">
            <label class="control-label" for="rollno">Roll no</label>
            <div class="controls">
              <input type="textbox" id="rollno" name="rollno"/><span id="rollnoerror" class="hidden">Enter a valid rollno !</span>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <button type="submit" class="btn btn-primary" name="submit">Add to <? echo $_SESSION['hrloggedin']; ?> team
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
        <?
      }
    }
    else
    {
      ?>
        
      <br/>
      <br/>
      <br/>
      <br/>
      <center><span id="entryhead">Make an entry</span></center>
      
      <form class="form-horizontal" method="post" action="updateteam.php" id="entryform">

        <div class="control-group">
          <label class="control-label" for="rollno">Roll no</label>
          <div class="controls">
            <input type="textbox" id="rollno" name="rollno"/><span id="rollnoerror" class="hidden">Enter a valid rollno !</span>
          </div>
        </div>

        <div class="control-group">
          <div class="controls">
            <button type="submit" class="btn btn-primary" name="submit">Add to <? echo $_SESSION['hrloggedin']; ?> team
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
      <?
    }
    if(isset($_SESSION['updatesuccess']))
    {
      if($_SESSION['updatesuccess'] == 1)
      {
        $_SESSION['updatesuccess'] = 0;
        echo "<script type='text/javascript'>alert('Updated successfully');</script>";
      }
    }

    ?>
  </div>
  <?php
  if(isset($_SESSION['passchanged']))
    if($_SESSION['passchanged']==1)
    {
      echo "<script type='text/javascript'> alert('Password changed !'); </script>";
      $_SESSION['passchanged']=0;
    }
  ?>
  <?php include('sitelayout2.php'); include('footer.php'); ?>


</body>
</html>
