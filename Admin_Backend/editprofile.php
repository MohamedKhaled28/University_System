
	<?php
	session_start();
		error_reporting(E_ALL ^ E_NOTICE);
		require_once 'student_class.php';
		require_once 'DB.php';
		$db = new DB();
		$query = "select * from student where Code = $_SESSION[Code]";
		$result = mysql_query($query);
		$row = mysql_fetch_array($result);
		$name = $row ['name'];
		$level = $row['level'];
		$gpa = $row['Final_gpa'];
		$query2 = "select * from department where ID = $row[Dept_id]";
		$result2 = mysql_query($query2);
		$row2 = mysql_fetch_array($result2);
		$dept = $row2['Name'];
		if ( isset($_POST['submit'])){
		$didi= new student ();
		$didi->edit_profile();
		
		}

		
		?>
<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Edit Profile</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="navigation">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="">....</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="selected">
						<a href="edit_profile.php">Edit Profile</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1 style="color:#A3A3A3;">Edit Profile</h1>
					<h2 style="color:#A3A3A3;">Edit your data here</h2><br><br><br><br><br>
					<form action="" method="post">
<font  style=" color:deeppink; font-size:25px;"><label>Name:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</font><label style="color:deeppink;"><?php  echo $name?> </label><br><br>
<font  style=" color:deeppink; font-size:25px;"><label>User Code:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><label style="color:deeppink;"><?php  echo $row['Code']?> </label><br><br>
<font  style=" color:deeppink; font-size:25px;"><label>Level:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</font><label style="color:deeppink;"><?php  echo $level;?> </label><br><br>						
<font  style=" color:deeppink; font-size:25px;"><label>Department:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><label style="color:deeppink;"><?php  echo $dept;?> </label><br><br>
<font  style=" color:deeppink; font-size:25px;"><label>Gpa:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><label style="color:deeppink;"><?php  echo $gpa?> </label><br><br>
<br><br>
<input type="text" name="email" value="<?php echo $row['mail'] ?>" onBlur="this.value=!this.value?'Email':this.value;"  onClick="this.value='';">
<input type="password" name="password" value="<?php echo $row['Password'] ?>" onBlur="this.value=!this.value?'Password':this.value;" onClick="this.value='';">
<input type="text" name="address" value="<?php echo $row['Address'] ?>" onBlur="this.value=!this.value?'Password':this.value;" onClick="this.value='';">
<input type="num" name="phone" value="<?php echo $row['Phone'] ?>" onBlur="this.value=!this.value?'Password':this.value;" onClick="this.value='';">
	<input type="submit" value="SUBMIT" id="submit" name="submit">
					</form>
				</div>
			</div>
		</div>
		<div id="footer">
			
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY NONAME TEAM | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div></div><br/><br/><br/><br/><br/><br/><br/>
	
</body>
</html>