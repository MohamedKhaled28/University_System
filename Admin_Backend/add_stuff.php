<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Stuff</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" ></a>
				<ul id="navigation">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="selected">
						<a href="add_staff.html">Add Stuff</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1>Add Stuff</h1>
					<h2>add any user of Stuff here</h2>
					<form action="" method="post">
<input type="text" name="fullname" value="Full Name" onBlur="this.value=!this.value?'Full Name':this.value;"  onClick="this.value='';" >
<input type="email" name="email" value="name@yahoo.com" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
<input type="text" name="username" value="UserName" onBlur="this.value=!this.value?'UserName':this.value;"  onClick="this.value='';" >
<input type="password" name="password" value="Password" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
<input type="text" name="address" value="Address" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
<input type="text" name="gender" value="Gender" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
<input type="num" name="phone" value="Phone" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
<input type="text" name="dept" value="department" onBlur="this.value=!this.value?'department':this.value;"  onClick="this.value='';" >
<font color="#FFFFFF" size="+2"> Type : </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<select name="type">
						<option>....</option> 
						<option value="doctor" > Doctor </option>
						<option value="advisor"> Advisor </option>
						<option value="t_a"> T_A </option>
						</select><br/><br/><br/>
						<input type="submit" value="SUBMIT" id="submit" name="sub">
					</form>
				</div>
			</div>
		</div>
		<div id="footer">
			
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY NONAME TEAM | ALL RIGHTS RESERVED </p>
					
				</div>
			</div>
		</div>
		</div><br/><br/><br/><br/><br/>
<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once 'admin_class.php';
		if ( isset($_POST['sub'])){
		if ( $_POST['fullname'] == "" || $_POST['email'] == "" || $_POST['username'] == "" || $_POST['password'] == "" || $_POST['type'] == "" ) {
		echo "you are donkey!! fill all form.";
		}
		else {
		 $mody = new admin();
		$mody -> add_stuff();
		}
		
		}
		
		
		
		
?>
</body>
</html>