
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Schedule</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="navigation">
					<li>
						<a href="student_role.html">Home</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="editprofile.php">Profile</a>
					</li>
					<li class="menu">
						<a href="TEST.php">Register Courses</a>
					</li>
					<li class="selected">
						<a href="view_schedule.php">View Schedule</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
		<div class="header">
				<div class="contact">
					<h1>your Schedule</h1>
					<h2>view schedule here</h2>	
<?php
	
    require_once 'student_class.php';
    $student =new student();
	$student->view_schedule();
			

?>	


		</div>	
		</div>
		</div>
			
		
	
</body>

</html>