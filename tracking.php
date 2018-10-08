<!DOCTYPE html>
<html>
<head>
	<title>Track Your Shipment</title>
	<link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
	<link rel="stylesheet" type="text/css" href="homemain.css">
</head>
<body>

<header class="sticky-top">
	<nav class="navbar navbar-expand-lg navbar-light navbar-color ">
	  <a class="navbar-brand" href="index.html">
	  	Online Courier Management
	  </a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item ">
                  <a class="nav-link" href="employee-login.php">Shipping</a>
	      </li>
	      <li class="nav-item ">
                  <a class="nav-link" href="tracking.php">Tracking</a>
	      </li>
	       <li class="nav-item ">
	        <a class="nav-link" href="#">Services</a>
	      </li>
	      <li class="nav-item ">
	        <a class="nav-link" href="#">About Us</a>
	      </li>
	    </ul>
	  </div>
	</nav>
</header>
    
    <?PHP include './database/admin.php'; 
    
    
     $admin=new courier();
            
            if(isset($_POST['search'])=='POST'){
           
                extract($_POST);
      
                
                $dataReport=$admin->getReportCid($cid);
                $row= mysqli_fetch_array($dataReport);
                if(!isset($row))
                    $temp=2;
                
            }
    
    ?>
    
    
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="track">
                            <form method="post">
				<div class="input-group">
                                    <input type="text" class="form-control" placeholder="Track for..." name="cid">
      				<span class="input-group-btn">
                                    <button class="btn btn-search" type="submit" name="search"><i class="fa fa-search fa-fw"></i> Track</button>
      				</span>
				</div>
                                
                                </form>
				<table class="table" style="margin-top: 40px;">
                                    
                                    <?php
                                    if(isset($temp))
                                    {
                                    ?>
                                       
                                    <p style="padding-top: 5px;color: red;">Tracking Number Incorrect</p>
                                        <?php
                                        
                                    } 
                                    
                                    ?>
				  <thead>
				    <tr>
				      <th scope="col">Sender Name</th>
				      <th scope="col">Receiver Name</th>
				      <th scope="col">Status</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
                                        <td><?PHP if(isset($row)) echo $row['fromname'] ?></td>
				      <td><?PHP if(isset($row)) echo $row['toname'] ?></td>
                                      <td><?PHP if(isset($row)){ 
                                          
                                          if($row['status']=='yes')
                                          echo "Delivered";
                                      
                                      
                                          else if($row['status']=='No')
                                              {
                                              echo "Not Delivered";
                                          }
                                          
                                          }?></td>
				      
				    </tr>
				  </tbody>
				</table>
			</div>
			
		</div>
		
	</div>
	
</div>
<footer class="footter">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<h6 style="color: white;margin-top: 30px;">&copyCompanyName 1995-2018</h6>
			</div>
			<div class="col-md-6 footer-menu">
					<ul>
						<li>Feedback |</li>
						<li>Terms of Use |</li>
						<li>Security & Privacy |</li>
						<li>Site Map</li>
					</ul>
					
				</div>
		</div>
		
	</div>
</footer>
<script src="jquery-3.3.1.slim.min.js"></script>
<script src="bootstrap4/js/bootstrap.min.js"></script>
</body>
</html>