<?php
require_once "config.php";

$username = $password =$name =  $mobileno =$address = $pincode = "";
$username_err = $password_err =  $name_err = $mobileno_err =$address_err = $pincode_err="";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    //check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    }
    else{
        $sql = "SELECT user_id FROM users WHERE username = ? "; 
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            //set the value of param username
            $param_username = trim($_POST["username"]);
            //try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken";
                
                }
                else{
                    $username = trim($_POST["username"]);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }
    mysqli_stmt_close($stmt);


//check for password
if(empty(trim($_POST["password"]))){
    $password_err = "Password cannot be blank";
    echo $password_err;
}
elseif(strlen(trim($_POST["password"])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo $password_err;
}
else{
    $password = trim($_POST["password"]);
}

//check for name field
if(empty(trim($_POST["name"]))){
  $name_err = "name cannot be blank";
  echo $name_err;
}
else{
  $name = trim($_POST["name"]);
}

//check for mobile number field
if(empty(trim($_POST["mobileno"]))){
  $mobileno_err = "Mobile number cannot be blank";
  echo $mobileno_err;
}
else{
  $mobileno = trim($_POST["mobileno"]);
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


//if there are no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err)  && empty($name_err)  && empty($mobileno_err)&& empty($address_err) && empty($pincode_err)){
    $sql = "INSERT INTO users (name,  username, password, mobileno, address, pincode) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if($stmt){
        Mysqli_stmt_bind_param($stmt, "sssisi", $param_name, $param_username,$param_password, $param_mobileno, $param_address, $param_pincode);
        //set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        $param_name = $name;
        $param_mobileno = $mobileno;
        $param_address = $address;
        $param_pincode = $pincode;
        //try to execute the query
        if (mysqli_stmt_execute($stmt)){
            header("location: login.php");
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
    <title>Register</title>
    <link rel="icon" href="images/icon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
</head>
<body> 
     <div class="wrapper">
         <div class="headline">
             <h1>Welcome</h1>
         </div>
         <form class="form" method="post" action=" ">
            <div class="signup">
                <div class="form-group">
                    <input type="text" placeholder="Full name" name="name" id="name" required="">
                </div>
                <div class="form-group">
                    <input type="email" placeholder="Email" name="username" id="username" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Mobile number" name="mobileno" id="mobileno" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Address" name="address" id="address" required="">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Pincode" name="pincode" id="pincode" required="">
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

