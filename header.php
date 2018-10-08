<?PHP session_start(); ?>

<div class="container-fluid">
    <div class="row">
       <div class="col-md-12 header">
		<!-- main header file contains two sub division -->
		<!-- class 1 start here -->
		<div class="header1">
			<a style="list-style: none;" href="cuser.php"><img src="images/logo.jpg" alt="Company logo" height="100%" width="100px;"></a>
		</div>
		<!-- end class1  -->
		<div class="header2">
			<h1 id="web">Web Shipping</h1>
			<p id="welcome">Welcome: <?PHP echo $_SESSION['name'] ?></p>
                        <p id="logout"><a href="employee-login.php">Log out</a></p>
		</div>


		<!-- end two sub division -->
		
		
	</div> 
    </div>
    
</div>
