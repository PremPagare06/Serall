<?php
require_once "C:/xampp/htdocs/Serall/config.php";
require_once "C:/xampp/htdocs/Serall/find/electr.php";

session_start();
if(isset($_SESSION["username"])){
    $username=$_SESSION["username"];
    $user_id=$_SESSION["user_id"];
    $sql= "INSERT INTO book (user_id, username, vendor_id, vendorname) VALUES (?, ?, ?, ?) ";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt){
            mysqli_stmt_bind_param($stmt, "isis", $param_user_id, $param_username,$param_vendor_id, $param_vendorname);
            //set these parameters
            $param_username = $username;
            $param_user_id = $user_id;
            $param_vendorname = $row_name[0];
            $param_vendor_id = $row_id[0];
                    
            //try to execute the query
            if (mysqli_stmt_execute($stmt)){
                echo '<script> alert("Booking Successful!!") </script>';
                //header("location: /Serall/find/mybook.php");
            }
            else{
                echo "Something went wrong... cannot redirect!";
            }
        }
        mysqli_stmt_close($stmt);

}

else{
    echo '<script> alert("Please Login to book !!") </script>';
    //header("location:C:/xampp/htdocs/Serall/login.php");
}
?>