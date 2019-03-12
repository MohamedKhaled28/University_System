<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Doctor Class</title>
</head>

<body>
<?php
require_once 'DB.php';
require_once 'st_users class.php';
class doctor extends st_users {
function assign_final_grades ($cour) {

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
			$table="grades";
			$data=array('final_grade'=>$grade[$i]);
			//	$db->update($table, $data, "Course_ID", $cour);
			$q="update grades set final_grade =".$grade[$i]." where Course_id=".$cour." And ST_id=".$record['St_ID'];
			$db->updatee($q);
			$i++;
			$query="Select final_grade , Classwork_grade from grades where Course_ID=".$cour." and St_ID=".$record['St_ID'];
			$r=$db->Select($query);
			$row2= mysql_fetch_array($r);
			$total = $row2['final_grade']+$row2['Classwork_grade'];
			$s="select Code from student where ID=".$record['St_ID'];
			$res=$db->Select($s);
			$rec= mysql_fetch_array($res);
			$table2="result";
			$GPA=0.0;
			if ($total > 49){
				$data =array('ST_ID'=>$rec['Code'],'Course_ID'=>$cour,'status'=>'pass');
				$db->insert($table2, $data);
				if($total <60){
					$GPA=2.0;
				}
				elseif (59<$total && $total <65){
					$GPA=2.2;
				}
				elseif (64< $total && $total <70){
					$GPA=2.5;
				}
				elseif (69< $total && $total <75){
					$GPA=2.75;
				}
				elseif (74< $total && $total <80){
					$GPA=3.1;
				}
				elseif (79< $total && $total <85){
					$GPA=3.4;
				}
				elseif (84< $total && $total <90){
					$GPA=3.75;
				}
				elseif ($total >89){
					$GPA=4.0;
				}
			}
			elseif ($total < 50){
				$data =array('ST_ID'=>$rec['Code'],'Course_ID'=>$cour,'status'=>'fail');
				$db->insert($table2, $data);
				$GPA=1.0;
			}
			$que="update registered_courses set grade = ".$total." , GPA = ".$GPA." where Course_ID = ".$cour." And St_ID = ".$record['St_ID'];		
			$db->updatee($que);
		}
		
	}
}

} 
?>
</body>
</html>
