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
<script language="javascript" type="text/javascript" src="js/jquery.js"></script>
<script type='text/javascript'>
$(document).ready(function() {

  $(".checkboxx").change(function() {
    var flag = 0;
    var tosend="";

    if($('#ddesign').is(':checked'))
      tosend = "1";
    else
      tosend = "0";

    if($('#devents').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dfinance').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dhospi').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dir').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dlectures').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dlogistics').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dmarketing').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dtech').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dweb').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dworkshop').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dqms').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dcontents').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dkarnival').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dxceed').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dprojects').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dhr').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    if($('#dmedia').is(':checked'))
      tosend = tosend + "1";
    else
      tosend = tosend + "0";

    $('#actual-table').load("table.php?selected=" + tosend);

  });

});
</script>
</head>
<body>

<input type="checkbox" class="checkboxx" id="ddesign" name="ddesign" value="Design"/>Design
<input type="checkbox" class="checkboxx" id="devents" name="devents" value="Events"/>Events
<input type="checkbox" class="checkboxx" id="dfinance" name="dfinance" value="Finance"/>Finance  
<input type="checkbox" class="checkboxx" id="dhospi" name="dhospi" value="Hospitality"/>Hospitality
<input type="checkbox" class="checkboxx" id="dir" name="dir" value="IR"/>IR
<input type="checkbox" class="checkboxx" id="dlectures" name="dlectures" value="Lectures"/>Lectures<br/>
<input type="checkbox" class="checkboxx" id="dlogistics" name="dlogistics" value="Logistics"/>Logistics
<input type="checkbox" class="checkboxx" id="dmarketing" name="dmarketing" value="Marketing"/>Marketing
<input type="checkbox" class="checkboxx" id="dtech" name="dtech" value="Tech"/>Tech
<input type="checkbox" class="checkboxx" id="dweb" name="dweb" value="Web"/>Web
<input type="checkbox" class="checkboxx" id="dworkshop" name="dworkshop" value="Workshop"/>Workshop
<input type="checkbox" class="checkboxx" id="dqms" name="dqms" value="QMS"/>QMS
<input type="checkbox" class="checkboxx" id="dcontents" name="dcontents" value="Contents"/>Contents
<input type="checkbox" class="checkboxx" id="dkarnival" name="dkarnival" value="Karnival"/>Karnival
<input type="checkbox" class="checkboxx" id="dxceed" name="dxceed" value="Xceed"/>Xceed
<input type="checkbox" class="checkboxx" id="dprojects" name="dprojects" value="Projects"/>Projects
<input type="checkbox" class="checkboxx" id="dhr" name="dhr" value="HR"/>HR
<input type="checkbox" class="checkboxx" id="dmedia" name="dmedia" value="Media"/>Media

<div id="actual-table" class="actual-table">

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
    $query="SELECT * FROM `k14_tech_team`.`student_details` ORDER BY `course`,`year`,`dept`,`batch`,`tshirtprovider`;";
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
      if($res['qms']==1)
        if($flag==0)
        {
          $team=$team."QMS";
          $flag=1;
        }
        else
          $team=$team.",<br/>QMS";
      if($res['contents']==1)
        if($flag==0)
        {
          $team=$team."Contents";
          $flag=1;
        }
        else
          $team=$team.",<br/>Contents";
      if($res['karnival']==1)
        if($flag==0)
        {
          $team=$team."Karnival";
          $flag=1;
        }
        else
          $team=$team.",<br/>Karnival";
      if($res['xceed']==1)
        if($flag==0)
        {
          $team=$team."Xceed";
          $flag=1;
        }
        else
          $team=$team.",<br/>Xceed";
      if($res['projects']==1)
        if($flag==0)
        {
          $team=$team."Projects";
          $flag=1;
        }
        else
          $team=$team.",<br/>Projects";
      if($res['hr']==1)
        if($flag==0)
        {
          $team=$team."HR";
          $flag=1;
        }
        else
          $team=$team.",<br/>HR";
      if($res['media']==1)
        if($flag==0)
        {
          $team=$team."Media";
          $flag=1;
        }
        else
          $team=$team.",<br/>Media";
      
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

  </div>
</body>
</html>