<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register Courses</title>
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
		<div>
				<div class="contact" style="margin-right: 100px">
					<h1>Register Courses</h1>	
<?php
require_once 'course_class.php';
require_once 'DB.php';
require_once 'student_class.php';
$obj=new course();
$student=new student();
$db=new DB();
$db->Drop();
//$obj->get_courses();
echo '<form method="POST">';
echo '<table border="4" style="margin-right: 100px">';
echo'<tr>
     <td><font size ="2" color="red">Choose</font></td>
     <td><font size ="2" color="red">Course</font></td>
     <td><font size ="2" color="red">HOURS</font></td>
     <td><font size ="2" color="red">Doctor</font></td>
     <td><font size ="2" color="red">Time</font></td>
     </tr>';
      $obj->check_prerequsted();
      $q="select * from virtual";
      $result=$db->Select($q);
      while ($row=mysql_fetch_array($result)){
      echo"<tr>
      <td bgcolor=#6633FF><input type='checkbox' name='cour[]' value='$row[code]'></td>
      <td bgcolor=#FFFFFF>$row[code] - $row[course]</td>
      <td bgcolor=#FFFFFF>$row[hours]</td>
      <td bgcolor=#FFFFFF>$row[doctor]</td>
      <td bgcolor=#FFFFFF>$row[time]</td>
      </tr>";
      }
      echo'<tr>
      <td colspan="5"><center><input type="submit" name="submit" value="send"></center></td>
      </tr>';

      if(isset($_POST['submit'])){
         $student->register_course();
           
      }
echo '</table>';
echo '</form>'

?>
</div>	
		</div>
		</div>
			
		
	
</body>

</html>