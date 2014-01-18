<?php
	session_start();
	$dbc=mysqli_connect('hrsql.kurukshetra.org.in','kweb_hr','GoOpenSource2013','kuruk_hr');

	$_SESSION['pname']=$name=$_POST['name'];
	$_SESSION['prollno']=$rollno=$_POST['rollno'];
	$_SESSION['pcourse']=$course=$_POST['course'];
	$_SESSION['pdept']=$dept=$_POST['dept'];
	$_SESSION['pbatch']=$batch=$_POST['batch'];
	$_SESSION['pyear']=$year=$_POST['year'];
	$_SESSION['pphone']=$phone=$_POST['phone'];
	$_SESSION['pmailid']=$mailid=$_POST['mailid'];
	$_SESSION['pfbusername']=$fbusername=$_POST['fbusername'];
	$_SESSION['native']=$native=$_POST['native'];
	
	$_SESSION['pdesign']=$design=(isset($_POST['design']))?1:0;
	$_SESSION['pevents']=$events=(isset($_POST['events']))?1:0;
	$_SESSION['pfinance']=$finance=(isset($_POST['finance']))?1:0;
	$_SESSION['phospi']=$hospi=(isset($_POST['hospi']))?1:0;
	$_SESSION['pir']=$ir=(isset($_POST['ir']))?1:0;
	$_SESSION['plectures']=$lectures=(isset($_POST['lectures']))?1:0;
	$_SESSION['plogistics']=$logistics=(isset($_POST['logistics']))?1:0;
	$_SESSION['pmarketing']=$marketing=(isset($_POST['marketing']))?1:0;
	$_SESSION['ptech']=$tech=(isset($_POST['tech']))?1:0;
	$_SESSION['pweb']=$web=(isset($_POST['web']))?1:0;
	$_SESSION['pworkshop']=$workshop=(isset($_POST['workshop']))?1:0;
	
	$_SESSION['entrysuccess']=0;
	$_SESSION['entryerror']=0;
	$_SESSION['nameerror']=0;
	$_SESSION['rollnoerror']=0;
	$_SESSION['phoneerror']=0;
	$_SESSION['mailiderror']=0;
	$_SESSION['batcherror']=0;
	
	$_SESSION['entryerror']=0;
	
	//validate name
	if($name=='')
		$_SESSION['nameerror']=1;
	
	//validate batch
	if($batch=='')
		$_SESSION['batcherror']=1;
		
	//validate rollno
	$query1="SELECT * FROM `kuruk_hr`.`student_details` where rollno='$rollno'";
	$res1=mysqli_query($dbc,$query1) or die(mysqli_error($dbc));
	$count=mysqli_num_rows($res1);
	if($count!=0)
		$_SESSION['rollnoerror']=1;
	
	// validate a phone number
	if( !preg_match("/^[7-9]{1}[0-9]{9}$/i", $phone) ) 
		$_SESSION['phoneerror']=1;
		
	// validate an email address
	if( !preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $mailid) ) 
		$_SESSION['mailiderror']=1;

	if($_SESSION['nameerror']==1 || $_SESSION['rollnoerror']==1 || $_SESSION['phoneerror']==1 || $_SESSION['mailiderror']==1 || $_SESSION['batcherror']==1)
		$_SESSION['entryerror']=1;
	
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
	if($_SESSION['entryerror']==0)
	{
		$query2="INSERT INTO `kuruk_hr`.`student_details`(`name`,`rollno`,`course`,`dept`,`batch`,`year`,`design`,`events`,`finance`,`hospi`,`ir`,`lectures`,`logistics`,`marketing`,`tech`,`web`,`workshop`,`tshirtprovider`,`phone`,`mailid`,`fbusername`,`native`) VALUES ('$name','$rollno','$course','$dept','$batch',$year,$design,$events,$finance,$hospi,$ir,$lectures,$logistics,$marketing,$tech,$web,$workshop,'$tshirt','$phone','$mailid','$fbusername','$native');";
		$res2=mysqli_query($dbc,$query2) or die(mysqli_error($dbc));
		$_SESSION['entrysuccess']=1;
		header("location:index.php");
	}
	else
		header("location:index.php");
?>
	