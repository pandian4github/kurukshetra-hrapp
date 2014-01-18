<?php
	session_start();

	include("connect.php");

	$name=$_POST['name'];
	$rollno=$_POST['rollno'];
	$course=$_POST['course'];
	$dept=$_POST['dept'];
	$batch=$_POST['batch'];
	$year=$_POST['year'];
	$phone=$_POST['phone'];
	$mailid=$_POST['mailid'];
	$fbusername=$_POST['fbusername'];
	$native=$_POST['native'];
	

	$query2="UPDATE `k14_tech_team`.`student_details` set `name` = '$name', `rollno` = '$rollno',`course` = '$course',`dept` = '$dept',`batch` = '$batch',`year` = '$year',`phone` = '$phone',`mailid` = '$mailid',`fbusername` = '$fbusername',`native` = '$native' where `rollno` = '$rollno';";
	$res2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));

	$query = "SELECT * from `k14_tech_team`.`student_details` where `rollno` = '$rollno';";
	$res = mysqli_query($dbc, $query);
	$res = mysqli_fetch_array($res);

	$design = $res['design'];
	$events = $res['events'];
	$finance = $res['finance'];
	$hospi = $res['hospi'];
	$ir = $res['ir'];
	$lectures = $res['lectures'];
	$logistics = $res['logistics'];
	$marketing = $res['marketing'];
	$tech = $res['tech'];
	$web = $res['web'];
	$workshop = $res['workshop'];
	$qms = $res['qms'];
	$contents = $res['contents'];
	$karnival = $res['karnival'];
	$xceed = $res['xceed'];
	$projects = $res['projects'];
	$hr = $res['hr'];
	$media = $res['media'];


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

	$query3="UPDATE `k14_tech_team`.`student_details` set `tshirtprovider` = '$tshirt' where `rollno` = '$rollno';";
	$res2=mysqli_query($dbc,$query3) or die(mysqli_error($dbc));

	$_SESSION['updatesuccess']=1;
	header("location:index2.php");
?>
	