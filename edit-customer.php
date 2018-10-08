

<!DOCTYPE html>
<html>
<head>
	<title>Booking | Shipping</title>
        <link rel="stylesheet" type="text/css" href="css/edit-customer.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
        <script src="assets/jquery.min.js"></script>
        <style>
            

        </style>
</head>
<body style="margin:0 auto;">
    
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
                            
                          
				extract($_POST);
				//print_r($_POST);
//                                $address=$address1." ".$address2;
                        $data=$courier->update_customer($name, $district, $upazila, $address1,$address2, $phone, $email,$phone2) ;       
                         if($data){
                             $message="Update  Customer Information";
                             
                          
                         }
                         else{
                             $message="Error Information";
                         }
			}

		 ?>

        
        <?PHP
        
        if(isset($_POST['search'])){
            //extract($_POST);
            $phone=$_POST['phone2'];
            //print_r($_POST);
            $DataSender=$courier->get_sender_id($phone);
       // $DataReceiver=$courier->get_receiver_id($phone);
         $rowSender= mysqli_fetch_array($DataSender);
        //$rowSReceiver= mysqli_fetch_array($DataReceiver);
         
         $districtData=$courier->get_Districts($rowSender['dist_id']);
         $rowDistrict= mysqli_fetch_array($districtData);
         
         
         $upazilaData=$courier->get_upazilas($rowSender['thana_id']);
         $rowUpazila= mysqli_fetch_array($upazilaData);
         
        }
        
       
        
        
        ?>

	<div class="container-fluid">
		<!-- main content start here -->
                <div class="row">
                     <div class="col-md-12 booking">
                    <h1 style="text-align:center;">Sender and Receiver Information</h1>
                        <p><?PHP if(isset($message) ) echo $message ?></p>
			<form method="post">
				<!-- 1st fieldset for Shipper/Sender Address -->
				<fieldset>
					<legend>Customer Details</legend>
                                        <label id="label-phone-search">Phone</label>
                                        <input class="update-search-input" type="text" name="phone2" required placeholder="Search For Update Customer" value="<?PHP if(isset($rowSender['phone'])) echo $rowSender['phone']; ?>">
					
					<label>Shiper Name</label>
                                        <input type="text" name="name"  placeholder="ShipPer Name" value="<?PHP if(isset($rowSender['customer_name'])) echo $rowSender['customer_name']; ?>"><br><br>
					<label>District</label>
                                        <select name="district" id="Districts">
                                             <?PHP if(isset($rowDistrict)) { ?>
                                            <option value="<?PHP echo $rowDistrict['district_id']?>"> <?PHP echo $rowDistrict['name'] ?></option>
                                             <?PHP } ?>
                                           
                                          
                                            <?PHP foreach ($rows as $district) {
                                                ?>
                                            <option value="<?PHP echo $district['district_id'] ?>"><?PHP echo $district['name'] ?></option>
                                            <?PHP  
                                                                 
                                                             } ?>
						
					</select><br><br>
					<label>Upazila</label>
                                        <select name="upazila" id="get_upazila">
                                            <?PHP if(isset($rowUpazila)){ ?>
                                            <option value="<?PHP echo $rowUpazila['upazila_id'] ?>"><?PHP echo $rowUpazila['upazila_name'] ?></option>
                                            
                                            <?PHP } ?>
					</select><br><br>
					<label>Address</label>
                                        <input type="text" name="address1"  placeholder="Village,Road Number" value="<?PHP 
                                        if(isset($rowSender['address'])) 
                                            echo $rowSender['address'];
                                                
                                                ?> "><br><br>
					<label>Address2</label>
                                        <input type="text" name="address2" placeholder="P.O and others"value=" <?PHP if(isset($rowSender['address2'])) echo $rowSender['address2'] ;
                                           ?>"><br><br>
					<label>Phone</label>
                                        <input type="text" name="phone"  placeholder="Enter Valid Phone Number" value="<?PHP if(isset($rowSender['phone'])) echo $rowSender['phone']; ?>">
					<input type="submit" name="search" title="Search From Database" value="Search" id="update_search"><br><br>

					<label>Email</label>
                                        <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?PHP if(isset($rowSender['email'])) echo $rowSender['email'];
                                             ?>"><br><br>

					<input  type="submit" name="save" title="Save for Future Use" id="btn_save-update" value="Update">
				</fieldset>

			</form>
				<!-- End 1st fieldset Option -->

				<!-- 2nd Fieldset for Receiver Address -->
						


			
                                
                                
		</div>
		<!-- End main content -->
                </div>
               
		
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