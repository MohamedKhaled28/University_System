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
error_reporting(E_ALL ^ E_NOTICE);

require_once 'DB.php';
 $db = new DB();

 $sql="select * from course";
    $result=  $db->Select($sql);
    if($result){
     echo '<form method="post">';
echo '<table width="100%  " border="3">';
    echo'<thead><tr>
     <th><font size ="2" color="red">ID</font></th>
     <th><font size ="2" color="red">COUSE</font></th>
     <th><font size ="2" color="red">CODE</font></th>
     </tr>
     </thead>
     '; 
    }
/*echo '<form method="post">';
echo '<table border="3">';
    echo'<tr>
     <td><font size ="2" color="black">COURSE</font></td>
     <td><font size ="2" color="black">CODE</font></td>
     <td><font size ="2" color="black">CHOOSE</font></td>
     </tr>';*/
    $i=0;
    while($row= mysql_fetch_array($result)){
     $ID=$row['ID'];
      $Name=$row['Name'];
      $Code=$row['Code'];
     
       
     echo'<tr>
      <td><font color=#ffffff>'.$ID.'</font></td>
      <td><font color=#ffffff>'.$Name.'</font></td>
       <td><font color=#ffffff>'.$Code.'</font></td>
      <td><input type="checkbox" name="cour[]" value='.$ID.'></td>  
       
      </tr>';
     $i++;
     }
        
     echo'<tr>
      <td colspan="4"><center><input type="submit" name="next" value="next"></center></td>
      </tr>';
   
     if(isset($_POST['next'])){
         $cou = $_POST['cour'];
         $table = "oppend_course";
          foreach($cou as $val){  
            echo $val;
            $datta = array ('course_id'=>$val,'doctor_id'=>'null','time'=>'null','Day_id'=>'null','num_student'=>'null','symster'=>'null','year'=>'null');
          //$obj=new DB;
         $db->insert($table,$datta);
    header("location:chose_doctor.php");
     }
    
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


