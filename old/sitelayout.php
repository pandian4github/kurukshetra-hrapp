<div class="row-fluid" id="toprow">
	<div class="span3"><center><img src="images/unesco.png"></center></div>
	<div class="span6"><center><img src="images/kuruk.png" id="kuruk"></center></div>
	<div class="span3"><center><img src="images/ceg.png" id="ceg"></center></div>
</div>
	<br/>
<div class="row-fluid">
	<div class="span2 offset2" id="changepass"><br/>	
	<?php
	if(isset($_SESSION['hrloggedin']))
		echo "<a href='changepass.php'>Change password</a>";
	?>
	</div>
	<div class="span4" id="main-head"><center><h2> K! 13 HR app </h1><center> </div>
	<div class="span1 offset1" id="logout"><br/>	
	<?php
	if(isset($_SESSION['hrloggedin']))
			echo "<a href='logout.php'>Logout</a>";
	?>
	</div>
</div>


<div class="row-fluid">
	<div class="span2" id="leftsidebar">	
		<ul class="nav nav-pills nav-stacked">
			<li><a href="index.php">Make an entry</a></li><hr>
			<li><a href="searchstudent.php">View student details</a></li><hr>
			<li><a href="viewdetails.php" target="_blank">View database</a></li><hr>
			<li><a href="evaluate.php">Evaluate student</a></li><hr>
			<li><a href="filterstudent.php">Filter students</a></li>
		</ul>
	</div>

