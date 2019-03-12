<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
require_once 'DB.php';
require_once 'st_users class.php';
//require_once 'st_users_class.php';
class advisor extends st_users {
function process_request(){

}
function limit_courses (){

}

/////////////////// PART A CHECK L DROP REQUESTS **************************************////////////////////////////
function get_requests(){
$q1 = "select * from requestes where Req_type_id = 2 and Status =0 ";
$db = new DB();
$res1 = $db->Select($q1);
return $res1;
}



function Display(){
$db = new DB();
$res1 =$this-> get_requests();
if($res1 ){
echo ' <center><form method="post"><table border="1"  cellpadding="0" style="font-size:24px;" >
            <thead >
                <tr bgcolor="#A3A3A3" >
					<th>Student Name </th>
					<th > Student ID </th>					
                    <th > Course Name </th>
					<th > Request Type </th>
					<th > GPA </th>
					<th > Credit_hour </th>
					<th > Total_credit</th>
					<th>Accept</th>
					<th>Reject</th>
				<th > </th>										
                   </tr>
            </thead>';
			}

$i=0;
while($row1 = mysql_fetch_array($res1)){
$q2 = "select * from student where ID = $row1[St_id]";
$res2 =$db->Select($q2);
$row2 = mysql_fetch_array($res2);
$q3 = "select * from course where ID = $row1[Course_id]";
$res3 = $db->Select($q3);
$row3 = mysql_fetch_array($res3);
$q4 = "select * from request_type where ID = $row1[Req_type_id]";
$res4 = $db->Select($q4);
$row4 = mysql_fetch_array($res4);
$q5 = "select * from registered_courses where St_id = $row1[St_id]";
$res5 = $db->Select($q5);
$row5 = mysql_num_rows($res5);
$num_hourse = $row5 * 3;
$q6 = "select * from result where ST_ID = $row2[Code] and Status = 'pass'";
$res6 = $db->Select($q6);
$row6 = mysql_num_rows($res6);
$total_hourse = $row6 * 3;
echo ' <tr>
                    <td bgcolor="#00000"><font color="deeppink">'.$row2['name'].'</font></td>
					 <td bgcolor="#00000"><font color="deeppink">'.$row2['Code'].'</font></td>
					  <td bgcolor="#00000"><font color="deeppink">'.$row3['Name'].'</font></td>	
					   <td bgcolor="#00000"><font color="deeppink">'.$row4['Name'].'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$row2['Final_gpa'].'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$num_hourse.'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$total_hourse.'</font></td>
					   <td><input type="checkbox" name="accept[]" value='.$row2['Code'],$row3['ID'].'</td>
					   <td><input type="checkbox" name="reject[]" value='.$row2['Code'],$row3['ID'].'></td></tr>';
$i++;
}
echo '<tr>
      <td colspan="9"><center><input  type="submit" name="submit" value="Submit" style=" font-size:24px; color:deeppink; background-color:#A3A3A3; width:100px; height:40px;"></center></td>
      </tr>';
echo '</table></form></center>';
if (isset($_POST['submit'])){
if (isset($_POST['accept'])){
 $this->accept();

}
}

if (isset($_POST['submit'])){
if (isset($_POST['reject'])){
$this->reject();
}
}
/*if(mysql_errno() == 0){
return 1;
}else {
return 0;*/
}






function accept(){
$db = new DB();
$acc = $_POST['accept'];
foreach($acc as $item){
$id = $item[0].$item[1].$item[2].$item[3].$item[4].$item[5].$item[6].$item[7];
$q7 = "select * from student where Code =$id";
$res7 = $db->Select($q7);
$row7 = mysql_fetch_array($res7);
$cou = $item[8].$item[9];
$data = array('ID'=>'null','Course_id'=>$cou,'St_id'=>$row7['ID'],'Advisor_id'=>12);
$table = "droped_courses";
$db->insert($table , $data);
$q8= "select * from droped_courses where St_id =$row7[ID] and Course_id =$cou ";
$res8 = $db->Select($q8);
$row8 = mysql_fetch_array($res8);
$q9 = "delete from registered_courses where St_ID = $row8[St_id] and Course_ID = $row8[Course_id]";
$db->Select($q9);
$q10 = "update requestes set Status= 1 where Course_id = $row8[Course_id] and St_id = $row8[St_id]";
$db->Select($q10);
if(mysql_errno() == 0){
return 1;
}else {
return 0;
}
}
}




function reject(){
$db = new DB();
$rej = $_POST['reject'];
foreach($rej as $item){
$id = $item[0].$item[1].$item[2].$item[3].$item[4].$item[5].$item[6].$item[7];
$cou = $item[8].$item[9];
$q11 = "select * from student where Code =$id";
$res11 = $db->Select($q11);
$row11 = mysql_fetch_array($res11);
$q12 = "delete from requestes where Course_id=$cou and St_id=$row11[ID] ";
$db->Select($q12);
if(mysql_errno() == 0){
return 1;
}else {
return 0;
}
}
}
////////******************** PADR L ADD REQUESTS ****************************////////////////////////////////////
function get_requests_add(){
$q1 = "select * from requestes where Req_type_id = 1 and Status =0 ";
$db = new DB();
$res1 = $db->Select($q1);
return $res1;
}



function Display_add(){
$db = new DB();
$res1 = $this->get_requests_add();
if($res1 ){
echo ' <center><form method="post"><table border="1"  cellpadding="0" style="font-size:24px;" >
            <thead >
                <tr bgcolor="#A3A3A3" >
					<th>Student Name </th>
					<th > Student ID </th>					
                    <th > Course Name </th>
					<th > Request Type </th>
					<th > GPA </th>
					<th > Credit_hour </th>
					<th > Total_credit</th>
					<th>Accept</th>
					<th>Reject</th>
				<th > </th>										
                   </tr>
            </thead>';
			}

$i=0;
while($row1 = mysql_fetch_array($res1)){
$q2 = "select * from student where ID = $row1[St_id]";
$res2 =$db->Select($q2);
$row2 = mysql_fetch_array($res2);
$q3 = "select * from course where ID = $row1[Course_id]";
$res3 = $db->Select($q3);
$row3 = mysql_fetch_array($res3);
$q4 = "select * from request_type where ID = $row1[Req_type_id]";
$res4 = $db->Select($q4);
$row4 = mysql_fetch_array($res4);
$q5 = "select * from registered_courses where St_id = $row1[St_id]";
$res5 = $db->Select($q5);
$row5 = mysql_num_rows($res5);
$num_hourse = $row5 * 3;
$q6 = "select * from result where ST_ID = $row2[Code] and Status = 'pass'";
$res6 = $db->Select($q6);
$row6 = mysql_num_rows($res6);
$total_hourse = $row6 * 3;
echo ' <tr>
                    <td bgcolor="#00000"><font color="deeppink">'.$row2['name'].'</font></td>
					 <td bgcolor="#00000"><font color="deeppink">'.$row2['Code'].'</font></td>
					  <td bgcolor="#00000"><font color="deeppink">'.$row3['Name'].'</font></td>	
					   <td bgcolor="#00000"><font color="deeppink">'.$row4['Name'].'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$row2['Final_gpa'].'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$num_hourse.'</font></td>
					   <td bgcolor="#00000"><font color="deeppink">'.$total_hourse.'</font></td>
					   <td><input type="checkbox" name="accept[]" value='.$row2['Code'],$row3['ID'].'</td>
					   <td><input type="checkbox" name="reject[]" value='.$row2['Code'],$row3['ID'].'></td></tr>';
$i++;
}
echo '<tr>
      <td colspan="9"><center><input  type="submit" name="submit" value="Submit" style=" font-size:24px; color:deeppink; background-color:#A3A3A3; width:100px; height:40px;"></center></td>
      </tr>';
echo '</table></form></center>';
if (isset($_POST['submit'])){
if (isset($_POST['accept'])){
$this->accept_add();

}
}

if (isset($_POST['submit'])){
if (isset($_POST['reject'])){
$this->reject_add();
}
}
return 1;
}






function accept_add(){
$db = new DB();
$acc = $_POST['accept'];
foreach($acc as $item){
$id = $item[0].$item[1].$item[2].$item[3].$item[4].$item[5].$item[6].$item[7];
$q7 = "select * from student where Code =$id";
$res7 = $db->Select($q7);
$row7 = mysql_fetch_array($res7);
$cou = $item[8].$item[9];
$data = array('ID'=>'null','St_ID'=>$row7['ID'],'Course_ID'=>$cou,'Grade'=>'null');
$table = "registered_courses";
$db->insert($table , $data);
$q7 = "update requestes set Status= 1 where Course_id = $cou and St_id = $row7[ID]";
$db->Select($q7);
return 1;
/*if(mysql_errno() == 0){
echo "done";
}else {
echo mysql_error();
}*/
}
}




function reject_add(){
$db = new DB();
$rej = $_POST['reject'];
foreach($rej as $item){
$id = $item[0].$item[1].$item[2].$item[3].$item[4].$item[5].$item[6].$item[7];
$cou = $item[8].$item[9];
$q8 = "select * from student where Code =$id";
$res8 = $db->Select($q8);
$row8 = mysql_fetch_array($res8);
$q9 = "delete from requestes where Course_id=$cou and St_id=$row8[ID] ";
$db->Select($q9);
return 1;
}
}




}
?>
</body>
</html>
