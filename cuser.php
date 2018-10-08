<?PHP session_start();

unset($_SESSION['sender']);
unset($_SESSION['receiver']);?>

<!DOCTYPE html>
<html>
<head>
	<title>Report Generate</title>
	<link rel="stylesheet" type="text/css" href="css/report.css">
        <link rel="stylesheet" type="text/css" href="css/courieruser.css">
         <link rel="stylesheet" type="text/css" href="css/header.css">
         <link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
</head>
<body style="margin: 0 auto;">
<!-- Start header Section  -->
	<!-- Main header class  -->
	<div class="header">
		<!-- main header file contains two sub division -->
		<!-- class 1 start here -->
		<div class="header1">
			<a href="cuser.php"><img src="images/logo.jpg" alt="Company logo" height="100%" width="100px"></a>
		</div>
		<!-- end class1  -->
		<div class="header2">
			<h1 id="web">Web Shipping</h1>
			<p id="welcome">Welcome: <?PHP echo $_SESSION['name'] ?> </p>
                        <p id="logout"><a href="employee-login.php">Log out</a></p>
		</div>


		<!-- end two sub division -->
		
		
	</div>
	<!-- end main header class -->
	<!-- End of Header Section  -->
        
	<div class="user-option">
	  <a href="booking.php"><button> Booking</button></a><br>
	
            <a href="report.php"><button> Report</button></a>
            <a href="edit-customer.php"><button >Edit Customer</button></a>
	</div>
	
        
        
       <script src="assets/js/jquery.js"></script> 
        
   
</body>
</html>