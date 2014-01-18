<?php
  session_start();
  include("connect.php");
  $srollno=$_POST['srollno'];
  $_SESSION['rollnonotentered'] = 0;
  $_SESSION['deletenoentry'] = 0;
  $_SESSION['deletesuccess'] = 0;
  if($srollno == '')
  {
    $_SESSION['rollnonotentered'] = 1;
    header("location:deleteentry.php");
  }
  else
  {
    $query1="SELECT * FROM `k14_tech_team`.`student_details` where rollno='$srollno';";
    $res1=mysqli_query($dbc,$query1);
    $count=mysqli_num_rows($res1);
    if($count == 0)
      $_SESSION['deletenoentry'] = 1;
    else
    {
      $query1="DELETE FROM `k14_tech_team`.`student_details` where rollno='$srollno';";      
      $_SESSION['deletesuccess'] = 1;
      $res1=mysqli_query($dbc,$query1);    
    }
    header("location:deleteentry.php");    
  }

?>