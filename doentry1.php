<?php
	session_start();

	include("connect.php");

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
	$qms=(isset($_POST['dqms']))?1:0;
	$contents=(isset($_POST['dcontents']))?1:0;
	$karnival=(isset($_POST['dkarnival']))?1:0;
	$xceed=(isset($_POST['dxceed']))?1:0;
	$projects=(isset($_POST['dprojects']))?1:0;
	$hr=(isset($_POST['dhr']))?1:0;
	$media=(isset($_POST['dmedia']))?1:0;
	
	$_SESSION['updatesuccess']=0;

	//set t-shirt provider
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
										{
											if($workshop == 1)
												$tshirt="Workshop";
											else
											{
												if($qms == 1)
													$tshirt="QMS";
												else
												{
													if($contents == 1)
														$tshirt = "Contents";
													else
													{
														if($karnival == 1)
															$tshirt = "Karnival";
														else
														{
															if($xceed == 1)
																$tshirt = "Xceed";
															else
															{
																if($projects == 1)
																	$tshirt = "Projects";
																else
																{
																	if($hr == 1)
																		$tshirt = "HR";
																	else
																	{
																		if($media == 1)
																			$tshirt = "Media";
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}


	$query3="DELETE FROM `k14_tech_team`.`student_details` where `rollno`='$rollno';";
	$res3=mysqli_query($dbc,$query3);
	$query2="INSERT INTO `k14_tech_team`.`student_details`(`name`,`rollno`,`course`,`dept`,`batch`,`year`,`design`,`events`,`finance`,`hospi`,`ir`,`lectures`,`logistics`,`marketing`,`tech`,`web`,`workshop`,`qms`, `contents`, `karnival`, `xceed`, `projects`, `hr`, `media`, `tshirtprovider`,`phone`,`mailid`,`fbusername`,`native`) VALUES ('$name','$rollno','$course','$dept','$batch',$year,$design,$events,$finance,$hospi,$ir,$lectures,$logistics,$marketing,$tech,$web,$workshop, $qms, $contents, $karnival, $xceed, $projects, $hr, $media,'$tshirt','$phone','$mailid','$fbusername','$native');";
	$res2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
	$_SESSION['updatesuccess']=1;
	header("location:index.php");
?>
	