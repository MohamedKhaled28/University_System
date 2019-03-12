
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>student role</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" ></a>
				<ul id="navigation">
					<li>
						<a href="student_role.html">Home</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="notify.php">Notification</a>
					</li>
					<li class="selected">
						<a href="student_role.html">student role</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
		<div id="body">
			<div class="">
				<div class="contact">
				<center>
				<h2 style="color:deeppink; font-size:36px;">your available courses</h2></center>
				<br>
				<?php 
error_reporting (E_ALL ^ E_NOTICE);
require_once 'course_class.php';
$course1 = new course();
$res1 = $course1->dis_course();
$num_courses = mysql_num_rows($res1);
if ($num_courses >=6){
$msg .= "opps!! sorry you can't add any course again bacause you registerd 6 courses , and maximum for houres  = 18";
}
else if($num_courses < 6){
$course1->display();
}



?>

				 
				</div>
			</div>
		</div><br><br><br><br>

		
		<div id="">
			
			<div class="">
				<div>
				</div>
			</div>
		</div>
</body>
</html>