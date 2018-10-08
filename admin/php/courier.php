<?php


class Admin
{
   
    private $db;
    
    public function __construct() {
        $this->db=new MySQLi("localhost", "root","", "courier");
        $this->db->query("SET CHARACTER SET utf8");
      

         if(mysqli_connect_errno()){
           echo "Could Not Connect to Database".  mysql_errno();
           exit();
       
     }
    }
    
    public function Login($name,$password) {
        $query="SELECT * FROM admin WHERE email='$name' AND password='$password'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    


    public function saveDistrict($name) {
        $query="INSERT INTO district VALUES('','$name')";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_district(){
         $query="SELECT * FROM district";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
    
    public function saveUpazila($name,$district) {
         $query="INSERT INTO upazila VALUES('','$district','$name')";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function SaveCost($from_upazila,$to_upazila,$cost) {
        $query="INSERT INTO price VALUES('','$from_upazila','$to_upazila','$cost')";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_upazila(){
         $query="SELECT * FROM `upazila`,district where district.district_id=upazila.district_id";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
    
    
     public function get_cost() {
         $query="select upazila.upazila_name as fromname,a.upazila_name as toname,price.cost,price.price_id from price
join upazila
on price.from_id=upazila.upazila_id
join upazila a 
on price.to_id=a.upazila_id";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_cost_by_id($id) {
         $query="select upazila.upazila_name as fromname,upazila.upazila_name as toname,price.cost,price.price_id,price.from_id,price.to_id from price
join upazila
on price.from_id=upazila.upazila_id
join upazila a 
on price.to_id=a.upazila_id WHERE price.price_id='$id'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function updateCost($from_upazila,$to_upazila,$cost,$id) {
        $query="UPDATE price SET from_id='$from_upazila', to_id='$to_upazila' ,cost='$cost' WHERE price_id='$id'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    public function delete_cost($id) {
        echo $query="DELETE FROM price WHERE price_id='$id'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function get_department($id){
         $query="SELECT * FROM department WHERE department_id='$id'";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
    
     
     
     
     public function AddEmployee($name,$phone,$email,$password) {
         $query="INSERT INTO employee VALUES('','$name','$email','$phone','$password')";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function get_employee(){
         $query="SELECT * FROM employee";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
     public function get_employee_by_id($id){
         $query="SELECT * FROM employee WHERE employee_id='$id'";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
     
     public function update_employee($name, $phone, $email,$id){
        echo $query="UPDATE employee SET name='$name' ,phone='$phone' ,email='$email' WHERE employee_id='$id'";
         $result= mysqli_query($this->db, $query);
         return $result;

     }
     public function delete_employee($id) {
        echo $query="DELETE FROM employee WHERE employee_id='$id'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
     public function delete_district($id) {
        echo $query="DELETE FROM district WHERE district_id='$id'";
        $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function getReport() {
     $query="SELECT * FROM report";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function delete_shiping($id) {
     $query="DELETE FROM shiping WHERE shiping_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
     
    
    public function get_district_by_id($id) {
     $query="SELECT * FROM district WHERE district_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function get_upazila_by_id($id) {
     $query="SELECT * FROM upazila WHERE upazila_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function update_upazila($id,$dist_id,$name) {
     $query="Update upazila SET upazila_name='$name' WHERE upazila_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
}
