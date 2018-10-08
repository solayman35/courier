<?PHP session_start(); 
 session_unset();
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Employee - Log-in</title>

  <link rel="stylesheet" href="css/style.css"  type="text/css" />
  <link href="bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href=bootstrap4/css/bootstrap.css" rel="stylesheet" type="text/css" >
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
      <!-- <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="#">Shipping</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">Tracking</a>
        </li>
         <li class="nav-item ">
          <a class="nav-link" href="#">Services</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="#">About Us</a>
        </li>
      </ul> -->
    </div>
  </nav>
</header>
    
    <?PHP 
    
   
    include './database/admin.php';
                
    $courier=new courier();
    
    if($_SERVER['REQUEST_METHOD']=='POST'){
        extract($_POST);
        //print_r($_POST);
        
        $data=$courier->employee_login($username, $pass);
        $row= mysqli_fetch_array($data);
        
        if($row){
             $_SESSION['name']=$row['name'];
             $_SESSION['id']=$row['employee_id'];
            header("Location:cuser.php");
        }
        else{
            $message= "Email Or password error";
        }
    }
    
    ?>
   <br>
   <br>

  <div class="login-card">
    <h1>Employee Login</h1><br>
    <?PHP if(isset($message)){
        ?>
    <p style="color:red;"><?PHP echo $message; ?></p>
    <?PHP }
         ?>
    <form method="post">
    <input type="text" name="username" placeholder="Username">
     <input type="password" name="pass" placeholder="Password">
    <input type="submit" name="login" class="login login-submit" value="login">
  </form>

  
</div>
<br><br><br><br><br>

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
</body>

</html>