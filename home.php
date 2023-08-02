<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="icon" href="images/icon.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body> 

    <section class="home">
        <header>
          <h2><a href="home.php" class="logo">Logo</a></h2>
          <div class="navigation">
               
            <?php
                //script will handle login
                session_start();
                //check if user is already logged in
                if(isset($_SESSION['username'])){
                  echo"<a href='logout.php'>Logout</a>";
                }
                if(isset($_SESSION['vendorname'])){
                  echo"<a href='vendor_logout.php'>Logout</a>";
                }
                else{
                  echo "<a href='login.php'>Login/Signup</a>            
                        <a href='vendor_login.php'>Vendor Login/Signup</a> ";
                }
            ?>
          </div>
        </header>

        <div class="content">
      <div class="info">
        <h2>Serall<br></h2>
        <h3>
          <!-- <div class="animated-text">
            <div class="line">Need Service at home?</div>
            <div class="line">Don't want to search anymore?</div>
            <div class="line">Best service at your fingertip</div>
            <div class="line">The person you trust</div>
          </div> -->

          <div class="scroller">
            <span class="scrol-content">
              Need Service at home?<br />
              Don't want to search anymore?<br />
              Best service at your fingertip<br />
              The person you trust
            </span>
          </div>

        </h3>

        <p>my content Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam atque in consequatur doloremque
          dolore culpa iste quidem cupiditate, maxime autem!</p>
        <a class="btn btn-primary" href="categories.php">View Services</a>
      </div>
    </div>

    <div class="media-icons">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>


  </section>

  <section class="about">
    <div class="step-container">

      <h1 class="heading animate__animated animate__zoomIn ">how it <span>works</span></h1>

      <div class="steps">

        <div class="box">
          <img src="images/location.png" alt="">
          <h3>choose your location</h3>
        </div>
        <div class="box">
          <img src="images/service.png" alt="">
          <h3>select the service provider</h3>
        </div>
        <div class="box">
          <img src="images/schedule.png" alt="">
          <h3>book an appointment</h3>
        </div>


      </div>

    </div>
  </section>


  <section class="vision">
    <!-- <h1 class="heading">Changing small to big</h1>

    <div class="container" >
      <div class="content-section">
        <div class="content">
         
          <h3>Lets be vocal for locals</h3>
          <p>We support and applaud the Hon'ble Prime Minister on the Atmanirbhar Bharat Abhiyan Package to strengthen the Indian economy.</p>
          </div>
        </div>
        <div class="image-section">
          <img src="/images/e1.png ">
        </div>
    </div>



    <div class="container">
      <div class="content-section content-section1">
        <div class="content">
          
          <h3>Lorem ipsum dolor sit amet, consectetur adipisicing</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tem.</p>
        </div>
      </div>
      <div class="image-section image-section1 ">
        <img src="/images/e2.jpg">
      </div>
    </div> -->


    <h1 class="heading">Changing small to big</h1>
    <div class="wrapper1">
      
      <!-- <div class="background-container">
        <div class="bg-1"></div>
        <div class="bg-2"></div>
        
      </div> -->
      <div class="about-container">
          
          <div class="image-container">
              <img src="images/e1.png" alt="">
              
          </div>

          <div class="text-container">
              <h1>Lets be vocal for locals</h1>
              <p>We support and applaud the Hon'ble Prime Minister on the <h3>"Atmanirbhar Bharat Abhiyan"</h3> Package to strengthen the Indian economy.</p>
              
          </div>
          
      </div>
  </div>
    



  </section>

    
<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>

