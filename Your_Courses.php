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
				</ul>
			</div>
		</div>
		
		<div id="body">
			<div>
				<div class="contact">	
					<?php
					session_start();
					require_once 'DB.php';
					$db=new DB();
					echo '<form method="POST">';
					echo '<table border="4" style="margin-right: 100px">';
					echo'<tr>
     				<td><font size ="2" color="red">Choose</font></td>
     				<td><font size ="2" color="red">Course</font></td>
     				<td><font size ="2" color="red">HOURS</font></td>
     				<td><font size ="2" color="red">TO Assign grades</font></td>
     				</tr>';
					if ($_SESSION['Type_ID']==1){
						$qu="select course_id from oppend_course where doctor_id=".$_SESSION['ID'];
					}
					elseif ($_SESSION['Type_ID']==2){
						$qu="Select course_id from ta_courses where TA_id=".$_SESSION['ID'];
					}
					echo $qu;
					$course_ID=$db->Select($qu);
					while ($record= mysql_fetch_array($course_ID)){
						$q="Select * from course where ID=".$record['course_id'];
						$result=$db->Select($q);
						while ($row=mysql_fetch_array($result)){
							echo"<tr>
							<td bgcolor=#6633FF><input type='radio' name='cour_ID' value='$row[ID]'></td>
							<td bgcolor=#FFFFFF>$row[Code] - $row[Name]</td>
							<td bgcolor=#FFFFFF>$row[Credit_hours]</td>
							<td><input type='submit' name='submit' value='Assign grades'></td>
							</tr>";
						}
						
					}
					if (isset($_POST['submit'])){
						$_SESSION['cour']=$_POST['cour_ID'];
						header ("location:Assigngrade.php");
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
