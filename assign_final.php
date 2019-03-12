<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Interface1</title>
</head>

    <body>
        
<?php

require_once 'Iassign_grade.php';
require_once 'DB.php';
$db=new DB();
class assign_final implements Iassign_grade {
    
    function assign_grade($cour) {
        //echo $cour;
        $db=new DB();
        
        echo '<form method="post">';
        echo '<table border="4" style="margin-right: 100px">';
        echo'<tr>
     				<td><font size ="2" color="red">Code</font></td>
     				<td><font size ="2" color="red">Student Name</font></td>
     				<td><font size ="2" color="red">Level</font></td>
     				<td><font size ="2" color="red">grade</font></td>
     				</tr>';
        $qu="select St_ID from `registered_courses` where Course_ID =".$cour;
        $St_ID=$db->Select($qu);
        
        while ($record= mysql_fetch_array($St_ID)){
            $q="select * from `student` where ID = ".$record['St_ID'];
            $result = $db->Select($q);
            while ($row=  mysql_fetch_array($result)){
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
          echo $cour;
          $q="select St_ID from `registered_courses` where Course_ID = ".$cour;
          $St_ID=$db->Select($q);
          $grade=$_POST['grade'];
          $i=0;
          while ($record= mysql_fetch_array($St_ID)){
              $table="grades";
              $data=array('final_grade'=>$grade[$i]);
              $q="update grades set final_grade =".$grade[$i]." where Course_ID=".$cour." And St_ID=".$record['St_ID'];
	      $db->updatee($q);
              $i++;
                          
              //$query = "select `Classwork_grade`,`final_grade` from `grades` where Course_ID=".$cour."AND St_ID=".$record['St_ID'];
              $query = "select * from `grades` where Course_ID=".$cour."AND St_ID=".$record['St_ID'];
              $r = $db->Select($query);
              $row = mysql_fetch_array($r);
              
              $total = $row['Classwork_grade'] + $row['final_grade'];
              
              $que = "update `registered_courses` set Grade = ".$total."where Course_ID = ".$cour."AND St_ID = ".$record['St_ID'];
              $db->updatee($que);
              
              $s = "select Code from `student` where ID=".$record['St_ID'];
              $res=$db->Select($s);
              $rec = mysql_fetch_array($res);
              $table2="result";
              
              if($total>=50){
                  $data = array('St_ID'=>$rec['Code'] , 'Course_ID'=>$cour , 'Status'=>'pass');
                  $db->insert($table2, $data);
              }
              elseif ($total<50) {
                  $data = array('St_ID'=>$rec['Code'] , 'Course_ID'=>$cour , 'Status'=>'fail');
                  $db->insert($table2, $data);
              
              }
                                               
          }
                 
      }
        
?>
</body>
</html>