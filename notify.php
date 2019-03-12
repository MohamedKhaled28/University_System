
<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>student role</title>
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
						<a href="requests.html">Requests</a>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="body">
			<div class="header">
				<div class="contact">	
				<center>
<?php

session_start();
require_once 'DB.php';
echo '<form method="POST">';
echo '<center><table border="4">';

//echo $_SESSION['Code'];
$db=new DB();
$sql2 = "SELECT `notification_id` FROM `student` WHERE `Code` =".$_SESSION['Code'];
$result = $db->Select($sql2);
$row = mysql_fetch_array($result);
//echo $row['notification_id'];
if($row['notification_id']!= null){
$sql3 = "SELECT `Name` FROM `notification` WHERE `ID` = $row[notification_id];";
$result2 = $db->Select($sql3);
$row1 = mysql_fetch_array($result2);
        echo'
            <tr>
            <td><font size ="7" color="red">Message</font></td>
           
        </tr>
        ';
        
        
        echo"<tr>
         
         <td><font size ='7' color='red'>".$row1['Name']."</font></td>  
        </tr>";
}
else {
	echo "<font color=#ffffff>You havn`t notification</font>";
}             
    
echo'</table></center>';
echo '</form>';
?>
		        </center>
				</div>
			</div>
		</div>
		<div id="footer">
			
			<div class="footnote">
				<div>
					<p>&copy; 2023 BY NONAME TEAM | ALL RIGHTS RESERVED</p>
				</div>
			</div>
		</div>
</body>
</html>
