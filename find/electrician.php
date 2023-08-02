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


<!DOCTYPE html>
<html>

<head>
    <title>Electrician</title>
    <link rel="icon" href="/Serall/images/icon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="find.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>

    <section class="home">
        <header>
            <h2><a href="home.php" class="logo">Logo</a></h2>
            <div class="navigation">
            <a href="/Serall/home.php">Home</a>
            <?php
                //script will handle login
                session_start();
                //check if user is already logged in
                if(isset($_SESSION['username'])){
                  echo"<a href='/Serall/logout.php'>Logout</a>";
                }
                if(isset($_SESSION['vendorname'])){
                  echo"<a href='/Serall/vendor_logout.php'>Logout</a>";
                }
                else{
                  echo "<a href='/Serall/login.php'>Login/Signup</a>            
                        <a href='/Serall/vendor_login.php'>Vendor Login/Signup</a> ";
                }
            ?>    
              
            </div>
        </header>



        <!-- popular section starts  -->

        <section class="popular" id="popular">

            <h1 class="heading"> All <span>Professionals</span> Near You </h1>

            <div class="box-container">
                

            <?php
                if(sizeof($row_name)==0){
                    echo '<h3 class="heading"> No <span>Professionals</span> Available Currently</h3>';

                }
                else{
                    for($i=0; $i<sizeof($row_name); $i++){
                        echo'
                    <div class="box">
                        <span class="price"> ₹100 - ₹150 </span>
                        <img src="/Serall/images/e3.jpg" alt="">
                        <h3>'.$row_name[$i].'</h3>

                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="description">
                            <p>More than 20 years of experience and good customer satisfaction. On time work completion.</p><br>
                            <div class="contact">
                                <div class="contact-item">
                                    <i class="fa-solid fa-phone"></i>
                                    <p>'.$row_mobileno[$i].'</p>
                                </div>
                                <div class="contact-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p>'.$row_address[$i].'- '.$row_pincode[$i].'</p>
                                </div>

                            </div>

                        </div>
                        <a  href="#" class="btn1" >Book Appointment</a>
                    </div>';
                    }
                }
            ?>

               
                    

            </div>

        </section>

        <!-- popular section ends -->


    </section>


    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>

</html>

