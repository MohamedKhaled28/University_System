<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
				<ul id="navigation">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="">...</a>
					</li>
					<li class="menu">
						<a href="">...</a>
					</li>
					<li class="selected">
						<a href="login.html">Login</a>
					</li>
					<li class="menu">
						<a href="User_Help.php">heip</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1>Login</h1>
					<h2>DO NOT FORGET TO LOGIN </h2>
					<form method="post">
						<input type="text" name="username" value="User Name" onBlur="this.value=!this.value?'User Name':this.value;"  onClick="this.value='';">
						<input type="password" name="password" value="Password" onBlur="this.value=!this.value?'Password':this.value;"  onClick="this.value='';">
						
						<font color="#FFFFFF" size="+2"> student </font>
						<input type="radio" name="type" value="student" id="radio" checked >
						<font color="#FFFFFF" size="+2"> doctor </font>
                        <input type="radio" name="type" value="doctor" id="radio">
						<font color="#FFFFFF" size="+2"> teaching assistant </font>
                        <input type="radio" name="type" value="TAssistante" id="radio">
						<font color="#FFFFFF" size="+2"> academic advisor </font>
                        <input type="radio" name="type" value="Advisor" id="radio">
                        <font color="#FFFFFF" size="+2"> Admin </font>
                        <input type="radio" name="type" value="admin" id="radio">
					
						
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
		</div>
	
</body>
</html>                    
<?php
session_start();

require_once 'DB.php';
error_reporting(E_ALL ^ E_NOTICE);
$db=new DB();
if (isset($_POST['submit'])){
    if(empty($_POST['username']) && empty($_POST['password']) && empty($_POST['type'])){
        echo 'please enter all of information';
    }
    else{
       $name=$_POST['username'];
       $pass=$_POST['password'];
       $type=$_POST['type'];
       
       if($type=='admin'){
           $sql1 = mysql_query("SELECT  *  FROM admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
           echo $sql1;
           if($sql1){
               if(mysql_num_rows($sql1)>0){
                   while($row=  mysql_fetch_array($sql1)){
                       $_SESSION['ID']=$row['ID'];
                       $_SESSION['Name']=$row['Name'];
                       $_SESSION['Mail']=$row['Mail'];
                       $_SESSION['Username']=$row['Username'];
                       $_SESSION['Password']=$row['Password'];     
                   } 
                   header("location:Admin_role.php");
               }
           }
           else {
               echo mysql_errno().mysql_error();
           }
           
        echo 'welcom admin';
           
       }
       
       elseif ($type=='student') {
           $sql2= mysql_query("SELECT  *  FROM student WHERE code='$_POST[username]'  AND password='$_POST[password]'");
           $sql4=mysql_query("select Name from notification where id='1'");
            $row2=mysql_fetch_array(sql4);
           if($sql2){
               if(mysql_num_rows($sql2)>0){
                   while($row=  mysql_fetch_array($sql2)){
                       $_SESSION['ID']=$row['ID'];
                       $_SESSION['Code']=$row['Code'];
                       $_SESSION['name']=$row['name'];
                       $_SESSION['mail']=$row['mail'];
                       $_SESSION['Password']=$row['Password'];
                       $_SESSION['level']=$row['level'];
                       $_SESSION['Dept_id']=$row['Dept_id'];
                   }
                   header("location:student_role.html");
               }               
           }
           else {
               echo 'your user name or password is wrong';
           }
           
     }
     
     elseif ($type=='doctor'||$type=='TAssistante'||$type=='Advisor'){
         $sql3=  mysql_query("SELECT ID FROM type WHERE Type='$_POST[type]'");
         $row7 = mysql_fetch_array($sql3);
         $ID = $row7['ID'];
         $sql7=  mysql_query("select * from stuff where Username='$_POST[username]'and password='$_POST[password]'");
         if($sql7){
               if(mysql_num_rows($sql7)>0){
                   while($row=  mysql_fetch_array($sql7)){
                       $_SESSION['ID']=$row['ID'];
                       $_SESSION['Name']=$row['Name'];
                       $_SESSION['Mail']=$row['Mail'];
                       $_SESSION['Username']=$row['Username'];
                       $_SESSION['password']=$row['password'];
                       $_SESSION['Type_ID']=$row['Type_ID'];
                   }              
               		if($ID==1){
               			header("location:Doctor_Role.php");
               		}
               		elseif($ID==2){
               			header("location:TA_Role.php");
               		}
               		elseif($ID==3){
               			header("location:advisor_role.html");
               		}
               }
           }
         else {
            echo 'your user name or password is wrong';           
         }
     }
     
     
    }
    
}
?>
