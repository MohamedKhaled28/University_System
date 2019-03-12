<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Interface1</title>
</head>

    <body>
        
    

<?php
require_once 'Iassign_grade.php';

class Assign_type {
    
    private $type_of_assign;
    
    public function __construct(Iassign_grade $type_of_Assign) {
        $this->type_of_assign = $type_of_Assign;
       
    }
    
    public function do_assign ($cour){
        
        return $this->type_of_assign->assign_grade($cour);
    }
    

    

    
}

?>
</body>
</html>