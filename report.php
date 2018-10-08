<!DOCTYPE html>
<html>
<head>
	<title>Report Generate</title>
        <link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/report.css">
        <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
        
</head>
<body style="margin: 0 auto;">
<!-- Start header Section  -->
	<!-- Main header class  -->
	<?PHP include './header.php'; ?>

		<!-- end two sub division -->
		
	<!-- end main header class -->
	<!-- End of Header Section  -->
        
        
        <?PHP 
        include './php/district.php';
        //include './php/upazila.php'; ?>
        <div class="container-fluid">
            <div class="row">
	<div class="col-md-2 user-option">
	<a href="cuser.php"><button class="user-button">Home</button></a><br>
	</div>
	<div class="col-md-10 user-report">
            
            
            <?PHP
            include './database/admin.php';
            
            $admin=new courier();
            
            if(isset($_POST['search'])=='POST'){
           
                extract($_POST);
                //print_r($_POST);
                
                $dataReport=$admin->getReportCid($cid);
                
                
            }
            
            
            if(isset($_POST['report'])=='POST'){
                extract($_POST);
                //print_r($_POST);
                
                $dataReport=$admin->getReport($to_upazila, $date);
                
                
            }
            
            ?>
            
            <form method="post">
		<label id="report-find">Find</label>
                <input type="text" name="cid" class="search-cosignment" placeholder="Enter Consignment ID">
                <button id="btn-find" name="search" type="submit">Search</button><br>
		<label style="font-size: 25px;font-weight: bolder;">District</label>
                <select id="report-select1" name="from_upazila">
                    <option>Select District</option>
                    <?PHP foreach ($rows as $value) {
                        
                        
                        ?>
                    <option value="<?PHP echo $value['district_id'] ?>"><?PHP echo $value['name'] ?></option>
                    
                    <?PHP
                    } ?>
                   
		</select>
		<label style="font-size: 25px;font-weight: bolder;">Upazila</label>
                <select id="report-select2" name="to_upazila">
                    <option>Select Upazila</option>
			
                   
		</select>
		<input id="report-date" type="date" name="date">
                <a href="#"><button class="Search" type="submit" name="report"> Report</button></a>
                
                </form>
		<table>
                    
                   
			<tr>
				<th>Sl</th>
				<th>Cosignment ID</th>
				<th>Sender</th>
				<th>Receiver</th>
				<th>From Address</th>
				<th>To Address</th>
				<th>Date</th>
				<th>Status</th>
				
				<th>Details</th>

			</tr>
                        
                    <?PHP
                    $count=1;
                    if(isset($dataReport)){
                     while ($rowReport= mysqli_fetch_array($dataReport)){
                    ?>
			<tr>
				<td><?PHP echo $count++; ?></td>
				<td><?PHP echo $rowReport['c_id'] ?></td>
				<td><?PHP echo $rowReport['fromname'] ?></td>
				<td><?PHP echo $rowReport['toname'] ?></td>
				<td><?PHP echo $rowReport['sender_address'] ?></td>
				<td><?PHP echo $rowReport['receiver_address'] ?></td>
				<td><?PHP echo $rowReport['date'] ?></td>
                                <td><a href="update-shipingstatus.php?id=<?PHP echo $rowReport['shiping_id'] ?>"><button class="btn-green">
                                    <?PHP if($rowReport['status']=='yes') 
                                        {echo "Deliver";} 
                                        else 
                                        { echo 'Not Deliver';} ?>
                                        </button></a></td>
                                       
				<td><a href="view-details.php?id=<?PHP echo $rowReport['shiping_id'] ?> && sender_id=<?PHP echo $rowReport['sender_id'] ?> && receiver_id=<?PHP echo $rowReport['receiver_id'] ?>"><button class="btn-details">View</button></a></td>
			</tr>
                        
                    <?PHP } }?>
		</table>
            </div>
        </div>
      </div>  
       <script src="assets/js/jquery.js"></script> 
        
         <script>
$(document).ready(function(){
    $("#report-select1").change(function(){
       var dist = $('#report-select1').val();
       //alert(dist);
       
        $.post('get_upazila.php',{dist:dist},
        function(data){
             $("#report-select2").html(data);
        });
    });
});
</script> 

</body>
</html>