<?php
ob_start();
 session_start(); 
$pagetitle = 'Sign UP';

    include "init.php";

    if(isset($_POST['send'])){
       
      $fname    = $_POST['fname'];
      $lname    = $_POST['lname'];
      $phone    = $_POST['phone'];
      $email    = $_POST['email'];
      $password = sha1($_POST['pass']);
      $address  = $_POST['address'];
      $city     = $_POST['city'];
      $country = $_POST['country'];
      $zip      = $_POST['zip'];
      

        $stmt=$con->prepare("INSERT INTO users (fname , lname ,email , password , Address ,city , country , zip , phone ) 
        VALUES (:zfname , :zlname ,:zemail , :zpass ,:zAddress ,:zcity , :zcountry , :zzip , :zphone )");
        $stmt->execute(array(
            'zfname'          => $fname,
            'zlname'          =>  $lname,
            'zemail'          =>  $email,
            'zpass'           => $password,
            'zAddress'        =>  $address,
            'zcity'           =>  $city,
            'zcountry'        => $country,
            'zzip'            =>  $zip,
            'zphone'          =>  $phone,
        ));

        echo "<div class = 'alert alert-success container'>Can You Login Now</div>";
        header("Refresh:3; url=login.php");
        exit();
    }
         
    
    ?>
<body>

    <div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
              
                <div class="billing_details">
        <div class="row">
          <div class="col-lg-12">
          <h2 class="form-title">Create account</h2>
            <form class="row contact_form" method="post" validate="validate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" placeholder="First name" name="fname" required = "required" />
               
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" placeholder="last name" name="lname" required = "required" />
              
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control"  id="number" placeholder="Phone" name="phone" required = "required" />
           
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" required = "required" />
                
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="password" class="form-control" id="password" placeholder="Password" name="pass" required = "required" />
            
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" placeholder="Address" name="address" required = "required" />
               
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" name="city" placeholder="City" required = "required" />
              
              </div>
              <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="District" placeholder="Country" name="country" required = "required" />
                
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" placeholder="Zip Code" name="zip" placeholder="Postcode/ZIP" required = "required" />
              </div>
              <div class="order_box col-lg-12">
              
              <button name="send" class="btn_1">SIGN UP</button>
              </div>
            </form>
          </div>
        
        </div>
      </div>
                    <p class="loginhere">
                        Have already an account ? <a href="login.php" class="loginhere-link">Login here</a>
                    </p>
                </div>
            </div>
        </section>

    </div>

    <?php
      include "assets/includes/footer.php";
      ob_end_flush();
  ?>