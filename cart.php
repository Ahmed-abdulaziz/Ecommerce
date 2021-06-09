<?php
ob_start();
 session_start(); 
$pagetitle = 'Cart';

    include "init.php";
    if(isset($_SESSION['fname'])){
    $ID = $_SESSION['id'];
    $stmt=$con->prepare("SELECT * FROM orders_deteils WHERE user_id = $ID AND completed = 0 AND status = 0");
    $stmt->execute();
    $orders = $stmt->fetchAll();
    $x=$stmt->rowCount();

 if(isset($_GET['do'])){

  $do=$_GET['do'];
  if($do == 'delete'){

    $id_user=$_SESSION['id'];
    $id_product = $_GET['id_product'];
              
    $stmt=$con->prepare("SELECT * FROM orders_deteils WHERE user_id = ? AND id_product = ? ");
    $stmt->execute(array($id_user , $id_product));
    $row = $stmt->fetch();
    $count=$stmt->rowCount();        
    if($count>0){

    $stmt=$con->prepare("DELETE FROM orders_deteils WHERE user_id =  ? AND id_product = ?");
    $stmt->execute(array($id_user , $id_product));

    echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Deleted </div>";
    header("Refresh:2; url=cart.php");
    exit();
    }

}

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
                        <h2>Card List</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->

  <!--================Cart Area =================-->

  <?php if($x < 1){?>

    <section class="confirmation_part section_padding">
    <div class="container">
      <div class="row">
              <div class="col-lg-12">
              <div class="confirmation_tittle">
              <span>You Not Choose Any Orders.</span>
              </div>
              </div>
      </div>
    </div>
  
 </section>
  <?php }else{?>
  <section class="cart_area section_padding">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Controles</th>
               
              </tr>
            </thead>
            <tbody>
              <?php 
                  $total = 0;
              foreach($orders as $order){

                      $total = $total + $order['priceofQuantity'];
                ?>
                <input type="text" id="num" hidden value="<?php echo $x; ?>">
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="assets/img/<?php echo  $order['image'];?>" alt="" />
                    </div>
                    <div class="media-body">
                 <a href="single-product.php?id=<?php echo $order['id_product']?>&table=products&quantity=<?php echo $order['quantity'];?>"><p><?php echo  $order['text'];?></p></a>  
                    </div>
                  </div>
                </td>
               
                <td>
                  <div class="product_count">
                  <?php echo  $order['quantity'];?>
                  </div>
                </td>
                <td>
                 <span style="display: inline;">$</span><div style="display: inline;" id="price"><?php echo  $order['priceofQuantity'];?></div>
                  <input type="text" id="prices" hidden value="<?php echo $order['priceofQuantity']; ?>">
                <!-- <a href="single-product.php?id=<?php echo $order['id_product']?>&table=products&quantity=<?php echo $order['quantity'];?>"> <button type="button" class=" btn-info x2">Edit</button></a>  -->
                  
                </td>
                <td>
                 <h5> <a href="cart.php?do=delete&id_product=<?php echo $order['id_product'];?>"><button type="button" class=" btn-danger"><i class="fas fa-trash"></i> Delete</button></a> </h5><br>
                 <h5><a href="single-product.php?id=<?php echo $order['id_product']?>&table=products&quantity=<?php echo $order['quantity'];?>"> <button type="button" class=" btn-info"><i class="fas fa-edit"></i> Edit</button></a> </h5

                </td>
              </tr>
              <?php }?>
              <tr>
                <td></td>
                
             
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                 <h5><div id="total">  <span>$</span> <?php echo  $total;?></div></h5>
                </td>
                <td></td>
              
              </tr>
            
            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="index.php">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="checkout.php">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>
 <!--================login_part end =================-->
 <?php
  }    
      include "assets/includes/footer.php";
    }else{
      echo "<div class = 'alert alert-danger container'>please login ..</div>";
      header("Refresh:3; url=login.php"); 
    
  }
  ob_end_flush();
  ?>
