<?php
include './database/admin.php';
$courier=new courier();
 $dist_id=$_POST['dist'];
//echo "<script type='text/javascript'>alert('$dist_id');</script>";
 $data=$courier->get_upazila($dist_id);
  while($row= mysqli_fetch_array($data)){
        ?>
            
    <option value="<?PHP echo $row['upazila_id'] ?>"><?PHP echo $row['upazila_name'] ?></option>
  
        
        <?PHP 
    
}

