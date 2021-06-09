<?php
ob_start();
session_start(); 
$pagetitle = 'Aman';

    include "init.php";
 
    $stmt=$con->prepare("SELECT * FROM slider Where pagename = 'Aman'");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    $r=$stmt->rowCount();

    $stmt1=$con->prepare("SELECT * FROM categories");
    $stmt1->execute();
    $cats = $stmt1->fetchAll();

    $stmt1=$con->prepare("SELECT * FROM products  ORDER BY id DESC  LIMIT 9");
    $stmt1->execute();
    $products = $stmt1->fetchAll();
    
    $stmt1=$con->prepare("SELECT * FROM products WHERE assort = 'latest' ORDER BY id DESC  LIMIT 9");
    $stmt1->execute();
    $lastes = $stmt1->fetchAll();

    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $check= checkitem('email' ,'email_latestoffers' ,$email );

        if($check >= 1){
            echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
            header("Refresh:4; url=index.php");
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

        <!-- slider Area Start -->
      <!-- slider Area Start -->
      <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
  

                                            <!--Carousel Wrapper-->
                                            <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
                                                    <!--Indicators-->
                                                            <ol class="carousel-indicators">
                                                            <?php
                                                                     $x = 0;
                                                                    $check = checkitem('*' ,'slider' ,'WHERE pagename = "Aman"');
                                                                    for($i = 0 ; $i < $check ; $i++ ){
                                                                        if($x == 0){
                                                                            $z = 'active';
                                                                        }else{
                                                                            $z='';
                                                                        }
                                                            ?>
                                                                <li data-target="#carousel-example-2" data-slide-to="<?php echo $i;?>" class="<?php echo $z;?>"></li>
                                                              
                                                                    <?php 
                                                                $x++;
                                                                }?>
                                                            </ol>
                                                            <!--/.Indicators-->
                                                            <!--Slides-->
                                                            <div class="carousel-inner" role="listbox">
                                                            <?php 
                                                                    $x = 0;
                                                                    $rows=selectall('*' , 'slider' , 'WHERE pagename = "Aman"');
                                                                    foreach($rows as $row){
                                                                        
                                                                        if($x == 0){
                                                                            $z = 'active';
                                                                        }else{
                                                                            $z='';
                                                                        }
                                                            
                                                            ?>
                                                            <div class="carousel-item <?php echo $z;?>">
                                                            <div class="view">
                                                                <img class="d-block w-100" src="assets/img/<?php echo $row['image'];?>"
                                                                alt="First slide">
                                                                <div class="container slide">
                                    <div class="row d-flex align-items-center justify-content-between">
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-none d-md-block">
                                            <div  data-animation="bounceIn" data-delay=".4s">
                                                <h1 class="slider">AMAN</h1>
                                                </div>
                                                </div>

                                                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-8">
                                                <div class="hero__caption">
                                                <span data-animation="fadeInRight" data-delay=".4s">60% Discount</span>
                                                <h1 data-animation="fadeInRight" data-delay=".6s"><?php echo $row['htext'];?></h1>
                                                <p data-animation="fadeInRight" data-delay=".8s"><?php echo $row['text'];?></p>
                                                <!-- Hero-btn -->
                                                <div class="hero__btn" data-animation="fadeInRight" data-delay="1s">
                                                <a href="product_list.php" class="btn hero-btn">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                </div>
                            </div>
                                                            </div>
                                                                    <?php 
                                                                        $x++;
                                                                }?>
                                                            </div>
                                                            <!--/.Slides-->
                                                            <!--Controls-->
                                                            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                            <span class="sr-only">Next</span>
                                                            </a>
                                                    <!--/.Controls-->
                                                    </div>
                                                    <!--/.Carousel Wrapper-->
    
                            
        </div>
    

        </div>
                                <!-- Catigori -->



                        <!--Slides-->
                <div class="carousel-inner container" role="listbox">
                        <h3>categories</h3>
                        <?php foreach($cats as $cat){ ?>
                            <a href="product_list.php?do=<?php echo $cat['name'];?>&#list">
                                
                                    <div class="col-md-3" style="float:left;border:none">
                                        <div class="card mb-2" >
                                            <div class="card-body btn btn-primary">
                                            <h4 class="card-title"><?php echo $cat['name'];?></h4>
                                        </div>
                                        </div>
                                    </div>

                            </a>
                        <?php }?>
                </div>
<!--/.Slides-->

<!--/.Carousel Wrapper-->
        <!-- slider Area End-->
        <!-- Category Area Start-->
        <section class="category-area section-padding30">
            <div class="container-fluid">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center mb-85">
                            <h2>Shop by Category</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach($products as $product){?>
                    <div class="col-xl-4 col-lg-6" >
                        <div class="single-category mb-30">
                            <div class="category-img" >
                                <img style="max-height: 310px;background-size:cover;object-fit: cover;" src="assets/img/<?php echo $product['image'];?>" alt="">
                                <div class="category-caption">
                                    <h2><?php echo $product['text'];?></h2>
                                    <span class="best"><a href="single-product.php?id=<?php echo $product['id'];?>&table=products">Buy now</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
             
                </div>
            </div>
        </section>
        <!-- Category Area End-->
        <!-- Latest Products Start -->
        <section class="latest-product-area padding-bottom">
            <div class="container">
                <div class="row product-btn d-flex justify-content-end align-items-end">
                    <!-- Section Tittle -->
                    <div class="col-xl-4 col-lg-5 col-md-5">
                        <div class="section-tittle mb-30">
                            <h2>Latest Products</h2>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-7">
                        <div class="properties__button f-right">
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
                    </div>
                </div>
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="row">
                        <?php foreach($lastes as $last){?>
                            <div class="col-xl-4 col-lg-4 col-md-6" >
                                <div class="single-product mb-60">
                                    <div class="product-img">
                                        <img  style="max-height: 250px;object-fit: cover;" src="assets/img/<?php echo $last['image'];?>" alt="">
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
                    <!-- Card two -->
                            <?php     
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE assort = 'latest' AND type = 'new' ORDER BY id DESC LIMIT 9");
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
                                        <img style="max-height: 250px;object-fit: cover;" src="assets/img/<?php echo $new['image'];?>" alt="">
                                        <div class="new-product">
                                            <span>New</span>
                                        </div>
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
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE assort = 'latest' AND type = 'Featured' ORDER BY id DESC LIMIT 9 ");
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
                                        <img style="max-height: 250px;object-fit: cover;" src="assets/img/<?php echo $Featur['image'];?>" alt="">
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
                            
                            $stmt1=$con->prepare("SELECT * FROM products  WHERE assort = 'latest' AND type = 'offer' ORDER BY id DESC LIMIT 9 ");
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
                                        <img style="max-height: 250px;object-fit: cover;" src="assets/img/<?php echo $offer['image'];?>" alt="">
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
            </div>
        </section>
        <!-- Latest Products End -->
        <!-- Best Product Start -->
        <div class="best-product-area lf-padding" >
           <div class="product-wrapper bg-height" style="background-image: url('assets/img/card.png')">
                <div class="container position-relative">
                    <div class="row justify-content-between align-items-end">
                        <div class="product-man position-absolute  d-none d-lg-block">
                            <img src="assets/img/categori/card-man.png" alt="">
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-2 d-none d-lg-block">
                            <div class="vertical-text">
                                <span>Manz</span>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8">
                            <div class="best-product-caption">
                                <h2>Find The Best Product<br> from Our Shop</h2>
                                <p>Designers who are interesten creating state ofthe.</p>
                                <a href="#" class="black-btn">Shop Now</a>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <!-- Shape -->
           <div class="shape bounce-animate d-none d-md-block">
               <img src="assets/img/categori/card-shape.png" alt="">
           </div>
        </div>
        <!-- Best Product End-->
        <!-- Best Collection Start -->
        <div class="best-collection-area section-padding2">
            <div class="container">
                <div class="row d-flex justify-content-between align-items-end">
                    <!-- Left content -->
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="best-left-cap">
                            <h2>Best Collection of This Month</h2>
                            <p>Designers who are interesten crea.</p>
                            <a href="#" class="btn shop1-btn">Shop Now</a>
                        </div>
                        <div class="best-left-img mb-30 d-none d-sm-block">
                            <img src="assets/img/collection1.png" alt="">
                        </div>
                    </div>
                    <!-- Mid Img -->
                     <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                        <div class="best-mid-img mb-30 ">
                            <img src="assets/img/collection2.png" alt="">
                        </div>
                    </div>
                    <!-- Riht Caption -->
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="best-right-cap ">
                           <div class="best-single mb-30">
                               <div class="single-cap">
                                   <h4>Menz Winter<br> Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection3.png" alt="">
                               </div>
                           </div>
                        </div>
                        <div class="best-right-cap">
                           <div class="best-single mb-30">
                               <div class="single-cap active">
                                   <h4>Menz Winter<br>Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection4.png" alt="">
                               </div>
                           </div>
                        </div>
                        <div class="best-right-cap">
                           <div class="best-single mb-30">
                               <div class="single-cap">
                                   <h4>Menz Winter<br> Jacket</h4>
                               </div>
                               <div class="single-img">
                                  <img src="assets/img/collection5.png" alt="">
                               </div>
                           </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- Best Collection End -->
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
      include "assets/includes/footer.php";
      ob_end_flush();
  ?>