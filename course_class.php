<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Course Class</title>
</head>

<body>
<?php
require_once 'DB.php';


class course {
private $name;
private $code;
private $credit_hour;
private $cour;

public function get_courses(){
    $db=new DB();
    $q="select * from oppend_course";
    $result=$db->Select($q);
    $row= mysql_fetch_array($result);
    return $result;
}

public function check_prerequsted(){
    $db=new DB();
    $db->create();
    $data;
    $table="virtual";
    $course=self::get_courses();
    while ($record=mysql_fetch_array($course)){
        //echo $record['course_id'];
        $q="select * from course where ID='$record[course_id]'";
        $result=$db->Select($q);
        //echo $result;
        $q2="select name from stuff where ID='$record[doctor_id]'";
        $result2=$db->Select($q2);
        $row2=mysql_fetch_array($result2);
        $row=mysql_fetch_array($result);
        //echo $row['required'];
        if ($row['required']!=null){
            $req=self::check_pass($row['required']);
            if ($req==1){
                $data=array('course'=>$row['Name'],'doctor'=>$row2['name'],'time'=>$record['time'],'hours'=>$row['Credit_hours'],'code'=>$row['Code']);
                $db->insert($table, $data);
                //self::Draw_table($row['Name'], $row2['Name'], $record['time'], $row['Credit_hours'], $row['Code']);
            }
        }
        else {
            $data=array('course'=>$row['Name'],'doctor'=>$row2['name'],'time'=>$record['time'],'hours'=>$row['Credit_hours'],'code'=>$row['Code']);
            $db->insert($table, $data);
            //self::Draw_table($row['Name'], $row2['Name'], $record['time'], $row['Credit_hours'], $row['Code']);
        }
    }
}

public function check_pass($id){
	//session_start();
    $db=new DB();
    $q="select * from result where Course_ID='$id' and ST_ID=$_SESSION[Code]";
    $result=$db->Select($q);
    if ($result){
        $row=mysql_fetch_array($result);
        if($row['Status']=="pass"){
            $Sta=1;
        }
        else {
            $Sta=0;
        }
    }
    else {
        $Sta=0;
    }
    return $Sta;
}

public function RegisterCourse(){
    //session_start();
    $db=new DB();
    $data;
    $table="registered_courses";
    $this->cour = $_POST['cour'];
    $db->delete($table, "St_ID", $_SESSION['ID']);
    foreach($this->cour as $val){
        $sql2 = "SELECT `ID` FROM `course` WHERE Code = '$val';";
        $res = mysql_query($sql2);
        $row2=  mysql_fetch_array($res);
        $data=array('ID'=>'null','ST_ID'=>$_SESSION['ID'],'Course_ID'=>$row2['ID']);
        $db->insert($table, $data);
        $db->Drop();
    }
}

function open_course () {

}

function add_course () {

}

function delete_course () {

}

function add_new_course () {

}
function dis_course(){
	session_start();
	$db = new DB();
	$id = $_SESSION['ID'];
	$q1 = "select * from registered_courses where St_ID = $id";
	$res1 = $db -> Select($q1);
	return $res1;
}



function check_request(){
	session_start();
	$id = $_SESSION['ID'];
	$db = new DB();
	$q4 = "select * from requestes where St_id = $id and Status=0 and Req_type_id=1";
	$res4 = $db->Select($q4);
	$count4 = mysql_num_rows($res4);
	return $count4;
}



function dis_open(){
	$db = new DB();
	$q2 = "select * from oppend_course where symster = 1 and year = 2016";
	$res2 = $db->Select($q2);
	return $res2;
}


function display()
{
	session_start();
	$db = new DB();
	$id = $_SESSION['ID'];
	$res2 = $this->dis_open();
	if($res2){
		echo ' <center><form method="post"><table border="1" width ="70%" cellpadding="0" style="font-size:24px;" >
            <thead >
                <tr bgcolor="#A3A3A3" >
					<th> </th>
<th > Course Name </th>
                   </tr>
            </thead>';
	}
	$i=0;
	while($row2 = mysql_fetch_array($res2)){
		$q3 = "select * from course where ID = $row2[course_id]";
		$res3 = $db->Select($q3);
		$row3 = mysql_fetch_array($res3);
		echo ' <tr>
      <td ><input type="checkbox" name="cour[]" value='.$row3['ID'].'></td>
                    <td bgcolor="#00000"><font color="deeppink">'.$row3['Name'].'</font></td>
					</tr>';
		$i++;
	}
	echo'<tr>
      <td colspan="4"><center><input  type="submit" name="add" value="Add" style=" font-size:24px; color:deeppink; background-color:#A3A3A3; width:100px; height:40px;"></center></td>
      </tr>';
	echo '</table></form></center>';
	if (isset($_POST['add'])){
		$this->Add_request();
	}
	return 1;
}

function Add_request(){
	session_start();
	$id = $_SESSION['ID'];
	$db = new DB();
	$q5 = "select ID from request_type where Name = '$_POST[add]'";
	$res5 = $db->Select($q5);
	$row5 = mysql_fetch_array($res5);
	$add = $_POST['cour'];
	$table ="requestes";
	$num_of_add = count($add);
	$count = $this->check_request();
	if($num_of_add >2){
		echo '<center>
<fieldset style="color:deeppink; font-size:36px; border:none;">opps! sorry you can add at most two courses.</fieldset>
</center>';
	}
	elseif ($count >= 2){
		echo "<center>
<fieldset style='color:deeppink; font-size:36px; border:none;'>opps!! sorry you can't send request, bacause you sent two requests later and num of available requests for you are two requests only.</fieldset></center>";
	}
	elseif ($count ==1 && $num_of_add == 2){
		echo "<center>
<fieldset style='color:deeppink; font-size:36px; border:none;'>opps!! sorry you can choose one course, bacause you sent one request later and num of available requests for you are two requests only.</fieldset></center>";
	}
	else{
		$q6 = "select * from registered_courses where St_ID =$id  ";
		$res6 =$db->Select($q6) ;
		$i=0;
		while($row6 =mysql_fetch_array($res6) ){
			$q7 = "select * from course where ID =$row6[Course_ID]";
			$res7 = $db->Select($q7);
			$row7 = mysql_fetch_array($res7);
			if ($add[$i] == $row6['Course_ID']){
				echo"<center>
<fieldset style='color:deeppink; font-size:36px; border:none;'>opps!! sorry you can't choose course ".$row7['Name'].", bacause you rejesterd it this symster.</fieldset></center>";
			}
			elseif ($add[$i] !== $row6['Course_ID']) {
				$datta = array ('Course_id'=>$add[$i],'St_id'=>$id,'Req_type_id'=>1,'Status'=>0);
				$db->insert($table,$datta);
				if(mysql_errno() == 0){

					echo"<center>
<fieldset style='color:deeppink; font-size:36px; border:none;'>your request have been sent successfully.</fieldset></center>";
				}
			}
			$i++;
		}
	}
}

////////////////////////////////////////////////////////////////////////////////////
///************************PART DROP***********************/////////////////////////////////
function check_request_drop(){
	session_start();
	$id = $_SESSION['ID'];
	$db = new DB();
	$q4 = "select * from requestes where St_id = $id and Status=0 and Req_type_id=2";
	$res4 = $db->Select($q4);
	$count4 = mysql_num_rows($res4);
	return $count4;
}

function dis_course_regist(){
	session_start();
	$db = new DB();
	$id = $_SESSION['ID'];
	echo 
	$q1 = "select * from registered_courses where St_ID = ".$id ;
	echo $q1;
	$res1 = $db -> Select($q1);
	return $res1;
}

function Display_form(){
	$db = new DB();
	$res1 = $this->dis_course_regist();
	if($res1){
		echo ' <center><form method="post"><table border="1" width ="70%" cellpadding="0" style="font-size:24px;" >
            <thead >
                <tr bgcolor="#A3A3A3" >
					<th> </th>
<th > Course Name </th>
                   </tr>
            </thead>';
	}
	$i=0;
	while($row1 = mysql_fetch_array($res1)){
		$q2 = "select * from course where ID = $row1[Course_ID]";
		$res2 = $db->Select($q2);
		$row2 = mysql_fetch_array($res2);
		echo ' <tr>
      <td ><input type="checkbox" name="cour[]" value='.$row2['ID'].'></td>
                    <td bgcolor="#00000"><font color="deeppink">'.$row2['Name'].'</font></td>
					</tr>';
		$i++;

	}
	echo'<tr>
      <td colspan="4"><center><input  type="submit" name="drop" value="Drop" style=" font-size:24px; color:deeppink; background-color:#A3A3A3; width:100px; height:40px;"></center></td>
      </tr>';
	echo '</table>/</form></center>';
	if (isset($_POST['drop']) ){
		$this->Drop_request();
	}
	return 1;
		
}

function Drop_request(){
	$db = new DB();
	$id = $_SESSION['ID'];
	$q3 = "select ID from request_type where Name = '$_POST[drop]'";
	$res3 = $db->Select($q3);
	$row3 = mysql_fetch_array($res3);
	$check =  $_POST['cour'];
	$table = "requestes";
	$num_of_check = count($check);
	if ($num_of_check >2){
		echo"<center> <fieldset style='color:deeppink; font-size:36px; border:none;'>opps! sorry you can drop at most two courses .</fieldset></center>";
	}else {
		$count = $this->check_request_drop();
		if ($count >= 2){
			echo" <center><fieldset style='color:deeppink; font-size:36px; border:none;'>opps!! sorry you can't send request, bacause you sent two requests later and num ofavailable requests for you are two requests only.</fieldset></center>";
		}elseif ($count ==1 && $num_of_check == 2){
			echo"<center> <fieldset style='color:deeppink; font-size:36px; border:none;'>opps!! sorry you can choose one course, bacause you sent request later and num of available requests for you are two requests.</fieldset></center>";
		}
		else{
			foreach($check as $val){
				$datta = array ('ID'=>'null','Course_ID'=>$val,'St_id'=>$id,'Req_type_id'=>$row3['ID'],'Status'=>0);
				$db->insert($table,$datta);
				echo"<center> <fieldset style='color:deeppink; font-size:36px; border:none;'>your request have been sent successfully.</fieldset></center>";
			}
		}
	}
}

}
?>
</body>
</html>
