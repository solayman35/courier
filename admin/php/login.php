<?php

include '../database/connection.php';
class AdminLogin
{
   
    private $db;
    
    public function __construct() {
        $this->db=new MySQLi(db_host, db_user,db_password, db_name);
        $this->db->query("SET CHARACTER SET utf8");
      

         if(mysqli_connect_errno()){
           echo "Could Not Connect to Database".  mysql_errno();
           exit();
       
     }
    }
    
    
    public function adminLogin($email,$password) {
       echo $query="SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    
}
