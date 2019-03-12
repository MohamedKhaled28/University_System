
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>advisor role</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" ></a>
				<ul id="navigation">
					<li>
						<a href="student_role.html">Home</a>
					</li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="notify.php">Notification</a>
					</li>
					<li class="selected">
						<a href="student_role.html">student role</a>
					</li>
				</ul>
			</div>
		</div>
		</div>
		<div id="body">
			<div class="">
				<div class="contact">
				<center>
				<h2 style="color:deeppink; font-size:36px;">Dropped Requests</h2>
				</center>
				<br><br><br><br><br><br><br><br>
               <center>
				<fieldset style="color:deeppink; font-size:36px; border:none;">
				<?php
				error_reporting(E_ALL ^ E_NOTICE);
				require_once 'advisor_class.php';
				$adv = new advisor();
				$adv->Display();
				
				
				?> 
				</fieldset>
				</center>
				</div>
			</div>
		</div><br><br><br><br>
		

		
		<div id="">
			
			<div class="">
				<div>
				</div>
			</div>
		</div>
</body>

</html>