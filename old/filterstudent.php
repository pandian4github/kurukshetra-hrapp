<?php 
session_start(); 
if(!isset($_SESSION['hrloggedin']))
{
	header("location:login.php");
}
?>
<html>
<head>
<title>K! 13 Filter students</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="filterstudent.css">
</head>
<body>
	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<div id="searchstudentdetails">Filter students</div><br/>
		
		<form class="form-horizontal" id="searchform" method="post">
			<div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<input type="textbox" name="name"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="rollno">Roll no</label>
				<div class="controls">
					<input type="textbox" name="rollno"/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="course">Course</label>
				<div class="controls">
					<select name="course" class="span2">
					<option value="Any">Any</option>
					<option value="B.E">B.E</option>
					<option value="M.E">M.E</option>
					<option value="M.Sc">M.Sc</option>			
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="dept">Department</label>
				<div class="controls">
					<select name="dept" class="span2" id="dept">
					<option value="Any">Any</option>
					<option value="ECE">ECE</option>
					<option value="CSE">CSE</option>
					<option value="Civil">Civil</option>
					<option value="Mech">Mech</option>
					<option value="EEE">EEE</option>
					<option value="Printing">Printing</option>
					<option value="Industrial">Industrial</option>
					<option value="IT">IT</option>
					<option value="Mining">Mining</option>
					<option value="Manufacturing">Manufacturing</option>
					<option value="Agriculture">Agriculture</option>
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
					<option value="0">Any</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="phone">Phone</label>
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
				<div class="controls">
					<input type="submit" value="Search" name="Search" class="btn btn-primary">
				</div>
			</div>
		</form>

		<div id="searchresults">
		<div id="searchresult">
		Search result :
		</div>
		<?php
			if(isset($_POST['Search']))
			{
				$name=$_POST['name'];
				$rollno=$_POST['rollno'];
				$course=$_POST['course'];
				$dept=$_POST['dept'];
				$batch=$_POST['batch'];
				$year=$_POST['year'];
				$phone=$_POST['phone'];
				$mailid=$_POST['mailid'];
				$flag=0;
				$condition='';
				if($name!='')
				{
					if($flag==0)
					{
						$condition="name LIKE '%".$name."%'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND name LIKE '%".$name."%'";
					}
				}
				if($rollno!='')
				{
					if($flag==0)
					{
						$condition="rollno = '".$rollno."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND rollno = '".$rollno."'";
					}				
				}
				if($course!='Any')
				{
					if($flag==0)
					{
						$condition="course = '".$course."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND course = '".$course."'";
					}
				}
				
				if($dept!='Any')
				{
					if($flag==0)
					{
						$condition="dept = '".$dept."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND dept = '".$dept."'";
					}
				}

				if($batch!='')
				{
					if($flag==0)
					{
						$condition="batch = '".$batch."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND batch = '".$batch."'";
					}
				}

				if($year!=0)
				{
					if($flag==0)
					{
						$condition="year = ".$year;
						$flag=1;
					}
					else
					{
						$condition=$condition." AND year = ".$year;
					}
				}

				if($phone!='')
				{
					if($flag==0)
					{
						$condition="phone = '".$phone."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND phone = '".$phone."'";
					}
				}
				
				if($mailid!='')
				{
					if($flag==0)
					{
						$condition="mailid = '".$mailid."'";
						$flag=1;
					}
					else
					{
						$condition=$condition." AND mailid = '".$mailid."'";
					}
				}
				
			        $dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr') or die('Error in connecting');
		                $query="SELECT * FROM `kuruk_hr`.`student_details`";
				if($flag==0)
					$query=$query." ;";
				else
					$query=$query." WHERE ".$condition." ;";
				//echo "<script type='text/javascript'>alert(\"".$query."\");</script>";
				$res=mysqli_query($dbc,$query);
				$count=0;
				$count=mysqli_num_rows($res);
				if($count==0)
				{
					echo "<div id='noentriesfound'>No entries found ! </div>";
				}
				else
				{
					?>
					<table id="searchresulttable" border="1">
					<tr>
					<th>Name</th>
					<th>Roll no</th>
					<th>Course</th>
					<th>Department</th>
					<th>Batch</th>
					<th>Year</th>
					<th>Phone</th>
					<th>Mail id</th>
					</tr>
					
					
					<?php
					$arr=mysqli_fetch_array($res);
					while($arr)
					{
						echo "<tr>";
						echo "<td>".$arr['name']."</td>";
						echo "<td>".$arr['rollno']."</td>";
						echo "<td>".$arr['course']."</td>";
						echo "<td>".$arr['dept']."</td>";
						echo "<td>".$arr['batch']."</td>";
						echo "<td>".$arr['year']."</td>";
						echo "<td>".$arr['phone']."</td>";
						echo "<td>".$arr['mailid']."</td>";
						echo "</tr>";
						$arr=mysqli_fetch_array($res);
					}
					echo "</table>";
				}
					
			}
		?>
		</div>
	</div>
	<?php include('sitelayout2.php'); include('footer.php');  ?>
</body>
</html>
		