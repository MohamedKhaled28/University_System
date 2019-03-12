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
						<a href="Admin_role.php">Home</a>
					</li>
					<li>
						<a href="chose_course.php">Open Course</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="selected">
						<a href="Admin_role.php">Admin role</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="body">
			<div>
				<div class="contact">	
				<center>
<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once 'DB.php';
require_once 'admin_class.php';
$db= new DB();
session_start();
//require_once 'course.php';
/*mysql_connect("localhost" , "root" , "");
mysql_select_db("univ");*/

echo '<form method="post">';
echo '<table border="6" width="100%">';
    echo'<tr>
    		<td><font size ="2" color="red">Check</font></td>
     <td><font size ="2" color="red">COURSE</font></td>
          <td><font size ="2" color="red">doctor</font></td>
     <td><font size ="2" color="red">time</font></td>
     <td><font size ="2" color="red">num_stu</font></td>
     <td><font size ="2" color="red">symester</font></td>
     <td><font size ="2" color="red">year</font></td>
     
     </tr>';
    
    $sql="select * from oppend_course ";
    $result=  $db->Select($sql);
      //$row=mysql_fetch_array($result);
    // $cou_id = $row['course_id'];
    /* $sql2="select * from course where ID='$cou_id'";
   $result2=  mysql_query($sql2);
     $sql3="select * from stuff where Type_ID=2 ";
      $row2= mysql_fetch_array($result3);
    $result3=  mysql_query($sql3);*/
    $i=0;
    while($row=mysql_fetch_array($result)){
        $cou_id = $row['course_id'];
          $sql2="select * from course where ID='$cou_id'";
         $result2=  $db->Select($sql2);
         $row2=mysql_fetch_array($result2);
     $sql3="select * from stuff where Type_ID=1 ";
    $result3=  $db->Select($sql3);
     echo'<tr>
     		<td><input type="checkbox" name="courses[]" value='.$cou_id.'></td>
      <td><font color=#ffffff>'.$row2[Name].'</font></td><td><select name="select[]">';
             while ($row3= mysql_fetch_array($result3)){
         echo ' 
          <option value="'.$row3[ID].'" >'.$row3[Name].'</option>
        ';
             }
        echo
      ' </select></td><td><input type="text" size="15" name="time[]"> </td>
           
      <td><input type="text" size="15" name="num_stu[]"> </td>
          
        <td><select name="semeter[]">
          <option value="1">1</option>
          <option value="2">2</option>
       </select></td> 
        
       <td><input type="text" size="15" name="year[]"> </td>
       
      </tr>';
     $i++;
     }
        
     echo'<tr>
      <td colspan="4"><center><input type="submit" name="submit" value="submit"></center></td>
      </tr>';
    
    if(isset($_POST['submit'])){
         $time=$_POST['time'];
         $num_stu=$_POST['num_stu'];
         $symester=$_POST['semeter'];
         $year=$_POST['year'];
         $doc = $_POST['select'];
         $table="oppend_course";
         $where1="course_id";
         $course_id=$_POST['courses'];
         $i=0;
         foreach ($course_id as $where2){
         	$data=array('doctor_id'=>$doc[$i],'time'=>$time[$i],'num_student'=>$num_stu[$i],'symster'=>$symester[$i],'year'=>$year[$i]);
         	$db->update($table, $data, $where1, $where2);
         	$i++;
         }

         $obj=new admin();
         $obj->notify_observer();
  
        
         
     }

          
echo'</table>';
echo '</form>';

?>
				
		        </center>
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
