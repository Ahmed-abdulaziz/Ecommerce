<?php
ob_start();
 session_start(); 
$pagetitle= 'Catagori';
    include "init.php";
    $stmt=$con->prepare("SELECT * FROM slider Where pagename = 'Catagori'");
    $stmt->execute();
    $rows = $stmt->fetchAll();

   
    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $check= checkitem('email' ,'email_latestoffers' ,$email );

        if($check >= 1){

            echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
            header("Refresh:4; url=catagori.php");
            exit();
       
        }else{
            $stmt=$con->prepare("INSERT INTO email_latestoffers (email) VALUES (:zemail)");
            $stmt->execute(array(
                'zemail'   =>  $email,
            ));
        }
      
      
    }

?>  


    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <?php foreach($rows as $row){?>
            <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/<?php echo $row['image'];?>">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2><?php echo $row['htext'];?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <!-- slider Area End-->

        <!-- Latest Products Start -->
        <section class="latest-product-area latest-padding">
            <div class="container">
                <div class="row product-btn d-flex justify-content-between">
                        <div class="properties__button">
                            <!--Nav Button  -->
                            <nav>                                                                                                
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-new" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Featured</a>
                                    <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Offer</a>
                                </div>
                            </nav>
                            <!--End Nav Button  -->
                        </div>
                        <div class="select-this d-flex">
                            <div class="featured">
                                <span>Short by: </span>
                            </div>
                            <form action="#">
                                <div class="select-itms">
                                    <select name="select" id="select1">
                                        <option value="">Featured</option>
                                        <option value="">Featured A</option>
                                        <option value="">Featured B</option>
                                        <option value="">Featured C</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                </div>
                <!-- Nav Card -->
                <?php
                      $stmt1=$con->prepare("SELECT * FROM products ");
                      $stmt1->execute();
                      $lastes = $stmt1->fetchAll();
                ?>
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                        <?php foreach($lastes as $last){?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="assets/img/<?php echo $last['image'];?>" alt="">
                                        <div class="new-product">
                                            <span>New</span>
                                        </div>
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                            <?php for($i=0 ; $i < $last['star']; $i++){?>
                                                <i class="fas fa-star"></i>
                                            <?php }?>
                                        </div>
                                        <h4><a href="single-product.php?id=<?php echo $last['id'];?>&table=products"><?php echo $last['text'];?></a></h4>
                                        <div class="price">
                                            <ul>
                                               <span>$</span> <li><?php echo $last['price'];?></li>
                                               <?php if($last['discount'] > 0){?>
                                                <li class="discount"><span>$</span> <?php echo $last['discount'];?></li>
                                            <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php     
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE  type = 'new'");
                            $stmt1->execute();
                            $new = $stmt1->fetchAll();
                            
                            ?>
                    <div class="tab-pane fade" id="nav-new" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="row">
                        <?php foreach($new as $new){
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="assets/img/<?php echo $new['image'];?>" alt="">
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                        <?php for($i=0 ; $i < $new['star']; $i++){?>
                                                <i class="fas fa-star"></i>
                                            <?php }?>
                                        </div>
                                        <h4><a href="single-product.php?id=<?php echo $new['id'];?>&table=products"><?php echo $new['text'];?></a></h4>
                                        <div class="price">
                                            <ul>
                                               <span>$</span> <li><?php echo $new['price'];?></li>
                                               <?php if($new['discount'] > 0){?>
                                                <li class="discount"><span>$</span> <?php echo $new['discount'];?></li>
                                            <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <!-- Card three -->
                    <?php     
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE  type = 'Featured'");
                            $stmt1->execute();
                            $Featured = $stmt1->fetchAll();
                            
                            ?>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row">
                        <?php foreach($Featured as $Featur){
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="assets/img/<?php echo $Featur['image'];?>" alt="">
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                        <?php for($i=0 ; $i < $Featur['star']; $i++){?>
                                                <i class="fas fa-star"></i>
                                            <?php }?>
                                        </div>
                                        <h4><a href="single-product.php?id=<?php echo $Featur['id'];?>&table=products"><?php echo $Featur['text'];?></a></h4>
                                        <div class="price">
                                            <ul>
                                            <span>$</span> <li><?php echo $Featur['price'];?></li>
                                            <?php if($Featur['discount'] > 0){?>
                                                <li class="discount"><span>$</span> <?php echo $Featur['discount'];?></li>
                                            <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                                        <?php }?>
                        </div>
                    </div>
                    <!-- card foure -->
                    <?php     
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE  type = 'offer'");
                            $stmt1->execute();
                            $offer = $stmt1->fetchAll();
                            
                            ?>
                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                        <div class="row">
                        <?php foreach($offer as $offer){
                            ?>
                            <div class="col-xl-4 col-lg-4 col-md-6">
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img src="assets/img/<?php echo $offer['image'];?>" alt="">
                                    </div>
                                    <div class="product-caption">
                                        <div class="product-ratting">
                                        <?php for($i=0 ; $i < $offer['star']; $i++){?>
                                                <i class="fas fa-star"></i>
                                            <?php }?>
                                        </div>
                                        <h4><a href="single-product.php?id=<?php echo $offer['id'];?>&table=products"><?php echo $offer['text'];?></a></h4>
                                        <div class="price">
                                            <ul>
                                            <span>$</span> <li><?php echo $offer['price'];?></li>
                                            <?php if($offer['discount'] > 0){?>
                                                <li class="discount"><span>$</span> <?php echo $offer['discount'];?></li>
                                            <?php }?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                                        <?php }?>
                           
                        </div>
                    </div>
                </div>
                <!-- End Nav Card -->
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- Latest Products End -->

        <!-- Latest Offers Start -->
        <div class="latest-wrapper lf-padding">
            <div class="latest-area latest-height d-flex align-items-center" data-background="assets/img/latest-offer.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-xl-5 col-lg-5 col-md-6 offset-xl-1 offset-lg-1">
                            <div class="latest-caption">
                                <h2>Get Our<br>Latest Offers News</h2>
                                <p>Subscribe news latter</p>
                            </div>
                        </div>
                            <div class="col-xl-5 col-lg-5 col-md-6 ">
                            <div class="latest-subscribe">
                                <form method="post">
                                    <input type="email" name="email" placeholder="Your email here">
                                    <button name="send">Shop Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- man Shape -->
                <div class="man-shape">
                    <img src="assets/img/latest-man.png" alt="">
                </div>
            </div>
        </div>
        <!-- Latest Offers End -->
    </main>
    <?php
    ob_end_flush();
      include "assets/includes/footer.php";
  ?>