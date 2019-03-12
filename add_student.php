<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Add Student</title>
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
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="#">Open course</a>
					</li>
					<li class="menu">
						<a href="add_student.php">Add Student</a>
					</li>
					<li class="selected">
						<a href="add_stuff.php">Add Staff</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1>Add Student</h1>
					<h2>add any user of Student here</h2>
					<form action="" method="post">
					    <input type="text" name="fullname" value="Full Name" onBlur="this.value=!this.value?'Full Name':this.value;"  onClick="this.value='';" >
						<input type="text" name="username" value="UserName" onBlur="this.value=!this.value?'UserName':this.value;"  onClick="this.value='';" >
						<input type="password" name="password" value="Password" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';" >
					
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
    
       <?php
	$msg = "";
require_once 'admin_class.php';
//$student =new student();
	echo $_SESSION['ID'];
	echo $_SESSION['Name'];
		if ( isset($_POST['sub'])){
		if ( $_POST['fullname'] == "" || $_POST['username'] == "" || $_POST['password'] == "") {
		echo "you are donkey!! fill all form.";
		}
		else {
		$mody = new admin();
		$mody -> add_new_student();
		}
		
		}

if(isset($_POST['logout'])){
    session_destroy();
    header("location:login.php");
}

?>
</body>
</html>