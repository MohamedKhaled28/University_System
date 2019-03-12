<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" ></a>
				<ul id="navigation">
					<li>
						<a href="Doctor_Role.html">Home</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="Your_Course.php">Your Courses</a>
					</li>
					<li class="menu">
						<a href="student_role.html">student role</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="body">
			<div>
				<div class="contact">	
					<?php
					session_start();
					require_once 'doctor_class.php';
					require_once 'T_A Class.php';
					if($_SESSION['Type_ID']== 1){
						$x=new doctor();
						$x->assign_final_grades($_SESSION['cour']);
					}
					elseif ($_SESSION['Type_ID']==2){
						$y=new T_A();
						$y->assign_ClassWork_grade($_SESSION['cour']);
					}
					?>
				</div>
			</div>
		</div>
		<div id="footer">
			
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY NONAME TEAM | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div>
</body>
</html>
