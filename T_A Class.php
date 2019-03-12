<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>T_A Class</title>
</head>

<body>
<?php
require_once 'st_users class.php';
require_once 'course_class.php';
class T_A extends st_users{
function assign_ClassWork_grade ($cour) {
	$db=new DB();
	echo '<form method="POST">';
	echo '<table border="4" style="margin-right: 100px">';
	echo'<tr>
     				<td><font size ="2" color="red">Code</font></td>
     				<td><font size ="2" color="red">Student Name</font></td>
     				<td><font size ="2" color="red">Level</font></td>
     				<td><font size ="2" color="red">grade</font></td>
     				</tr>';
	$qu="select St_ID from registered_courses where Course_ID=".$cour;
	echo $qu;
	$St_ID=$db->Select($qu);
	while ($record= mysql_fetch_array($St_ID)){
		$q="Select * from Student where ID=".$record['St_ID'];
		$result=$db->Select($q);
		while ($row=mysql_fetch_array($result)){
			echo"<tr>
			<td bgcolor=#FFFFFF>$row[Code]</td>
			<td bgcolor=#FFFFFF>$row[name]</td>
			<td bgcolor=#FFFFFF>$row[level]</td>
			<td bgcolor=#6633FF><input type='text' name='grade[]'></td>
			</tr>";
		}
	}
	echo"<tr>
			<td colspan=4><center><input type='submit' name='submit' value='Submit'></center></td>
			</tr>";
	if(isset($_POST['submit'])){
		$qu="select St_ID from registered_courses where Course_ID=".$cour;
		$St_ID=$db->Select($qu);
		$grade=$_POST['grade'];
		$i=0;
		echo $i;
		while ($record=mysql_fetch_array($St_ID)){
			echo $grade[$i];
			$table="grades";
			$data=array('Classwork_grade'=>$grade[$i],'final_grade'=>0,'St_ID'=>$record['St_ID'],'Course_ID'=>$cour);
			$db->insert($table, $data);
			$i++;
		}
	}
	
}
function choose_course(){
	$qu="SELECT stuff.name, course.Name, course.code ,course.ID
FROM stuff, course, oppend_course
WHERE course.ID = oppend_course.course_id
AND stuff.ID = oppend_course.doctor_id";
	$db=new DB();
	$result=$db->Select($qu);
	echo '<form method="POST">';
	echo '<table border="4" style="margin-right: 100px">';
	echo'<tr>
     				<td><font size ="2" color="red">Choose</font></td>
     				<td><font size ="2" color="red">Course Name</font></td>
     				<td><font size ="2" color="red">Doctir</font></td>
     				</tr>';
	while ($row=mysql_fetch_array($result)){
		echo"<tr>
		<td bgcolor=#6633FF><input type='checkbox' name='cour[]' value='$row[ID]'></td>
		<td bgcolor=#FFFFFF>$row[2]-$row[1]</td>
		<td bgcolor=#FFFFFF>$row[0]</td>
		</tr>";
	}
	echo"<tr>
	<td colspan=4><center><input type='submit' name='submit' value='Submit'></center></td>
			</tr>";
	if(isset($_POST['submit'])){
		$cour = $_POST['cour'];
		$table="ta_courses";
		$db->delete($table, "TA_id", $_SESSION['ID']);
		foreach ($cour as $value){
			$data =array('course_id'=>$value,'TA_id'=>$_SESSION['ID']);
			$db->insert($table, $data);
		}
	}
}
}
?>
</body>
</html>
