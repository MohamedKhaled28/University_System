<?php
require_once 'DB_singletone.php';
class DB {
    private $conn;
    public function __construct() {
      $conn = DB_singletone::getInstance();  
    }
            /*private function database_connect($database_host, $database_username, $database_password) {
        if($c = mysql_connect($database_host, $database_username, $database_password)){
            return $c;
            
        } else {
            
              
                die("Database connection error");
            
        }
    }*/
        public   function database_close() {
        if(!mysql_close($this->database_connection))die ("Connection close failed.");
           
    }
    /*
     private function database_select($database_name) {
        return mysql_select_db($database_name, $this->database_connection)
            or die("no db is selecteted");
    }
    public static function getInstance(){ 
        if(!self::$instance){
            self::$instance= new  self();
        }
        return self::$instance;
     }*/
    function clean($str) {
        //remove predifined characters and whitespaces
		$str = trim($str); // remove 
                /*Magic Quotes, generally speaking, is the process of escaping special characters with a '\' to allow a string to be entered into a database. This is considered 'magic' because PHP can do this automatically for you if you have magic_quotes_gpc turned on.

More specifically if magic_quotes_gpc is turned on for the copy of PHP you are using all Get, Post & Cookie variables (gpc, get it?) in PHP will already have special characters like ", ' and \ escaped so it is safe to put them directly into an SQL query.*/
		
                if(get_magic_quotes_gpc()) {
                    //remove all backslash
			$str = stripslashes($str);
		}
                //escape special character in string
		return mysql_real_escape_string($str);
	}
    function insert($table , $data){
         $q="INSERT INTO `$table` ";
    $v=''; $n='';

    foreach($data as $key=>$val){
        $n.="`$key`, ";
        if(strtolower($val)=='null') $v.="NULL, ";
        elseif(strtolower($val)=='now()') $v.="NOW(), ";
        else $v.= "'".$this->clean($val)."', ";
    }

    $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");";
    $result=  mysql_query($q);
    if($result){
       echo "Data inserted sucessfully";
    }
 else {
        echo 'Incorrect data';
    }

    }

    public function update($table, $data, $where1 ,$where2){
    $q="UPDATE `$table` SET ";
    foreach($data as $key=>$val){
        if(strtolower($val)=='null') $q.= "`$key` = NULL, ";
        elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), ";
        else $q.= "`$key`='".$this->clean($val)."', ";
    }
    $where3 ="`$where1`";
    $q = rtrim($q, ', ') . ' WHERE '.$where3."='".$where2."';";
    $result= mysql_query($q);
      if($result){
        echo 'done';
    }
 else {
        echo 'error';
        
 }
}
    public function delete($table,$where1,$where2){
        $q="DELETE FROM $table  WHERE $where1=$where2";
        $result=  mysql_query($q);
    if($result){
    header("location:./list.php");
    }
    }


}
?>
