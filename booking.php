

<!DOCTYPE html>
<html>
<head>
	<title>Booking | Shipping</title>
        <!--<link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
	<link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="css/booking.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="assets/jquery.min.js"></script>
</head>
<body>
    
	<!-- Start header Section  -->
	<!-- Main header class  -->
	<?PHP include './header.php'; ?>
	<!-- end main header class -->

	<!-- End of Header Section  -->


		<?php 
                include './php/district.php';
                include './database/admin.php';
                
                $courier=new courier();
                
                
			if (isset($_POST['save'])) {
                            
                            unset($_SESSION['sender']);
				extract($_POST);
//				print_r($_POST);
                                $name= htmlspecialchars($name);
                                $address2= htmlspecialchars($address2);
                                $address1= htmlspecialchars($address1);
                                if($address1==" "|| $name==''|| $district== '' || $email==''){
                                  echo "Please Input each field"  ;
                                }
                                
                                else {
                                  //                                $address=$address1." ".$address2;
                        $data=$courier->customer_save($name, $district, $upazila, $address1,$address2, $phone, $email) ;       
                         if($data){
                             $message="Save Sender Information";
                             
                             $_SESSION['sender']=$phone;
                         }
                         else{
                             $message="Error Information";
                         }  
                                }

                         
			}

		 ?>

        
        <?PHP
        
        if(isset($_POST['search'])){
            extract($_POST);
            
            $DataSender=$courier->get_sender_id($phone);
       // $DataReceiver=$courier->get_receiver_id($phone);
         $rowSender= mysqli_fetch_array($DataSender);
        //$rowSReceiver= mysqli_fetch_array($DataReceiver);
         
         $districtData=$courier->get_Districts($rowSender['dist_id']);
         $rowDistrict= mysqli_fetch_array($districtData);
         
         
         $upazilaData=$courier->get_upazilas($rowSender['thana_id']);
         $rowUpazila= mysqli_fetch_array($upazilaData);
         if($rowSender){
             unset($_SESSION['sender']);
             $_SESSION['sender']=$rowSender['phone'];
         }
        }
        
        if(isset($_POST['search2'])){
            extract($_POST);
            
           // $DataSender=$courier->get_sender_id($phone);
        $DataReceiver=$courier->get_receiver_id($phone);
         //$rowSender= mysqli_fetch_array($DataSender);
        $rowSReceiver= mysqli_fetch_array($DataReceiver);
        
         $districtData=$courier->get_Districts($rowSReceiver['dist_id']);
         $rowDistrictReceiver= mysqli_fetch_array($districtData);
         
         
         $upazilaData=$courier->get_upazilas($rowSReceiver['thana_id']);
         $rowUpazilaReceiver= mysqli_fetch_array($upazilaData);
        
        if($rowSReceiver){
            unset($_SESSION['receiver']);
            $_SESSION['receiver']=$rowSReceiver['phone'];
        }
        }
        
        
        ?>

	<div class="container-fluid">
		<!-- main content start here -->
                <div class="row">
                    <div class="col-md-12 booking">
			<h1>Sender and Receiver Information</h1>
                        <p><?PHP if(isset($message) ) echo $message ?></p>
			<form method="post">
				<!-- 1st fieldset for Shipper/Sender Address -->
                                
				<fieldset>
					<legend>Sender information</legend>
					<label>Shiper Name</label>
                                        <input type="text" name="name"  placeholder="ShipPer Name" value="<?PHP if(isset($rowSender['customer_name'])) echo $rowSender['customer_name'];else if(isset($name))
                                            echo $address1; ?>"><br><br>
					<label>District</label>
                                        <select name="district" id="Districts">
                                             <?PHP if(isset($rowDistrict)) { ?>
                                            <option> <?PHP echo $rowDistrict['name'] ?></option>
                                             <?PHP } ?>
                                           
                                            <option>Select District</option>
                                            <?PHP foreach ($rows as $district) {
                                                ?>
                                            <option value="<?PHP echo $district['district_id'] ?>"><?PHP echo $district['name'] ?></option>
                                            <?PHP  
                                                                 
                                                             } ?>
						
					</select><br><br>
					<label>Upazila</label>
                                        <select name="upazila" id="get_upazila">
                                            <?PHP if(isset($rowUpazila)){ ?>
                                            <option><?PHP echo $rowUpazila['upazila_name'] ?></option>
                                            
                                            <?PHP } ?>
					</select><br><br>
					<label>Address</label>
                                        <input type="text" name="address1"  placeholder="Road Address , Village" value="<?PHP 
                                        if(isset($rowSender['address'])) 
                                            echo $rowSender['address'];
                                        if(isset($address1))
                                            echo $address1;
                                                
                                                ?> "><br><br>
					<label>Address2</label>
                                        <input type="text" name="address2" placeholder="P.O and others" value=" <?PHP if(isset($rowSender['address2'])) echo $rowSender['address2'] ;else if(isset($address2))
                                            echo $address2;?>"><br><br>
					<label>Phone</label>
                                        <input type="text" name="phone" required placeholder="Enter Valid Phone Number" value="<?PHP if(isset($rowSender['phone'])) echo $rowSender['phone'];else if(isset($phone))
                                            echo $phone; ?>">
					<input type="submit" name="search" title="Search From Database" value="Search" id="btn_search"><br><br>

					<label>Email</label>
                                        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?PHP if(isset($rowSender['email'])) echo $rowSender['email'];else if(isset($email))
                                            echo $email; ?>"><br><br>

					<input  type="submit" name="save" title="Save for Future Use" id="btn_save" value="Save">
				</fieldset>

			</form>
				<!-- End 1st fieldset Option -->

				<!-- 2nd Fieldset for Receiver Address -->
                                <!--For receiver P--> 
						<?php 
					if (isset($_POST['saveReceiver'])) {
                                        unset($_SESSION['receiver']);
					extract($_POST);
//					print_r($_POST);
                                         $name= htmlspecialchars($name);
                                         $address2= htmlspecialchars($address2);
                                         $receiverName=$name;
                                         $a=$address1;
                                         $b=$address2;
                                         $receiverEmail=$email;
                                         $receiverPhone=$phone;
                                         
                                          if($address1==" "|| $name=='' || $district=='' || $email==''){
                                              echo "Please input each field";
                                          }
                                          else{
                                              
                                          
                                         //$address=$address1." ".$address2;
                                          $data=$courier->customer_save($name, $district, $upazila, $address1,$address2, $phone, $email) ;       
                                             if($data){
                                                 $msg="Save Receiver Information";

                                                 $_SESSION['receiver']=$phone;
                                             }
                                             else{
                                                 $msg="Error Information";
                                        }}
                                                  
							}

						 ?>


				<form method="post">
                                    
				<fieldset>
                                    
					<legend>Receiver Details</legend>
                                        <?PHP if(isset($msg)){?> <h4>Save Receiver Data Successfully</h4><?PHP }?>
					<label>Shiper Name</label>
                                        <input type="text" name="name" placeholder="Shipper Name" value="<?PHP if(isset($rowSReceiver))echo $rowSReceiver['customer_name'] ;else if(isset($receiverName))
                                            echo $receiverName;?>"><br><br>
					<label>District</label>
					 <select name="district" id="DistrictReceiver">
                                             <?PHP if(isset($rowDistrictReceiver)) { ?>
                                            <option> <?PHP echo $rowDistrictReceiver['name'] ?></option>
                                             <?PHP } ?>
                                            <option>Select District</option>
                                            <?PHP foreach ($rows as $district) {
                                                ?>
                                            <option value="<?PHP echo $district['district_id'] ?>"> <?PHP echo $district['name'] ?></option>
                                            <?PHP  
                                                                 
                                                             } ?>
						
					</select><br><br>
					<label>Upazila</label>
                                        <select name="upazila" id="upazilaReceiver">
					  <?PHP if(isset($rowUpazilaReceiver)){ ?>
                                            <option><?PHP echo $rowUpazilaReceiver['upazila_name'] ?></option>
                                            
                                            <?PHP } ?>	
					</select><br><br>
					<label>Address</label>
                                        <input type="text" name="address1" placeholder="Road Address , Village" value="<?PHP if(isset($rowSReceiver)) echo $rowSReceiver['address'];else if(isset($a))
                                            echo $a; ?>"><br><br>
					<label>Address2</label>
                                        <input type="text" name="address2" placeholder="P.O and others" value=" <?PHP if(isset($rowSReceiver))  echo $rowSReceiver['address2'];else if(isset($b))
                                            echo $b; ?>"><br><br>
					<label>Phone</label>
                                        <input type="text" name="phone" placeholder="Enter Valid Phone Number" value="<?PHP if(isset($rowSReceiver))  echo $rowSReceiver['phone'];else if(isset($receiverPhone))
                                            echo $receiverPhone; ?>">
					<input type="submit" name="search2" title="Search From Database" value="Search" id="btn_search2"><br><br>

					<label>Email</label>
                                        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?PHP if(isset($rowSReceiver))  echo $rowSReceiver['email'];else if(isset($receiverEmail))
                                            echo $receiverEmail; ?>"><br><br>

					<input  type="submit" name="saveReceiver" title="Save for Future Use" id="btn_save" value="Save">
				</fieldset>
                                   

			</form>
                                
                                
                    </div>
                </div>
		<!-- End main content -->
	<?PHP if(isset($_SESSION['sender']) && isset($_SESSION['receiver'])){ ?>
			 <a href="shipment.php">  <button  id="btn_next">Next </button></a>
                                <?PHP } ?>	
	</div>
<div class="footer" style="background-color: black;
">
	
	
</div>
        
        <script src="assets/js/jquery.min.js"></script>   
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.js"></script>
                    
    <script>
$(document).ready(function(){
    $("#Districts").change(function(){
       var dist = $('#Districts').val();
       //alert(dist);
       
        $.post('get_upazila.php',{dist:dist},
        function(data){
             $("#get_upazila").html(data);
        });
    });
});
</script>    
    

<script>
$(document).ready(function(){
    $("#DistrictReceiver").change(function(){
       var dist = $('#DistrictReceiver').val();
      // alert(dist);
       
        $.post('get_upazila.php',{dist:dist},
        function(data){
             $("#upazilaReceiver").html(data);
        });
    });
});
</script> 
</body>
</html>