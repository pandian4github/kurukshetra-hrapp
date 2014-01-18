<?php 
session_start(); 
if(!isset($_SESSION['hrloggedin']))
{
	header("location:login.php");
}
?>
<html>
<head>
<title>K! 13 Student Records</title>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-responsive.css">
<link rel="stylesheet" type="text/css" href="common.css">
<link rel="stylesheet" type="text/css" href="edit_student.css">

<script language="javascript" type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
tinyMCE.init({
theme : "advanced",
mode: "exact",
elements : "elm1",
theme_advanced_toolbar_location : "top",
theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
+ "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
+ "bullist,numlist,outdent,indent",
theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
+"undo,redo,cleanup,code,separator,sub,sup,charmap",
theme_advanced_buttons3 : "",
height:"350px",
width:"600px"
});
</script>

<script type="text/javascript">
tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    plugins : "autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,spellchecker,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,blockquote,pagebreak,|,insertfile,insertimage",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Skin options
    skin : "o2k7",
    skin_variant : "silver",

    // Example content CSS (should be your site CSS)
    content_css : "css/example.css",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "js/template_list.js",
    external_link_list_url : "js/link_list.js",
    external_image_list_url : "js/image_list.js",
    media_external_list_url : "js/media_list.js",

    // Replace values for the template plugin
    template_replace_values : {
            username : "Some User",
            staffid : "991234"
    }
});
</script>
</head>

<body>
	<?php include("sitelayout.php"); ?>
	<div class="span8" id="main-content">
		<br/>
		<?php
			$dbc=mysqli_connect('localhost','k13hr','k13hr','k13hrapps');
			
			$srollno=$_POST['srollno'];
			$sphone=$_POST['sphone'];
			$smailid=$_POST['smailid'];
			
			if($srollno!='')
				$query1="SELECT * FROM `k13hrapps`.`student_details` where rollno='$srollno';";
			else
				if($sphone!='')
					$query1="SELECT * FROM `k13hrapps`.`student_details` where phone='$sphone';";
				else
					if($smailid!='')
						$query1="SELECT * FROM `k13hrapps`.`student_details` where mailid='$smailid';";
					else
						header("location:evaluate.php");
//			echo "<script> alert(\"".$query1."\");</script>";
			$res1=mysqli_query($dbc,$query1);
			$count=mysqli_num_rows($res1);
			$res1=mysqli_fetch_array($res1);
			$srollno=$res1['rollno'];
			
			echo "<div id='studentdetails'>Student details</div>";
			if($count==1)
			{
				?>
					<div class="row-fluid">
						<div class="span8">
					<table id="displaytable" class="table table-bordered">
						<thead>
							<tr>
							<td>Name</td>
							<td><?php echo $res1['name'] ?></td>
							</tr>
						</thead>

						<tbody>
							<tr>
							<td>Roll no</td>
							<td><?echo $res1['rollno']?></td>
							</tr>
					
							<tr>
							<td>Class</td>
							<td><?echo $res1['course']." , ".$res1['dept']." , ".$res1['year']." year , ".$res1['batch']." Batch";?></td>
							</tr>
										
							<tr>
							<td>Phone</td>
							<td><?echo $res1['phone']?></td>
							</tr>
					
							<tr>
							<td>Mail id</td>
							<td><?echo $res1['mailid']?></td>
							</tr>
						</tbody>
					</table>
				</div>
					
					<div id="photo" class="span4">
						<br/><br/><br/>
					<?php
						$username=$res1['fbusername'];
						$link="https://graph.facebook.com/".$username." /picture?type=large";
						echo "<img id='dp' src='".$link."' width='130' height='130' alt='PHOTO'/>";
					?>
					</div>
				</div>
					
			<?php
			}
			else
			{
				//header("location:noentry.php");
				echo "<div id='noentryfound'>No entry found in database !</div>";
			}			
		?>
			
			<div id="txtareahead" >Student record</div>
			<form id="updateform" method="post" action="update.php">
				<fieldset>
				<input type="hidden" name="srollno" value="<?echo $srollno;?>"/><br/>
				<center>
				<textarea id="textarea" name='textarea' rows="40" cols="85">
				<?php
					$filename="records/".$srollno.".txt";
					if(file_exists($filename))
					{
						$file=file($filename);
						foreach($file as $text)
						{
							echo $text;
						}
					}
				?>				
				</textarea>
				</center>
				<button type="submit" class="btn btn-success" id="updatebutton">Update
				</fieldset>
			</form>
	</div>
	<?php include('sitelayout2.php');  include('footer.php');  ?>
</body>
</html>
