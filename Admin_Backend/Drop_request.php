
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
		
		<div id="body">
			<div class="">
				<div class="contact">
				<center>
				<h2 style="color:deeppink; font-size:36px;">your registered courses</h2></center>
				<br><br><br><br><br><br><br><br>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'course_class.php';
$course1 = new course();
$res1 = $course1->dis_course_regist();
$num_courses = mysql_num_rows($res1);

if ($num_courses == 8  ){
$msg .= "opps!! sorry you can't drop any course bacause you registerd 3 courses , and minimum for credit houres  = 9";
}
else {
$count = $course1->check_request_drop();
if ($count > 2 ){
$msg .= "opps!! sorry you dropped two courses  , and maximum for available  only 2 ";
}else {
$course1->Display_form();
}
}


?>
               <center>
				<fieldset style="color:deeppink; font-size:36px; border:none;"><?php echo $msg; ?> </fieldset>
				</center>
				</div>
			</div>
		</div><br><br><br><br>
		

		
		<div id="footer">
			
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY NONAME TEAM | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div>
</body>
</html>