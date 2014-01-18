<?php
	session_start();
	$dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr') or die('Error in connecting');

	$name=$_POST['dname'];
	$rollno=$_POST['drollno'];
	$course=$_POST['dcourse'];
	$dept=$_POST['ddept'];
	$batch=$_POST['dbatch'];
	$year=$_POST['dyear'];
	$phone=$_POST['dphone'];
	$mailid=$_POST['dmailid'];
	$fbusername=$_POST['dfbusername'];
	$native=$_POST['dnative'];
	
	$design=(isset($_POST['ddesign']))?1:0;
	$events=(isset($_POST['devents']))?1:0;
	$finance=(isset($_POST['dfinance']))?1:0;
	$hospi=(isset($_POST['dhospi']))?1:0;
	$ir=(isset($_POST['dir']))?1:0;
	$lectures=(isset($_POST['dlectures']))?1:0;
	$logistics=(isset($_POST['dlogistics']))?1:0;
	$marketing=(isset($_POST['dmarketing']))?1:0;
	$tech=(isset($_POST['dtech']))?1:0;
	$web=(isset($_POST['dweb']))?1:0;
	$workshop=(isset($_POST['dworkshop']))?1:0;
	
	$_SESSION['updatesuccess']=0;

	//set tshirt provider
	$tshirt="None";
	if($design==1)
		$tshirt="Design";
	else
	{
		if($events==1)
			$tshirt="Events";
		else
		{
			if($finance==1)
				$tshirt="Finance";
			else
			{
				if($hospi==1)
					$tshirt="Hospitality";
				else
				{
					if($ir==1)
						$tshirt="IR";
					else
					{
						if($lectures==1)
							$tshirt="Lectures";
						else
						{
							if($logistics==1)
								$tshirt="Logistics";
							else
							{
								if($marketing==1)
									$tshirt="Marketing";
								else
								{
									if($tech==1)
										$tshirt="Tech";
									else
									{
										if($web==1)
											$tshirt="Web";
										else
											$tshirt="Workshop";
									}
								}
							}
						}
					}
				}
			}
		}
	}
	$query3="DELETE FROM `kuruk_hr`.`student_details` where rollno='$rollno';";
	$res3=mysqli_query($dbc,$query3);
	$query2="INSERT INTO `kuruk_hr`.`student_details`(`name`,`rollno`,`course`,`dept`,`batch`,`year`,`design`,`events`,`finance`,`hospi`,`ir`,`lectures`,`logistics`,`marketing`,`tech`,`web`,`workshop`,`tshirtprovider`,`phone`,`mailid`,`fbusername`,`native`) VALUES ('$name','$rollno','$course','$dept','$batch',$year,$design,$events,$finance,$hospi,$ir,$lectures,$logistics,$marketing,$tech,$web,$workshop,'$tshirt','$phone','$mailid','$fbusername','$native');";
	$res2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
	$_SESSION['updatesuccess']=1;
	header("location:index.php");
?>
	