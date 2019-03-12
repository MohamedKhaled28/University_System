<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Interface1</title>
</head>

    <body>
           
<?php
//$cour = 12;
require_once 'Iassign_grade.php';
require_once 'DB.php';
//session_start();
$db=new DB();
class assign_classwork implements Iassign_grade {
    //$cour = $_SESSION['id'];
    
    function assign_grade ($cour){
        //$cour = $_SESSION['cour_id'];
   // echo $cour;
    //echo $_SESSION['cour_id'];
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
	//echo $qu;
        $St_ID=$db->Select($qu);
        while ($record = mysql_fetch_array($St_ID)){
            $q = "SELECT * FROM `student` WHERE `ID` = ".$record['St_ID'];
            $result=$db->Select($q);
            while ($row = mysql_fetch_array($result)){
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
        
         }
         
     }
        
        if(isset($_POST['submit'])){
            //$x=10;
            //echo $x;
            //echo $_SESSION['cour_id'];
            $qu="select St_ID from registered_courses where Course_ID=".$cour;
	    //echo $qu;
            $St_ID=$db->Select($qu);
            $grade=$_POST['grade'];
            $i=0;
            while ($record= mysql_fetch_array($St_ID)){
               // echo $grade[$i];
                $table="grades";
                $data=array('Classwork_grade'=>$grade[$i] , 'final_grade'=>0 , 'St_ID'=>$record['St_ID'] , 'Course_ID'=>$cour);
                $db->insert($table, $data);
                $i++;
            }
            
        }
        
?>
</body>
</html>