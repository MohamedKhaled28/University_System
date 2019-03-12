<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Interface1</title>
</head>

    <body>
        
        <form method="post">
            <center>           
                <table>               
                    <tr>                  
                        <td><input type="radio" name="type" value="TA">TA</input></td>
                        
                    </tr>
                    <tr>                  
                        <td><input type="radio" name="type" value="doctor">Doctor</input></td>
                        
                    </tr>
                    <tr>                  
                        <td><input type="submit" name="submit1" value="submit"></td>
                        
                    </tr>
                </table>
            </center>     
        </form>
<?php
$cour = 12;
//session_start();
//$_SESSION['cour_id']=$cour;
//require_once 'T_A_class.php';
//require_once 'doctor_class.php'; 
require_once 'assign_final.php';
require_once 'assign_classwork.php';
require_once 'Assign_type.php';

   if(isset($_POST['submit1'])){
       
       if($_POST['type'] == 'TA'){
           $obj = new assign_classwork();         
           $ASS = new Assign_type($obj);
           $ASS->do_assign($cour);
           //$obj->assign_grade($cour);               
       }
       
       elseif($_POST['type'] == 'doctor'){
           $obj2 = new assign_final();
           $ASS = new Assign_type($obj2); 
           $ASS->do_assign($cour);
           //$obj2->assign_grade($cour);
       }
       
   }



?>
</body>
</html>