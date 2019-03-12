<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>student role</title>
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" ></a>
				<ul id="navigation">
					<li>
						<a href="TA_Role.html">My Role</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="yourcourses.php">Your Courses</a>
					</li>
					<li class="menu">
						<a href="Choose_course.php">Choose Courses</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="body">
			<div class="header">
				<div class="contact">	
					<?php
					session_start();
					require_once 'T_A Class.php';
						$x=new T_A();
						$x->choose_course();
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


