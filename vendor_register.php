<?php
require_once "config.php";

$vendorname = $password =$name = $occupation = $address = $pincode = $mobileno = "";
$vendorname_err = $password_err = $occupation_err = $name_err = $address_err = $pincode_err = $mobileno_err ="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //check if username is empty
    if(empty(trim($_POST['vendorname']))){
        $vendorname_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT vendor_id FROM vendors WHERE vendorname = ? "; 
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_vendorname);
            //set the value of param username
            $param_vendorname = trim($_POST['vendorname']);
            //try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $vendorname_err = "This username is already taken";
                
                }
                else{
                    $vendorname = trim($_POST['vendorname']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);


//check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
    echo $password_err;
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo $password_err;
}
else{
    $password = trim($_POST['password']);
}

//check for name field
if(empty(trim($_POST['name']))){
  $name_err = "name cannot be blank";
  echo $name_err;
}
else{
  $name = trim($_POST['name']);
}

//check for occupation field
if(empty(trim($_POST['occupation']))){
    $occupation_err = "occupation cannot be blank";
    echo $occupation_err;
  }
  else{
    $occupation = trim($_POST['occupation']);
  }

//check for address field
if(empty(trim($_POST['address']))){
  $address_err = "address cannot be blank";
  echo $address_err;
}
else{
  $address = trim($_POST['address']);
}
//check for pincode field
if(empty(trim($_POST['pincode']))){
  $pincode_err = "pincode cannot be blank";
  echo $pincode_err;
}
else{
  $pincode = trim($_POST['pincode']);
}
//check for mobile number field
if(empty(trim($_POST['mobileno']))){
  $mobileno_err = "Mobile number cannot be blank";
  echo $mobileno_err;
}
else{
  $mobileno = trim($_POST['mobileno']);
}

//if ther are no errors, go ahead and insert into the database
if(empty($vendorname_err) && empty($password_err) && empty($occupation_err)  && empty($name_err) && empty($address_err) && empty($pincode_err) && empty($mobileno_err)){
    $sql = "INSERT INTO vendors (vendorname, password, name, occupation, address, pincode, mobileno) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
        Mysqli_stmt_bind_param($stmt, "sssssii", $param_vendorname, $param_password, $param_name,$param_occupation, $param_address, $param_pincode, $param_mobileno);
        //set these parameters
        $param_vendorname = $vendorname;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_name = $name;
        $param_occupation = $occupation;
        $param_address = $address;
        $param_pincode = $pincode;
        $param_mobileno = $mobileno;
        //try to execute the query
        if (mysqli_stmt_execute($stmt)){
            header("location: vendor_login.php");
        }
        else{
            echo "Something went wrong... cannot redirect!";
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html>
<head>
    <title>Vendor Registration</title>
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
            <div class="signup">
                <div class="form-group">
                    <input type="text" placeholder="Full name" name="name" id="name" required="">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="vendorname" id="vendorname" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Mobile number" name="mobileno" id="mobileno" required="">
                </div>            
                <div class="form-group">
                    <input class="input" list="datalistOptions" placeholder="Occupation/Business" name="occupation" id="occupation" required="">
                    <datalist id="datalistOptions">
                    <option value="Electrician">
                    <option value="Movers">
                    <option value="Laundry">
                    <option value="Painting">
                    <option value="Housekeeping">
                    <option value="Plumber">
                    <option value="Other">
                    </datalist>
                </div>
                <div class="form-group">
                    <input type="text" placeholder=" Office Address" name="address" id="address" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Office Pincode" name="pincode" id="pincode" required="">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" id="password" required="">
                </div>



                <button type="submit" class="btn" >SIGN UP</button>
                <div class="account-exist">
                    Already have an account? <a href="login.php" id="login">Login</a>
                </div>
            </div>
            


</body>
</html>