<?php



class courier{
    
    private $db;

    public function __construct() {
        $this->db= mysqli_connect("localhost", "root", "", "courier");
       // $con= mysqli_connect($host, $user, $password, $database, $port, $socket)
        $this->db->query("SET CHARACTER SET utf8");
      
         if(mysqli_connect_errno()){
           echo "Could Not Connect to Database".  mysql_errno();
           exit();      
     }
    }

    public function customer_save($name,$dist_id,$upazila_id,$address,$address2,$phone,$email)
          {
      
        $query="INSERT INTO customer VALUES('','$name','$dist_id','$upazila_id','$address','$address2','$phone','$email')";
        $result= mysqli_query($this->db, $query);
        return $result;

    }
    
    
     public function update_customer($name,$dist_id,$upazila_id,$address,$address2,$phone,$email,$phone2)
          {
      
          $query="UPDATE  customer SET customer_name='$name',dist_id='$dist_id',thana_id='$upazila_id',address='$address',address2='$address2',phone='$phone',email='$email' WHERE phone='$phone2'";
        $result= mysqli_query($this->db, $query);
        return $result;

    }
    
    
    public function shipment_save($sender_id,$receiver_id,$officer_id,$c_id,$packing_type,$date,$weight,$price,$delivery_type,$product_details,$from_thana,$to_thana)
          {
      
          $query="INSERT INTO shiping VALUES('','$sender_id','$receiver_id','$officer_id','$c_id','$packing_type','$date','$weight','$price','$delivery_type','$product_details','$from_thana','$to_thana','No')";
        $result= mysqli_query($this->db, $query);
        return $result;

    }
    
    


    public function employee_login($email,$password){
       $query="SELECT * FROM employee WHERE email='$email' AND password='$password' ";

    $result= mysqli_query($this->db, $query);
        return $result;

    }
    
    public function changePassword($id,$password) {
           $query="UPDATE doctor_info SET password='$password' WHERE doctor_id='$id'";

    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_district() {
           $query="SELECT * FROM district";

    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_upazila($id) {
           $query="SELECT * FROM upazila WHERE district_id='$id'";

    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_sender_id($phone) {
    $query="SELECT * FROM customer,district,upazila WHERE phone='$phone'AND customer.dist_id=district.district_id and upazila.upazila_id=customer.thana_id";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_receiver_id($phone) {
    $query="SELECT * FROM customer,district,upazila WHERE phone='$phone'AND customer.dist_id=district.district_id and upazila.upazila_id=customer.thana_id ";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    
    public function get_sender_by_id($phone) {
    $query="SELECT * FROM customer,district,upazila WHERE  customer.dist_id=district.district_id and upazila.upazila_id=customer.thana_id and customer.cutomer_id='$phone'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function get_receiver_by_id($phone) {
    $query="SELECT * FROM customer,district,upazila WHERE  customer.dist_id=district.district_id and upazila.upazila_id=customer.thana_id and customer.cutomer_id='$phone'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    
    
     public function get_ShipmentData($id) {
    $query="SELECT * FROM shiping WHERE c_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    public function get_Districts($id) {
    $query="SELECT * FROM district WHERE district_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function get_upazilas($id) {
    $query="SELECT * FROM upazila WHERE upazila_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    public function get_cost($sender,$receiver) {
     $query="SELECT * FROM price WHERE from_id='$sender' AND to_id='$receiver'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function report($sender,$receiver) {
     $query="SELECT * FROM price WHERE from_id='$sender' AND to_id='$receiver'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    public function getReport($to_upazila,$date) {
     $query="SELECT * FROM report WHERE  to_upazila='$to_upazila' or date='$date'";
    $result= mysqli_query($this->db, $query);
        return $result;
    
    }
        
        
        public function getReportCid($id) {
     $query="SELECT * FROM report WHERE c_id='$id'";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    
    public function get_sender_receiver_id($id) {
     $query="SELECT * FROM shiping WHERE shiping_id='$id' ";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
    
    public function update_startus($id,$status) {
     $query="UPDATE shiping SET status='$status' WHERE shiping_id='$id' ";
    $result= mysqli_query($this->db, $query);
        return $result;
    }
    
}
