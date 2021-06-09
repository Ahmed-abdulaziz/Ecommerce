<?php
ob_start();
 session_start(); 
$pagetitle = 'Edit Profile';

    include "init.php";
if(isset($_SESSION['fname'])){
  
    $IDD  = $_SESSION['id'];
    $stmt1=$con->prepare("SELECT * FROM users WHERE id =$IDD");
    $stmt1->execute();
    $user = $stmt1->fetch();


if(isset($_POST['send'])){


    $fname    = $_POST['fname'];
    $lname    = $_POST['lname'];
    $email    = $_POST['email'];
    $address  = $_POST['address'];
    $city     = $_POST['city'];
    $country  = $_POST['country'];
    $zip      = $_POST['zip'];
    $phone    = $_POST['phone'];

              $stmt=$con->prepare("UPDATE users SET fname = ? , lname = ?,email = ? ,Address = ? ,city = ? , country = ? , zip = ? , phone = ?   WHERE id = ? ");
                 $stmt->execute(array($fname, $lname ,$email , $address , $city , $country ,  $zip ,$phone , $IDD ));

                 echo "<div class = 'alert alert-success container'>Edit is success</div>";
                 header("Refresh:3; url=editprofile.php");
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
          <h2 class="form-title">Edit  account</h2>
            <form class="row contact_form" method="post" validate="validate">
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="first" placeholder="First name" name="fname" value="<?php echo $user['fname'];?>" required = "required"/>
                
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control" id="last" placeholder="Last name" name="lname" value="<?php echo $user['lname'];?>" required = "required" />
               
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="text" class="form-control"  id="number" placeholder="Phone" name="phone" value="<?php echo $user['phone'];?>" required = "required"/>
                
              </div>
              <div class="col-md-6 form-group p_star">
                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $user['email'];?>" required = "required" />
                
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="add1" placeholder="Address" name="address" value="<?php echo $user['Address'];?>" required = "required" />
               
              </div>
              <div class="col-md-12 form-group p_star">
                <input type="text" class="form-control" id="city" placeholder="City" name="city" value="<?php echo $user['city'];?>" required = "required" />
                
              </div>
              <div class="col-md-12 form-group p_star">
              <input type="text" class="form-control" id="District" placeholder="country" name="country" value="<?php echo $user['country'];?>"required = "required" />
                
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP" value="<?php echo $user['zip'];?> " required ="required" />
              </div>
              <div class="order_box col-lg-12">
              
              <button name="send" class="btn_1">Edit</button>
              </div>
            </form>
          </div>
        
        </div>
      </div>
                </div>
            </div>
        </section>

    </div>

    <?php
      include "assets/includes/footer.php";
    }else{
        header('Location: login.php');
    }
    ob_end_flush();
  ?>