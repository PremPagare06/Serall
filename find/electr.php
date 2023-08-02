<?php
require_once "C:/xampp/htdocs/Serall/config.php";


$sql = "SELECT * FROM vendors WHERE occupation = 'Electrician' ";
$stmt = mysqli_prepare($conn, $sql);
$result=mysqli_stmt_execute($stmt);

if($result==true){
    mysqli_stmt_bind_result($stmt,$vendor_id, $name, $vendorname, $password, $mobileno, $occupation, $address, $pincode, $date);
    $i= 0;
    while(mysqli_stmt_fetch($stmt)){
        $row_id[$i]=$vendor_id;
        $row_name[$i]= $name;
        $row_mobileno[$i]= $mobileno;
        $row_address[$i]= $address;
        $row_pincode[$i]= $pincode;
        $i++;
    }
}

?>