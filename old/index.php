<?php 
session_start(); 
if(!isset($_SESSION['hrloggedin']))
{
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>K! 13 HR App</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="index.css">
<link rel="stylesheet" type="text/css" href="common.css">

<script type="text/javascript">
function showerror(i)
{
	var error=["nameerror","rollnoerror","phoneerror","mailiderror","batcherror"];
	var x=document.getElementById(error[i]);
	x.className="visible";
}
</script>
</head>
<body>

	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<center><span id="entryhead">Make an entry</span></center>
		<form class="form-horizontal" method="post" action="doentry.php" id="entryform">
			<div class="control-group">
				<label class="control-label" for="name">Name</label>
				<div class="controls">
					<input type="textbox" id="name" name="name"/><span id="nameerror" class="hidden">Enter a valid name !</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="rollno">Roll no</label>
				<div class="controls">
					<input type="textbox" id="rollno" name="rollno"/><span id="rollnoerror" class="hidden">Enter a valid rollno !</span>
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
				<option value="Manufacturing">Manufacturing</option>
				<option value="Agriculture">Agriculture</option>
				</select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="batch">Batch</label>
				<div class="controls">
					<input type="textbox" id="batch" name="batch" size="2"/><span id="batcherror" class="hidden">Enter a valid batch !</span>
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
				<label class="control-label">Teams working in</label>
				<div class="controls">
				<label class="checkbox inline">
					<input type="checkbox" id="design" name="design" value="Design"/>Design
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="events" name="events" value="Events"/>Events
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="finance" name="finance" value="Finance"/>Finance	
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="hospi" name="hospi" value="Hospitality"/>Hospitality
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="ir" name="ir" value="IR"/>IR
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="lectures" name="lectures" value="Lectures"/>Lectures
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="logistics" name="logistics" value="Logistics"/>Logistics
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="marketing" name="marketing" value="Marketing"/>Marketing
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="tech" name="tech" value="Tech"/>Tech
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="web" name="web" value="Web"/>Web
				</label>	
				<label class="checkbox inline">
					<input type="checkbox" id="workshop" name="workshop" value="Workshop"/>Workshop
				</label>	
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="phone">Phone no</label>
				<div class="controls">
					<input type="textbox" id="phone" name="phone"/><span class="hidden" id="phoneerror">Enter a phone number !</span>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="mailid">Email id</label>
				<div class="controls">
					<input type="textbox" id="mailid" name="mailid"/><span class="hidden" id="mailiderror">Enter a email id !</span>
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

	</div>
	<?php include('sitelayout2.php'); include('footer.php'); ?>
	<?php
	if(isset($_SESSION['passchanged']))
		if($_SESSION['passchanged']==1)
		{
			echo "<script type='text/javascript'> alert('Password changed !'); </script>";
			$_SESSION['passchanged']=0;
		}
	if(isset($_SESSION['updatesuccess']))
		if($_SESSION['updatesuccess']==1)
		{
			echo "<script type='text/javascript'> alert('Updated successfully !'); </script>";
			$_SESSION['updatesuccess']=0;
		}
	if(isset($_SESSION['entrysuccess']))
		if($_SESSION['entrysuccess']==1)
		{
			echo "<script type='text/javascript'> alert('Entry successful'); </script>";
			$_SESSION['entrysuccess']=0;
		}
	if(isset($_SESSION['entryerror']))
		if($_SESSION['entryerror']==1)
		{
			if($_SESSION['nameerror']==1)
				echo "<script type='text/javascript'> showerror(0);</script>";
			else
				echo "<script type='text/javascript'> var x; x=document.getElementById('name'); x.value=\"".$_SESSION['pname']."\"; </script>";

			if($_SESSION['rollnoerror']==1)
				echo "<script type='text/javascript'> showerror(1);</script>";
			else
				echo "<script type='text/javascript'> var x; x=document.getElementById('rollno'); x.value=\"".$_SESSION['prollno']."\"; </script>";
			
			echo "<script type='text/javascript'> var x; x=document.getElementById('course'); x.value=\"".$_SESSION['pcourse']."\"; </script>";
			echo "<script type='text/javascript'> var x; x=document.getElementById('dept'); x.value=\"".$_SESSION['pdept']."\"; </script>";

			if($_SESSION['batcherror']==1)
				echo "<script type='text/javascript'> showerror(4);</script>";
			else
				echo "<script type='text/javascript'> var x; x=document.getElementById('batch'); x.value=\"".$_SESSION['pbatch']."\"; </script>";
				
			echo "<script type='text/javascript'> var x; x=document.getElementById('year'); x.value=\"".$_SESSION['pyear']."\"; </script>";
			
			if($_SESSION['pdesign']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('design'); x.checked=true; </script>";
				
			if($_SESSION['pevents']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('events'); x.checked=true; </script>";
				
			if($_SESSION['pfinance']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('finance'); x.checked=true; </script>";
				
			if($_SESSION['phospi']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('hospi'); x.checked=true; </script>";
				
			if($_SESSION['pir']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('ir'); x.checked=true; </script>";
				
			if($_SESSION['plectures']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('lectures'); x.checked=true; </script>";
				
			if($_SESSION['plogistics']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('logistics'); x.checked=true; </script>";
				
			if($_SESSION['pmarketing']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('marketing'); x.checked=true; </script>";
				
			if($_SESSION['ptech']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('tech'); x.checked=true; </script>";
				
			if($_SESSION['pweb']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('web'); x.checked=true; </script>";
				
			if($_SESSION['pworkshop']==1)
				echo "<script type='text/javascript'> var x; x=document.getElementById('workshop'); x.checked=true; </script>";
			
			if($_SESSION['phoneerror']==1)
				echo "<script type='text/javascript'> showerror(2);</script>";
			else
				echo "<script type='text/javascript'> var x; x=document.getElementById('phone'); x.value=\"".$_SESSION['pphone']."\"; </script>";

			if($_SESSION['mailiderror']==1)
				echo "<script type='text/javascript'> showerror(3);</script>";
			else
				echo "<script type='text/javascript'> var x; x=document.getElementById('mailid'); x.value=\"".$_SESSION['pmailid']."\"; </script>";
			
			echo "<script type='text/javascript'> var x; x=document.getElementById('fbusername'); x.value=\"".$_SESSION['pfbusername']."\"; </script>";
			
			echo "<script type='text/javascript'>var x; x=document.getElementById('native'); x.value=\"".$_SESSION['native']."\";</script>";
			
			$_SESSION['entryerror']=0;
		}
				
		?>
</body>
</html>
