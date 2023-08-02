<!DOCTYPE html>
<html>
<head>
    <title>Categories</title>
    <link rel="icon" href="images/icon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="category.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body> 

    <section class="categories">
        <header>
          <h2><a  >Categories</a></h2>
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
        
          
        <div class="media-icons">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
        </div>

    
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left: 125px; margin-right: -240px;margin-top:2px">
            <!-- Electrician -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                <img src="images/electrician.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Electrician</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        
                    </div>
                    <div class="card-footer">
                            <a href="find/electrician.php" class="btn btn-primary">View</a>
                        </div>
                </div>
            </div>
            <!--Movers -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                    <img src="images/delivery-courier.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Movers</h5>  
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        
                    </div>
                    <div class="card-footer">
                            <a href="find/mover.php" class="btn btn-primary">View</a>
                        </div>
                </div>
            </div>
           

            <!-- Laundry -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                    <img src="images/housekeeper.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Laundry</h5>  
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                        
                    </div>
                    <div class="card-footer">
                            <a href="find/laundry.php" class="btn btn-primary">View </a>
                        </div>
                </div>
            </div>
        </div>
           
        <div class="row row-cols-1 row-cols-md-3 g-4" style="margin-left: 125px; margin-right: -240px;margin-top:2px">
            

            <!-- Painting  -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                    <img src="images/painter.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Painting</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                            
                        </div>
                        <div class="card-footer">
                            <a href="find/painting.php" class="btn btn-primary">View</a>
                        </div>
                       
                </div>
            </div>
            <!-- Housekeeping -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                    <img src="images/housekeeping.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title">Housekeeping</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                        <a href="find/housekeeping.php" class="btn btn-primary">View</a>
                    </div>
                    
                </div>
            </div>
            <!-- Plumber -->
            <div class="col" style="width:25%">
                <div class="card h-100">
                    <img src="images/plumber.png" class="card-img-top" style="width:15rem; height:15rem; align:center; margin-left:auto; margin-right:auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Plumber</h5>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                        </div>
                        <div class="card-footer">
                            <a href="find/plumber.php" class="btn btn-primary">View</a>
                        </div>
                </div>
            </div>
        </div>
    
    </section>



   
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>