<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Class</title>
</head>

<body>
<?php 
echo '<form method="POST">
        <center>
            <table>

                <tr>
                  <td><input type="submit" name="submit" value="Notify"></td>
                </tr>

            </table>

       </center>
     
    </form>';
require_once 'student_class.php';
require_once 'course_class.php';
require_once 'department_class.php';
require_once 'st_users class.php';
require_once 'I_subject_class.php';
require_once 'DB.php';
$obj_DB = new DB();
class admin extends st_users implements subject{
function register_observer () {
	$sql = "SELECT * from `student`;";
	$result = mysql_query($sql);
	return $result;
}

function remove_observer ( $observer ) {
	$obs = array_search($observer, $this->observers);
	obserers_pop($obs);
}

function notify_observer () {
	$res = $this->register_observer();
	 
	while ($row = mysql_fetch_array($res)){
		$stu = new student();
		//$_SESSION['Code']=$row['Code'];
		$stu->code=$row['Code'];
		//echo "$_SESSION[Code]";
		$stu->update();
	}
}
function add_new_student () {
$obj = new student();
$obj->add_student();
}
 function remove_student () {
 $obj = new student ();
 $obj -> delete_student ();
 }
 
function open_new_course(){
$obj = new course ();
$obj->open_course();
}

function register_new_course(){
$obj=new course ();
$obj->add_new_course();
}

function add_new_department (){
$obj = new department();
$obj->add_department();
}
function add_stuff() {
$db = new DB ();
$table = "stuff";
$q1= "select ID from department where Name = '$_POST[dept]'";
$res1 = $db->Select($q1);
$raw1= mysql_fetch_array($res1);
$q2 = "select ID from type where Type = '$_POST[type]'";
$res2=$db->Select($q2);
$raw2 = mysql_fetch_array($res2);
$q3 = "select * from gender where Gender = '$_POST[gender]'";
$res3 = $db->Select($q3);
$row3 = mysql_fetch_array($res3);
$data = array ('ID'=>'null','Name'=>$_POST['fullname'],'Mail'=>$_POST['email'],'Username'=>$_POST['username'],'password'=>$_POST['password'],'Address'=>$_POST['address'],'Gender_id'=>$row3['ID'],'Phone'=>$_POST['phone'], 'Dept_ID'=>$raw1['ID'],'Type_ID'=>$raw2['ID']);
$db->insert($table , $data );
}
}
/*if(isset($_POST['submit'])){
	$obj = new admin();
	//$obj->notify_observer ();
	$obj->notify_observer();
	 
}*/	
?>
</body>
</html>
