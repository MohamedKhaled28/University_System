<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB_singletone
 *
 * @author AhmedMohsen
 */
class DB_singletone {
    private  $host="localhost";
    private  $username="root";
    private  $password="";
    private  $db_name="Univ";
    private  $connection;
    private static $instance=NULL;


    private function __construct() {
        $this->connection =self::set_connection();
    }
    
    private function set_connection(){
        $c= mysql_connect($this->host ,  $this->username, $this->password);
        mysql_select_db($this->db_name);
        //$c= new mysqli($host, $username, $password, $db_name);
        return $c;
    }
    
    public static function getInstance(){
        if (self::$instance==null){
            self::$instance=new DB_singletone();
            echo 'First object';
        }
        else{
            echo 'same object';
        }
        return self::$instance;
    } 
}

