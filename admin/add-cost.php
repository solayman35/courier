<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>Online Courier Management</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link id="base-style" href="css/style.css" rel="stylesheet">
	<link id="base-style-responsive" href="css/style-responsive.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>

	<link rel="shortcut icon" href="img/favicon.ico">
        <link href="../assets/jquery.min.js">
	<!-- end: Favicon -->
	
		
		
		
</head>

<body>
	<!-- start: Header -->
	<?PHP include './header.php'; ?>
	<!-- start: Header -->
	
		<div class="container-fluid-full">
		<div class="row-fluid">
			<!-- start: Main Menu -->
			<?PHP include './sidebar.php'; ?>
			<!-- end: Main Menu -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                                            
                                            
                                             <?PHP
                                            
                                            include '../php/district.php';
                                            include './php/courier.php';
                                    $admin=new Admin();
                                            if($_SERVER['REQUEST_METHOD']=='POST'){
                                        extract($_POST);
                                        //print_r($_POST);
                                        $data=$admin->SaveCost($from_upazila, $to_upazila,$cost);
                                        
                                        if($data){
                                            echo "Save Cost Successfully";
                                        }
                                       
                                        }
                                    
                                    
                                            
                                            
                                            ?>
                                            
                                            
                                            <form class="form-horizontal" method="post">
						  <fieldset>
							<div class="control-group">
                                                            <div class="control-group">
								<label class="control-label" for="selectError3">From District</label>
								<div class="controls">
                                                                    <select id="from_dist" name="from_dist">
									 <?PHP foreach ($rows as $value) {
                                                                              
                                                                          ?>
                                                                      <option value="<?PHP echo $value['district_id'] ?>"><?PHP echo $value['name'] ?></option>
                                                                      <?PHP
                                                                          } ?>
									
									
									
								  </select>
								</div>
							  </div>
							  <label class="control-label" for="selectError3">From Upazila</label>
								<div class="controls">
                                                                    <select id="from_upazila" name="from_upazila">
									<option>Option 1</option>
									
								  </select>
								</div>
							</div>
                                                      <div class="control-group">
                                                            <div class="control-group">
								<label class="control-label" for="selectError3">To District</label>
								<div class="controls">
                                                                    <select id="to_dist" name="to_dist">
									 <?PHP foreach ($rows as $value) {
                                                                              
                                                                          ?>
                                                                      <option value="<?PHP echo $value['district_id'] ?>"><?PHP echo $value['name'] ?></option>
                                                                      <?PHP
                                                                          } ?>
									
									
									
								  </select>
								</div>
							  </div>
							  <label class="control-label" for="selectError3">To Upazila</label>
								<div class="controls">
                                                                    <select id="to_upazila" name="to_upazila">
									<option>select</option>
									
								  </select>
								</div>
							</div>
                                                      <label class="control-label" for="typeahead">Cost </label>
							  <div class="controls">
                                                              <input type="text" name="cost" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
								
							  </div>
	
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save changes</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		
			
		
    

	</div><!--/.fluid-container-->
	
			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
		
	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="clearfix"></div>
	
	<footer>

		<p>
			<span style="text-align:left;float:left">&copy; 2013 <a href="http://jiji262.github.io/Bootstrap_Metro_Dashboard/" alt="Bootstrap_Metro_Dashboard">Bootstrap Metro Dashboard</a></span>
			
		</p>

	</footer>
	
	<!-- start: JavaScript-->

		<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery-migrate-1.0.0.min.js"></script>
	
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
	
		<script src="js/jquery.ui.touch-punch.js"></script>
	
		<script src="js/modernizr.js"></script>
	
		<script src="js/bootstrap.min.js"></script>
	
		<script src="js/jquery.cookie.js"></script>
	
		<script src='js/fullcalendar.min.js'></script>
	
		<script src='js/jquery.dataTables.min.js'></script>

		<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.js"></script>
	<script src="js/jquery.flot.pie.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	
		<script src="js/jquery.chosen.min.js"></script>
	
		<script src="js/jquery.uniform.min.js"></script>
		
		<script src="js/jquery.cleditor.min.js"></script>
	
		<script src="js/jquery.noty.js"></script>
	
		<script src="js/jquery.elfinder.min.js"></script>
	
		<script src="js/jquery.raty.min.js"></script>
	
		<script src="js/jquery.iphone.toggle.js"></script>
	
		<script src="js/jquery.uploadify-3.1.min.js"></script>
	
		<script src="js/jquery.gritter.min.js"></script>
	
		<script src="js/jquery.imagesloaded.js"></script>
	
		<script src="js/jquery.masonry.min.js"></script>
	
		<script src="js/jquery.knob.modified.js"></script>
	
		<script src="js/jquery.sparkline.min.js"></script>
	
		<script src="js/counter.js"></script>
	
		<script src="js/retina.js"></script>

		<script src="js/custom.js"></script>
	<!-- end: JavaScript-->
	
        
        
        
        
        
           <script>
$(document).ready(function(){
    $("#from_dist").change(function(){
       var dist = $('#from_dist').val();
       //alert(dist);
       
        $.post('../get_upazila.php',{dist:dist},
        function(data){
             $("#from_upazila").html(data);
        });
    });
});
</script>    
    

<script>
$(document).ready(function(){
    $("#to_dist").change(function(){
       var dist = $('#to_dist').val();
      // alert(dist);
       
        $.post('../get_upazila.php',{dist:dist},
        function(data){
             $("#to_upazila").html(data);
        });
    });
});
</script>
</body>
</html>
