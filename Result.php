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
			<div>
				<div class="contact">
					<?php
					require_once 'result_class.php';
					require_once 'student_class.php';
					$student=new student();
					$tot_gpa = $student->Calculate_GPA($_SESSION['ID']);
					echo '<form method="POST">';
					echo '<table border="4" style="margin-right: 100px">';
					echo'<tr>
     				<td><font size ="2" color="red">Course</font></td>
     				<td><font size ="2" color="red">Grade</font></td>
     				<td><font size ="2" color="red">GPA</font></td>
					<td><font size ="2" color="red">Status</font></td>
     				</tr>';
					$table=$student->show_result();
					while ($row = mysql_fetch_array($table)){
						echo"<tr>
						<td bgcolor=#ffffff>$row[0]</td>
						<td bgcolor=#FFFFFF>$row[1]</td>
						<td bgcolor=#FFFFFF>$row[2]</td>
						<td bgcolor=#FFFFFF>$row[3]</td>
						0</tr>";
					}
					echo "<tr>
							<td colspan=2><font size ='2' color='red'>Total</font></td>
							<td colspan=2>".$tot_gpa."</td>
							</tr>";
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