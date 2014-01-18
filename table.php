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
<title>HR Database</title>
<link rel="stylesheet" type="text/css" href="viewdetails.css">
</head>
<body>


  <table id="viewdetails" border="1">
  <tr>
  <th>Sl No.</th>
  <th>Name</th>
  <th>Roll no</th>
  <th>Course</th>
  <th>Department</th>
  <th>Batch</th>
  <th>Year</th>
  <th>Teams working in</th>
  <th>Phone</th>
  <th>Mail id</th>
  <th>T-shirt provider</th>
  <th>FB username</th>
  <th>Nativity</th>
  </tr>
  <?php

    include("connect.php");
    $selected = $_GET['selected'];
    $flag = 0;
    $condition="";
    $arr = array('design', 'events', 'finance', 'hospi' ,'ir', 'lectures', 'logistics', 'marketing', 'tech', 'web', 'workshop', 'qms', 'contents', 'karnival', 'xceed', 'projects', 'hr', 'media');

    for($i = 0; $i < 18; $i++) {
      if($selected[$i] == 1)
      {
        if($flag == 0)
        {
          $condition = $arr[$i]." = 1";
          $flag = 1;
        }
        else
          $condition = $condition." OR ".$arr[$i]." = 1";
      }
    }
    if($flag == 1)
      $query="SELECT * FROM `k14_tech_team`.`student_details` where ".$condition." ORDER BY `course`,`year`,`dept`,`batch`,`tshirtprovider`;";
    else
      $query="SELECT * FROM `k14_tech_team`.`student_details` ORDER BY `course`,`year`,`dept`,`batch`,`tshirtprovider`;";
    $_SESSION['checkboxcondition'] = ' ';
  //echo "<script type='text/javascript'> alert(".$query.");</script>";
  //  echo $query;
    $res1=mysqli_query($dbc,$query);
    $res=mysqli_fetch_array($res1);
    $count=1;
    while($res)
    {
      echo "<tr>";
      echo "<td>".$count."</td>";
      echo "<td>".$res['name']."</td>";
      echo "<td>".$res['rollno']."</td>";
      echo "<td>".$res['course']."</td>";
      echo "<td>".$res['dept']."</td>";
      echo "<td>".$res['batch']."</td>";
      echo "<td>".$res['year']."</td>";
      $team="";
      $flag=0;
      if($res['design']==1)
        if($flag==0)
        {
          $team=$team."Design";
          $flag=1;
        }
        else
          $team=$team.",<br/>Design";
      if($res['events']==1)
        if($flag==0)
        {
          $team=$team."Events";
          $flag=1;
        }
        else
          $team=$team.",<br/>Events";
      if($res['finance']==1)
        if($flag==0)
        {
          $team=$team."Finance";
          $flag=1;
        }
        else
          $team=$team.",<br/>Finance";
      if($res['hospi']==1)
        if($flag==0)
        {
          $team=$team."Hospitality";
          $flag=1;
        }
        else
          $team=$team.",<br/>Hospitality";
      if($res['ir']==1)
        if($flag==0)
        {
          $team=$team."IR";
          $flag=1;
        }
        else
          $team=$team.",<br/>IR";
      if($res['lectures']==1)
        if($flag==0)
        {
          $team=$team."Lectures";
          $flag=1;
        }
        else
          $team=$team.",<br/>Lectures";
      if($res['logistics']==1)
        if($flag==0)
        {
          $team=$team."Logistics";
          $flag=1;
        }
        else
          $team=$team.",<br/>Logistics";
      if($res['marketing']==1)
        if($flag==0)
        {
          $team=$team."Marketing";
          $flag=1;
        }
        else
          $team=$team.",<br/>Marketing";
      if($res['tech']==1)
        if($flag==0)
        {
          $team=$team."Tech";
          $flag=1;
        }
        else
          $team=$team.",<br/>Tech";
      if($res['web']==1)
        if($flag==0)
        {
          $team=$team."Web";
          $flag=1;
        }
        else
          $team=$team.",<br/>Web";
      if($res['workshop']==1)
        if($flag==0)
        {
          $team=$team."Workshop";
          $flag=1;
        }
        else
          $team=$team.",<br/>Workshop";
      echo "<td>".$team."</td>";
      echo "<td>".$res['phone']."</td>";
      echo "<td>".$res['mailid']."</td>";
      echo "<td>".$res['tshirtprovider']."</td>";
      echo "<td>".$res['fbusername']."</td>";
      echo "<td>".$res['native']."</td>";
      echo "</tr>";
      $count=$count+1;
      $res=mysqli_fetch_array($res1);
    }
  
  ?>
  </table>


</body>
</html>