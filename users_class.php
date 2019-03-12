<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Users Class</title>
</head>

<body>
<?php
class users {
    protected $ID;
    protected $name;
    protected $password;
    protected $mail;
    protected $gender;
	protected $code;
	
	function setid($id){
        $this->ID= $id;
    }
    function getid(){
        return $this->ID;
    }
    function setname($name){
    $this->name =$name;
    }
    function getname(){
        return $this->name;
    }
        
    
        function setpassword($password){
        $this->password =$password;
    }
    function getpassword(){
        return $this->password;
    }
      
    function setmail($mail){
        $this->mail =$mail;
    }
    function getmail(){
        return $this->mail;
    }
    function setgender($gender){
        $this->gender=$gender;
    }
    function getgender(){
        return $this->gender;
    }
	function  setcode($code) {
	$this->code = $code;
	}
	function getcode(){
	return $this->code;
	}
	public function login ($username, $password){
	
	
	}
}
?>
</body>
</html>
