<?PHP session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PDF</title>
	<link rel="stylesheet" type="text/css" href="css/pdf.css">
</head>
<body>
    
     <?php 
        
        include './database/admin.php';                
        $courier=new courier();
        
        $get_shiping_data=$courier->get_sender_receiver_id($_GET['id']);
        $rowShiping= mysqli_fetch_array($get_shiping_data);
        
        $DataSender=$courier->get_sender_by_id($_GET['sender_id']);
        $DataReceiver=$courier->get_receiver_by_id($_GET['receiver_id']);
        $DataShipment=$courier->get_ShipmentData($rowShiping['c_id']);
        
        $rowSender= mysqli_fetch_array($DataSender);
        $rowSReceiver= mysqli_fetch_array($DataReceiver);
        $rowShiping= mysqli_fetch_array($DataShipment);
        
        
    
    
    ?>
    
    
    
	<div class="main-body">
		<h1>Company name :</h1>
		<table>
			<tr>
				<th>Shipment From</th>
				<th>Shipment To</th>
			</tr>
			<tr>
				<td><?PHP echo $rowSender['customer_name'] ?></td> <td><?PHP echo $rowSReceiver['customer_name'] ?></td>
			</tr>
			<tr>
				<td><?PHP echo $rowSender['address'] ?></td> <td><?PHP echo $rowSReceiver['address'] ?></td>
			</tr>
			
			<tr>
				<td><?PHP echo $rowSender['upazila_name'] ?></td> <td><?PHP echo $rowSReceiver['upazila_name'] ?></td>
			</tr>
			<tr>
				<td><?PHP echo $rowSender['name'] ?></td> <td><?PHP echo $rowSReceiver['name'] ?></td>
			</tr>
			<tr>
				<td>Phone:<?PHP echo $rowSender['phone'] ?></td> <td>Phone:<?PHP echo $rowSReceiver['phone'] ?></td>
			</tr>
			<tr>
				<td><?PHP echo $rowSender['email'] ?></td> <td><?PHP echo $rowSReceiver['email'] ?></td>
			</tr>
		<!-- Second table for Shipment information 		 -->
		</table>
			<h2>Shipment Details</h2>	
			<table>
				<tr>
					<th>Shipment Details</th>

				</tr>
				<tr>
					<td>Shipment date :</td> 
                                        <td><?PHP echo $rowShiping['date'] ?></td> 
				</tr>
				<tr>
					<td>Cosignment ID</td> 
                                        <td><?PHP echo $rowShiping['c_id'] ?></td>
				</tr>
				<tr>
					<td>Pakaging Type</td> 
                                        <td><?PHP echo $rowShiping['pakaging_type'] ?></td>
				</tr>
				<tr>
					<td>Weight</td> 
                                        <td><?PHP echo $rowShiping['weight']." " ?>Kg</td>
				</tr>
				<tr>
					<td>Price</td> 
                                        <td><?PHP echo $rowShiping['price']." " ?></td>
				</tr>
				<tr>
					<td> Delivery type</td> 
                                        <td><?PHP echo $rowShiping['delivery_type'] ?></td>
				</tr>
				
				
				<tr>
					<td>Products Details</td> 
                                        <td><?PHP echo $rowShiping['product_details'] ?></td>
				</tr>
				<tr>
					<td>Booking Officer</td> 
                                        <td><?PHP echo $_SESSION['name'] ?></td>
				</tr>

			</table>
			<!-- end Second Table  -->
                        <button onclick="myFunction()">Print</button>
	
	</div>
    
    
    <script>
function myFunction() {
    window.print();
}
</script>
</body>
</html>