<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Open Course Page</title>
<style type="text/css">
.line_submit{
	text-align:center;
	
}
.su{
background-color:#003366;
	width:250px;
	font-style:italic;
	color:#FFFFFF;
	font-size:45px;
	margin-left:-5px;
}
fieldset {
border-style:dotted;
	border-radius:10px;
	width:30%;
	height:400px;
	margin-left:440px;
}body {
	margin: 0;
	padding: 0;
	position: relative;
	width: auto;
}
body #page {
	background: url(bg-home.jpg) no-repeat scroll center top #000000;
	margin: 0;
	overflow: hidden;
	width: auto;
	z-index: 3;
}
a {
	text-decoration: none;
	outline: none;
}
/*----------------------------------------header-styles---------------------------------------*/

#header div {
	margin: 0 auto;
	max-width: 940px;
	min-height: 100px;
	padding: 0 10px;
}
#header div a.logo {
	display: block;
	float: left;
	height: 60px;
	margin: 0 44px 0 0;
	padding: 0;
	width: 304px;
}
#header div a img {
	display: block;
	margin: 0;
	padding: 0;
	width: auto;
}
#header div ul {
	display: inline-block;
	float: left;
	list-style:none;
	margin: 0;
	padding: 0;
	width: auto;
}
#header div ul li {
	float:left;
	margin: 0;
	padding: 0;
	width: auto;
}
#header div ul li a {
	color: #ffffff;
	display: block;
	font-family: Arial;
	font-size: 18px;
	font-weight: normal;
	line-height: 59px;
	margin: 0;
	min-height: 60px;
	padding: 0 24px;
 *padding: 0 23px; /* Needed for IE8 and old versions */
	text-align:center;
	text-transform: uppercase;
	width: auto;
}
#header div ul li a:hover {
	background-color:  #620031;
	color: #ffffff;
}
#header div ul li.menu ul {
	display: block;
	left: -99999px;
	list-style: none;
	margin: 0;
	padding: 0;
	position: absolute;
	top: 60px;
	width: 142px;
	z-index: 50;
}


</style>
</head>

<body>
<div id="page">
		<div id="header">
			<div>
				<img src="logo.png" >
				<ul >
					<li class="selected">
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="add_student.php">Add Student</a>
						
					</li>
					<li>
						<a href="delete_student.php">Delete Student</a>
					</li>
					<li>
						<a href="open_course.php">Open New Course</a>
					</li>
					
				</ul>
            
			</div>
		</div>
	</div> <br/> <br/> <br/> <br/> <br/> <br/> <br/>

<fieldset>

<form method="post" action="">

<h1 align="center"><font color="#003366" size="+6"> Open New Course </font> </h1>

<label  ><strong><em>Name Of Course: </em></strong></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="text"   name="name" size="30px" style="height:25px;"  required="required"/><br/><br/>
<label ><strong><em>Code Of Course: </em></strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text"  name="code" size="30px" style="height:25px;"  /><br /><br />
<label ><strong><em>Num Of Hours: </em></strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number"  name="hour" style=" width:50px; height:25px;"  /><br /><br />
<label ><strong>Num Of Student: </strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="number"   name="number" style=" width:50px; height:25px;" /><br /><br /><br/><br/>
<div class="line_submit"><input class="su" type="submit" value="Submit"  name="submit"/></div>
</form>
</fieldset>
<?php
require_once 'class course.php';
error_reporting(E_ALL ^ E_NOTICE);
$didi= new course();
if(isset($_POST['submit']) ) {
if ( $_POST['name'] == "" || $_POST['code'] == "" || $_POST['hour'] == "" || $_POST['number'] == "" ){
echo "attention : all the form is required";
}
else { 
$didi->open_course () ;
if (mysql_errno() != 0 ){
echo mysql_errno().mysql_error();
}
}
}

?>

</body>

</html>
