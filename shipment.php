<!DOCTYPE html>
<html>
<head>
	<title>Shipment Details Page-2</title>
	<link rel="stylesheet" type="text/css" href="css/shipmentdetails.css">
        <link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
        <script src="assets//jquery.min.js"></script>
</head>
<body style="margin: 0 auto;">
    
    <?PHP include './header.php'; ?>
    
    <?php 
        
        include './database/admin.php';                
        $courier=new courier();
        
        $DataSender=$courier->get_sender_id($_SESSION['sender']);
        $DataReceiver=$courier->get_receiver_id($_SESSION['receiver']);
        
        $rowSender= mysqli_fetch_array($DataSender);
        $rowSReceiver= mysqli_fetch_array($DataReceiver);
        
        
        
    
    
    ?>
    
           <?PHP
           
             if(isset($_POST['submit'])){
                 unset($_SESSION['shipment_id']);
                 extract($_POST);
                 print_r($_POST);
                 $sender_id=$rowSender['cutomer_id'];
                 $receiver_id= $rowSReceiver['cutomer_id'];
                 
                 $data=$courier->shipment_save($sender_id, $receiver_id,$_SESSION['id'], $c_id, $packing, $date, $weight, $price, $delivery, $product,$rowSender['thana_id'],$rowSReceiver['thana_id']);
                 if($data){
                     
                     $_SESSION['shipment_id']=$c_id;
                     $message="save Shipment Details";
                     header("location:pdf.php");
                 }
                 else{
                     $message="Error to save Shipment Details";
                 }
             }
           ?>
    
    
                        <?PHP 
//                                if(isset($_POST['check'])){
//                                    extract($_POST);
//                                    $x=30;
//                                    $fixedPrice=10;
//                                    if($delivery=="home"){
//                                         $total=$weight*$fixedPrice+$x;
//                                    }
//                                    else{
//                                        $total=$weight*$fixedPrice;
//                                    }
//                                    
//                                    
//                                }

                        
                        $costData=$courier->get_cost($rowSender['thana_id'], $rowSReceiver['thana_id']);
                        $rowCost= mysqli_fetch_array($costData);
//                        echo $_SESSION['sender'];
//                        echo $_SESSION['receiver'];
                        ?>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 Shipment">
		<h1>Information Of Products</h1>
                <p><?PHP if(isset($message)) echo $message ?></p>

                <form method="post">
		<fieldset> 
			<legend style="font-size: 20px;">Shipment Details</legend>
		<label>Booking Officer</label>
                <input type="text" name="name" value="<?PHP echo $_SESSION['name'] ?>"><br><br>
		<label>Cosignment ID</label>
                <input type="text" name="c_id" value="<?PHP echo(rand()) ?>"><br><br>
		<label>Pakaging Type</label>
                <select name="packing">
                    <option value="Flyer">Flyer</option>
                    <option value="Box">Box</option>
		</select><br><br>
		<label>Shipping Date</label>
		<input id="datee" type="date" required="" name="date"><br><br><br>
		<label>Weight</label>
                <input type="text" name="weight" placeholder="Weight" id="weight">
		<label id="label1">Home Delivery</label>
                <input id="radio1" type="radio" name="delivery" required="2" value="home" onclick="myFunction2(this.value)"> <span>Add 30 taka more for home delivery</span><br>
		<label id="label2">Office Delivery</label>
                <input id="radio2" type="radio" name="delivery" required="2" value="office" onclick="myFunction2(this.value)"><br><br>
		<label>Products Details</label>
		<input type="text" name="product"  placeholder="Product Details"><br><br>
		<label id="detail1">Price</label>
                <input id="text-products" type="text" name="price" value="">
<!--                <button onclick="myFunction()">check</button>-->
                <input type="hidden" id="cost" value="<?PHP if(isset($rowCost)) echo $rowCost['cost']; ?>">
                <input type="submit" name="submit" value="Next">
               
		</fieldset>
                    
		</form>
                
               
            </div>
        </div>
        
    </div>
	

</body>


<script>
function myFunction() {
   
    var x=document.getElementById("weight").value;
   
     alert(y);
}

function myFunction2(browser) {
     // alert(browser);
     var cost=document.getElementById("cost").value;
       var x=document.getElementById("weight").value;
       if(browser=='home'){
           var price=x*cost+30;
       }
       else{
           price=x*cost;
       }
    
  //alert(price);
 document.getElementById("text-products").value=price;
}

</script>

<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
</html>