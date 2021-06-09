<?php
ob_start();
 session_start(); 
 $pagetitle = 'Product Details';
 if(isset($_SESSION['fname'])){

    include "init.php";
if(isset($_GET['id'])  && isset($_GET['table'])){
  $ID=$_GET['id'];
  $table=$_GET['table'];
}else{
  header("Location: product_list.php");
}
   

    $quantity = 1;
    if(isset($_GET['quantity'])){
      $quantity = $_GET['quantity'];
    }
    
    $stmt=$con->prepare("SELECT * FROM $table WHERE id = $ID");
    $stmt->execute();
    $products = $stmt->fetchAll();
    
    if(isset($_POST['send'])){

      $email=$_POST['email'];
      $check= checkitem('email' ,'email_latestoffers' ,$email );

      if($check >= 1){

          echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
          header("Refresh:4; url=single-product.php");
          exit();
     
      }else{
          $stmt=$con->prepare("INSERT INTO email_latestoffers (email) VALUES (:zemail)");
          $stmt->execute(array(
              'zemail'   =>  $email,
          ));
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
                            <h2>product Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

  <!--================Single Product Area =================-->
  <div class="product_image_area">
    <div class="container">
    <?php foreach($products as $product){?>
      <input type="text" id="idd" hidden value="<?php echo $product['id']?>">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="product_img_slide owl-carousel">
            <div class="single_product_img">
              <img src="assets/img/<?php echo $product['image']?>" alt="#" class="img-fluid">
              <input type="text" id="image" hidden value="<?php echo $product['image']?>">
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="single_product_text text-center">
            <h3><?php echo $product['text']?></h3>
            <input type="text" id="text" hidden value="<?php echo $product['text']?>">
            <p>
                Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness. Credibly innovate granular internal or organic sources whereas high standards in web-readiness. Energistically scale future-proof core competencies vis-a-vis impactful experiences. Dramatically synthesize integrated schemas. with optimal networks.
            </p>
            <div class="card_area">
                <div class="product_count_area">
                    <p>Quantity</p>
                    <div class="product_count d-inline-block">
                        <span class="product_count_item inumber-decrement" onclick="dec()" > <i class="ti-minus"></i></span>
                        <input class="product_count_item input-number" id="qunt" type="number" value="<?php echo $quantity;?>" min="1" max="10">
                        <span class="product_count_item number-increment" onclick="inc()" > <i class="ti-plus"></i></span>
                    </div>
                    <input hidden id="price" value= "<?php echo $product['price'];?>">
                    <span>$</span> <div id="show"><?php echo $product['price'];?></div>
                </div>
              <div class="add_to_cart">
               
                <input type="text" hidden  id="pricetotal" name="pricetotal">
              <button class="btn_3" id="okk">add to cart</button>
                
              
                
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
    </div>
  </div>
  <!--================End Single Product Area =================-->
   <!-- subscribe part here -->
   <section class="subscribe_part section_padding">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="subscribe_part_content">
                      <h2>Get promotions & updates!</h2>
                      <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                      <div class="subscribe_form">
                      <form method="POST">
                            <input type="email" name="email" placeholder="Enter your mail">
                            <button name="send" class="btn_1">subscribe</button>
                            </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- subscribe part end -->

  <?php
      include "assets/includes/footer.php";

  ?>
 
   <script>

          var quent      = document.getElementById('qunt').value,  // counter of product
              price      = document.getElementById('price'),      // price of product in input hidden
              Showprice  = document.getElementById('show'),       //price of product in input 
              text = document.getElementById('text').value,       // text of product
              idd = document.getElementById('idd').value,         // id of product
              image = document.getElementById('image').value,     // image of product
              orignalPrice = price.value;
               
                 var totalprice = quent * price.value;
              function inc(){

                 
                if(quent >= 1 && quent < 10 ){
                    quent ++;
                    
                    var total = quent * price.value;
                    Showprice.textContent = total;
                
                    totalprice  = total;
                    console.log(totalprice);
                    console.log(quent);
                    console.log(image);
                    console.log(idd);
                    console.log(text);
                }
                    
                }
                
               
      
            function dec(){

                  if(quent > 1){
                      quent --;
                      
                    var total = quent * (price.value);
                    Showprice.textContent  = total;

                    totalprice = total;

                    console.log(totalprice);
                    console.log(quent);
                    console.log(image);
                    console.log(idd);
                    console.log(text);
                   }else{
                   
                    var total = quent * (price.value);
                    Showprice.textContent  = total;

                    totalprice = total;
                    console.log(totalprice);
                    console.log(quent);
                    console.log(image);
                    console.log(idd);
                    console.log(text);
                  }
                  console.log(totalprice);
                    console.log(quent);
                    console.log(image);
                    console.log(idd);
                    console.log(text);
                }
      
                 
                 $(function(){
               
             
                        $("#okk").on('click',function(){
                        $.post('auth.php' ,{price: totalprice ,pbm:orignalPrice, quantity:quent , image:image , id_product:idd , name:text} ,function(one , tow ,three){
                        console.log(one);
                        console.log(tow);
                        console.log(three);
                        window.location.href = 'cart.php';
                        });
                        });
                         
                    });
              



  </script>

                  <?php }else{
                       echo "<div class='alert alert-danger container'>Please Login ....</div>";
                       header("Refresh:4; url=login.php");
                       exit();
                  
                  }
                  ob_end_flush();
                  ?>