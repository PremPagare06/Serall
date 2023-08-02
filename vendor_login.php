<?php
//script will handle login
session_start();
//check if user is already logged in
if(isset($_SESSION['vendorname'])){
  header("location: vendor_logout.php");
}

require_once "config.php";
$vendorname = $password = "";
$err = "";
if($_SERVER['REQUEST_METHOD'] == "POST"){
  if(empty(trim($_POST["vendorname"])) || empty(trim($_POST["password"])))
  {
    $err = "Please enter correct username and password";
  }
  else{
    $vendorname = trim($_POST["vendorname"]);
    $password = trim($_POST["password"]);
  }
  if(empty($err)){
    $sql = "SELECT vendor_id, vendorname, password FROM vendors WHERE vendorname = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_vendorname);
    $param_vendorname = $vendorname;
    
    //try to execute the statement
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_store_result($stmt);
      if(mysqli_stmt_num_rows($stmt) == 1){
        mysqli_stmt_bind_result($stmt, $vendor_id, $vendorname, $hashed_password);
        if(mysqli_stmt_fetch($stmt)){
          if(password_verify($password, $hashed_password)){
            //this means the password is correct..allow user to login
            session_start();
            $_SESSION["vendorname"] = $vendorname;
            $_SESSION["vendor_id"] = $vendor_id;
            $_SESSION["loggedin"] = true;
            //redirect user to Home page
            header("location:home.php");
            
          }
          else{
            echo " <script>alert('Wrong Password'); </script>";
          }
        }
      
      
      }
    }
  }
}



?>


<!DOCTYPE html>
<html>
<head>
    <title>Vendor Login</title>
    <link rel="icon" href="images/icon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
     <div class="wrapper">
         <div class="headline">
             <h1>Welcome Vendors!</h1>
         </div>
         <form class="form" method="post" action=" ">
            <div class="signin"> 
                <div class="form-group">
                    <input type="email" placeholder="Email" name="vendorname" id="vendorname" required="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" id="password"  required="">
                </div>
                
                <button type="submit" class="btn">LOGIN</button>
                <div class="account-exist">
                    Create New a account? <a href="vendor_register.php" id="signup">Signup</a>
                </div>
            </div>
         </form>
     </div>


</body>
</html>



