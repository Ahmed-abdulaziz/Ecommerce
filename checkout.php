<?php
ob_start();
 session_start(); 
$pagetitle = 'CheckOut';


    include "init.php";
    $oredernumber= 0;
    $IDD = $_SESSION['id'];
    if(isset($_POST['send'])){
      
      $selector = $_POST['selector'];
      $stmt=$con->prepare("UPDATE orders SET  payment = ? , date = now() , status = 1 WHERE user_id = ?");
      $stmt->execute(array($selector,$IDD));

      $stmt=$con->prepare("UPDATE orders_deteils SET  status = 1 WHERE user_id = ?");
      $stmt->execute(array($IDD));

      echo "<div class = 'alert alert-success container'>Order IS submited</div>";
      header("Refresh:3; url=confirmation.php");
      exit();
    }
    
    
    ?>


  <!-- slider Area Start-->
  <div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/category.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Checkout Area =================-->
  <section class="checkout_area section_padding">
    <div class="container">
    <?php if(!isset($_SESSION['fname'])){?>
      <div class="returning_customer">
        <div class="check_title">
          <h2>
            Returning Customer?
            <a href="#">Click here to login</a>
          </h2>
        </div>
        <p>
          If you have shopped with us before, please enter your details in the
          boxes below. If you are a new customer, please proceed to the
          Billing & Shipping section.
        </p>
        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
          <div class="col-md-6 form-group p_star">
            <input type="text" class="form-control" id="name" name="name" value=" " />
            <span class="placeholder" data-placeholder="Username or Email"></span>
          </div>
          <div class="col-md-6 form-group p_star">
            <input type="password" class="form-control" id="password" name="password" value="" />
            <span class="placeholder" data-placeholder="Password"></span>
          </div>
          <div class="col-md-12 form-group">
            <button type="submit" value="submit" class="btn_3">
              log in
            </button>
            <div class="creat_account">
              <input type="checkbox" id="f-option" name="selector" />
              <label for="f-option">Remember me</label>
            </div>
            <a class="lost_pass" href="#">Lost your password?</a>
          </div>
        </form>
      </div>
  
      <div class="cupon_area">
        <div class="check_title">
          <h2>
            Have a coupon?
           
          </h2>
        </div>
        <input type="text" placeholder="Enter coupon code" />
        <a class="tp_btn" href="#">Apply Coupon</a>
      </div>
    <?php }?>
    <div class="order_box col-lg-12">
              <form method="post">
              <div class="payment_item">
              <h3>Payment</h3>
                <div class="radion_btn">
                
                  <input type="radio" id="f-option5" name="selector" value="cash on delivery" />
                  <label for="f-option5">cash on delivery</label>
                  <div class="check"></div>
                </div>
                <p>
                     cash on delivery product
                </p>
              </div>
              
              <div class="payment_item active">
                <div class="radion_btn">
                  <input type="radio" id="f-option6" name="selector" value="paypal" />
                  <label for="f-option6">Paypal </label>
                  <img src="assets/img/card.jpg" alt="" />
                  <div class="check"></div>
                </div>
                <p>
                  Please send a check to Store Name, Store Street, Store Town,
                  Store State / County, Store Postcode.
                </p>
              </div>
              
              <button name="send" class="btn_1">Submit Order</button>
              </form>
              </div>
    </div>
  </section>
  <!--================End Checkout Area =================-->


  <?php
  ob_end_flush();
      include "assets/includes/footer.php";
  ?>