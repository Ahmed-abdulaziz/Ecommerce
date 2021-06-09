<?php
ob_start();
 session_start(); 
$pagetitle = 'Confirmation';


    include "init.php";
    if(isset($_SESSION['fname'])){

    $IDD = $_SESSION['id'];

    $stmt1=$con->prepare("SELECT * FROM orders_deteils WHERE user_id =$IDD AND status = 1 AND completed = 0 ");
    $stmt1->execute();
    $orders = $stmt1->fetchAll();
    $count = $stmt1->rowCount();

    
    $stmt1=$con->prepare("SELECT * FROM users WHERE id =$IDD ");
    $stmt1->execute();
    $user = $stmt1->fetch();
    
      $row=select('*' , 'orders' , "WHERE user_id = $IDD AND status = 1  AND completed = 0");
    
    ?>

    <!-- slider Area Start-->
    <div class="slider-area ">
      <!-- Mobile Menu -->
      <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/category.jpg">
          <div class="container">
              <div class="row">
                  <div class="col-xl-12">
                      <div class="hero-cap text-center">
                          <h2>Confirmation</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- slider Area End-->

  <!--================ confirmation part start =================-->
        <?php if($count < 1){
          ?>
 <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
              <div class="col-lg-12">
              <div class="confirmation_tittle">
              <span>You UNSubmited Any Orders.</span>
              </div>
              </div>
      </div>
    </div>
  
 </section>

          <?php }else{?>
  <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="confirmation_tittle">
            <span>Thank you. Your order has been received.</span>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>order info</h4>
            <ul>
              <li>
                <p>order number </p><span>: <?php  echo $row['id'];?></span>
              </li>
              <li>
                <p>data</p><span>: <?php  echo $row['date'];?></span>
              </li>
              <li>
                <p>total</p><span>$ </span><span id="priceorder"></span>
              </li>
              <li>
                <p>mayment methord</p><span>: <?php  echo $row['payment'];?></span>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-lx-4">
          <div class="single_confirmation_details">
            <h4>Billing Address</h4>
            <ul>
              <li>
                <p>name</p><span>: <?php echo $user['fname']; echo " " ;echo $user['lname'];?></span>
              </li>
              <li>
                <p>city</p><span>: <?php echo $user['city'];?></span>
              </li>
              <li>
                <p>Address</p><span>:  <?php echo $user['country'];?></span>
              </li>
              <li>
                <p>postcode</p><span>:  <?php echo $user['zip'];?></span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="order_details_iner">
            <h3>Order Details</h3>
            <table class="table table-borderless">
              <thead>
                <tr>
                  <th scope="col" colspan="2">Product</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Total</th>
                </tr>
              </thead>
              <tbody>
              <?php
                   $total = 0;
              foreach($orders as $order){
                $total = $total + $order['priceofQuantity'];
                ?>
                <tr>
                  <th colspan="2"><span><?php echo  $order['text'];?></span></th>
                  <th><?php echo  $order['quantity'];?></th>
                  <th> <span>$ </span><span><?php echo $order['priceofQuantity'];?></span></th> 
                </tr>
              <?php }?>
                <tr>
                  <th colspan="3">Subtotal</th>
                  <th><span>$ </span> <span id="price"><?php echo  $total ;?></span></th>
                </tr>
              </tbody>
              <tfoot>
                <tr>
                  <th scope="col" colspan="3">Total</th>
                  <th scope="col"><span>$ </span> <?php echo  $total ;?></th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
              <?php }?>
  <!--================ confirmation part end =================-->

  <?php
      include "assets/includes/footer.php";
            
  ?>
  <script>
  
                  var priceorder  =document.getElementById('priceorder'),
                        price = document.getElementById('price');

                        priceorder.textContent = price.textContent;
  </script>

              <?php }else{
                
                echo "<div class = 'alert alert-danger container'>please login ..</div>";
                header("Refresh:3; url=login.php"); 

                ob_end_flush();
              }?>