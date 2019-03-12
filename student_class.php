<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Class</title>
</head>

<body>
<?php
echo '<form method="POST">
        <center>
            <table>

                <tr>
                  <td><input type="submit" name="submit2" value="Mail"></td>
                </tr>

            </table>

       </center>
     
    </form>';
//require_once 'result_class.php';
//require_once 'course_class.php';
//require_once 'department_class.php';
//require_once 'l_observer_class.php';
require_once 'DB.php';
require_once 'result_class.php';
require_once 'course_class.php';
require_once 'users_class.php';
require_once  'I_observer_class.php';
require_once 'department_class.php';
session_start();
class student extends users implements observer {
function update () {
	$db=new DB();
	$sql="update student set notification_id=1";
	$db->updatee($sql);
	$sql2 = "SELECT `notification_id` FROM `student` WHERE `Code` = $this->code ;";
	$result = $db->Select($sql2);
	$row = mysql_fetch_array($result);
	//echo $row['notification_id'];
	$sql3 = "SELECT `Name` FROM `notification` WHERE `ID` = $row[notification_id];";
	$result2 = $db->Select($sql3);
	$row1 = mysql_fetch_array($result2);
	$_SESSION['notify']=$row1['Name'];

}

function add_student () {
    $db = new DB ();
    $username=$_POST['username'];
    $name=$_POST['fullname'];
    $pass=$_POST['password'];
    $table = "student";
    $data = array ('ID'=>'null','Code'=>$username,'Name'=>$name,'Mail'=>'null','password'=>$pass,'Level'=>'1', 'Dept_ID'=>'Null');
    $db->insert($table , $data );
    return true;
}
public function display(){

	header("location:notify.php");

}
/*
function delete_student () {

}
*/
function register_course () {
$obj = new course();
$obj->RegisterCourse();
return 1;
}/*
function drop_course () {
$obj = new course();
$obj->delete_course();
}*/
function Calculate_GPA($st_id){
	$db=new DB();
	$q= "select sum(GPA),count(course_id) from registered_courses where St_ID=".$st_id;
	$result=$db->Select($q);
	$row = mysql_fetch_array($result);
	echo $row[1]*3;
	$tot_GPA= ($row[0]*3)/($row[1]*3);
	return $tot_GPA;
}
function show_result () {
$obj=new result();
$res=$obj->view_result($_SESSION['ID'],$_SESSION['Code']);
return $res;
}

function edit_profile(){
$db = new DB();
$table = "student";
$data = array('mail'=>$_POST['email'],'password'=>$_POST['password'],'Address'=>$_POST['address'],'Phone'=>$_POST['phone']);
$where1 = "Code";
$where2 = $_SESSION['Code'];
$db-> update ($table,$data,$where1,$where2);
return true;

}
function view_schedule () {
    $db= new DB();
    $query="select Course_ID FROM  registered_courses WHERE St_ID = $_SESSION[ID] ";
    $result= $db->Select($query);
    
    if( $result ){
        echo ' <center><table border="1" width="70%" cellpadding="0" >
            <thead >
                <tr bgcolor="#A3A3A3" >
                    <th> Course Name </th>
                    <th> Time </th>
					
					<th> Doctor Name</th>
                   </tr>
            </thead></center>';
        	
    
    
    }
    $i=0;
    while($row=  mysql_fetch_array($result) ){
        $query2="select Name FROM course WHERE ID = '$row[Course_ID]' ";
        $result2 = $db->Select($query2);
        $row2=  mysql_fetch_array($result2);
        	
        $query3="select time,doctor_id FROM oppend_course WHERE course_id	 = '$row[Course_ID]' ";
        $result3 = $db->Select($query3);
        $row3=  mysql_fetch_array($result3);
        	
        $query5="select Name FROM stuff WHERE ID = '$row3[doctor_id]' ";
        $result5 = $db->Select($query5);
        $row5=  mysql_fetch_array($result5);
        	
        $Name=$row2['Name'];
        $time=$row3['time'];
        //$day=$row3['day'];
        $name=$row5['Name'];
        echo ' <tr>
                    <td bgcolor="#6633FF"><font color="#000000">'.$Name.'</font></td>
					<td bgcolor="#6633FF"><font color="#000000">'.$time.'</font></td>
					
					<td bgcolor="#6633FF"><font color="#000000">'.$name.'</font></td>
					</tr>';
        $i++;
    }
    return true;
}

}
if(isset($_POST['submit2'])){
	$obj = new student();
	//$obj->notify_observer ();
	$obj->update();
	$obj->display();
}
?>
</body>
</html>
