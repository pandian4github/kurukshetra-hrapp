<?php 
session_start(); 
if(!isset($_SESSION['hrloggedin']))
{
	header("location:login.php");
}
?>
<html>
<head>
<title>K! 13 Student details</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="show_student.css">
<script type="text/javascript">
function se(e1,e2)
{
	document.getElementById(e2).value=e1.options[e1.selectedIndex].value;
}
</script>
</head>
<body>
	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
			<?php
			$dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr') or die('Error in connecting');
			
			$srollno=$_POST['srollno'];
			$sphone=$_POST['sphone'];
			$smailid=$_POST['smailid'];
			
			if($srollno!='')
				$query1="SELECT * FROM `kuruk_hr`.`student_details` where rollno='$srollno';";
			else
				if($sphone!='')
					$query1="SELECT * FROM `kuruk_hr`.`student_details` where phone='$sphone';";
				else
					if($smailid!='')
						$query1="SELECT * FROM `kuruk_hr`.`student_details` where mailid='$smailid';";
					else
						header("location:searchstudent.php");
//			echo "<script> alert(\"".$query1."\");</script>";
			$res1=mysqli_query($dbc,$query1);
			$count=mysqli_num_rows($res1);
			$res1=mysqli_fetch_array($res1);
			if($count==1)
			{
				?>	

					<div id="studentdetails">Student details</div>
					<form id="displayform" method="post" action="doentry1.php" class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="dname">Name</label>
							<div class="controls">
								<input type="textbox" name="dname" id="dname" value="<?php echo $res1['name'] ?>">
								<div id="photo">
								<?php
								$username=$res1['fbusername'];
								$link="https://graph.facebook.com/".$username." /picture?type=large";
								echo "<img id='dp' src='".$link."' width='130' height='130' alt='PHOTO'/>";
								?>
								</div>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="drollno">Roll no</label>
							<div class="controls">
								<input type="textbox" name="drollno" id="drollno" value="<?echo $res1['rollno']?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dcourse">Course</label>
							<div class="controls">
								<input type="textbox" name="dcourse" id="dcourse" readonly="true" value="<?echo $res1['course']?>">
								<select name="dcourse1" class="span2" id="dcourse1" onchange="se(this,'dcourse')">
								<option value="B.E">B.E</option>
								<option value="B.E">M.E</option>
								<option value="B.E">M.Sc</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="ddept">Department</label>
							<div class="controls">
								<input type="textbox" name="ddept" size="12" id="ddept" readonly="true" value="<?echo $res1['dept']?>">
								<select name="ddept1" class="span2" id="dept1" onchange="se(this,'ddept')">
								<option value="ECE">ECE</option>
								<option value="CSE">CSE</option>
								<option value="Civil">Civil</option>
								<option value="Mech">Mech</option>
								<option value="EEE">EEE</option>
								<option value="Printing">Printing</option>
								<option value="Industrial">Industrial</option>
								<option value="IT">IT</option>
								<option value="Mining">Mining</option>
								<option value="Manufacturing">Manu</option>
								<option value="Agriculture">Agri</option>
								</select>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dbatch">Batch</label>
							<div class="controls">
								<input type="textbox" name="dbatch" size="1" id="dbatch" value="<?echo $res1['batch']?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dyear">Year of study</label>
							<div class="controls">
								<input type="textbox" name="dyear" id="dyear" size="1" readonly="true" value="<?echo $res1['year']?>">
								<select name="dyear1" class="span2" id="ydear1" onchange="se(this,'dyear')">
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
									<input type="checkbox" id="ddesign" name="ddesign" value="Design"/>Design
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="devents" name="devents" value="Events"/>Events
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dfinance" name="dfinance" value="Finance"/>Finance	
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dhospi" name="dhospi" value="Hospitality"/>Hospitality
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dir" name="dir" value="IR"/>IR
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dlectures" name="dlectures" value="Lectures"/>Lectures<br/>
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dlogistics" name="dlogistics" value="Logistics"/>Logistics
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dmarketing" name="dmarketing" value="Marketing"/>Marketing
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dtech" name="dtech" value="Tech"/>Tech
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dweb" name="dweb" value="Web"/>Web
								</label>
								<label class="checkbox inline">
									<input type="checkbox" id="dworkshop" name="dworkshop" value="Workshop"/>Workshop
								</label>
								<?php
								if($res1['design']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('ddesign'); x.checked=true; </script>";
								if($res1['events']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('devents'); x.checked=true; </script>";
								if($res1['finance']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dfinance'); x.checked=true; </script>";
								if($res1['hospi']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dhospi'); x.checked=true; </script>";
								if($res1['ir']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dir'); x.checked=true; </script>";
								if($res1['lectures']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dlectures'); x.checked=true; </script>";
								if($res1['logistics']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dlogistics'); x.checked=true; </script>";
								if($res1['marketing']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dmarketing'); x.checked=true; </script>";
								if($res1['tech']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dtech'); x.checked=true; </script>";
								if($res1['web']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dweb'); x.checked=true; </script>";
								if($res1['workshop']==1)
									echo "<script type='text/javascript'> var x; x=document.getElementById('dworkshop'); x.checked=true; </script>";
								?>	
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dphone">Phone</label>
							<div class="controls">
								<input type="textbox" name="dphone" id="dphone" size="10" value="<?echo $res1['phone']?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dmailid">Mail id</label>
							<div class="controls">
								<input type="textbox" name="dmailid" id="dmailid" size="30" value="<?echo $res1['mailid']?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dtshirt">T-shirt provider</label>
							<div class="controls">
								<input type="textbox" name="dtshirt" id="dtshirt" size="10" readonly="true" value="<?echo $res1['tshirtprovider']?>">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dfbusername">FB username</label>
							<div class="controls">
								<input type="textbox" id="dfbusername" name="dfbusername" value="<?echo $res1['fbusername']?>"/>
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="dnative">Nativity</label>
							<div class="controls">
								<input type="textbox" id="dnative" name="dnative" value="<?echo $res1['native']?>"/>
							</div>
						</div>
						
						<div class="form-actions">
							<button type="submit" class="btn btn-success">Save changes
							<button class="btn" onclick="gohome()">Cancel
						</div>
						
			<?php
			}
			else
			{
				header("location:searchstudent.php");
			}			
		?>

				
	</div>
	<?php include('sitelayout2.php'); ?>
	<br/>
</body>
</html>
