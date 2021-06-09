<?php
 session_start(); 
$pagetitle = 'About US';

    include "init.php";

    $stmt=$con->prepare("SELECT * FROM slider WHERE pagename = 'About'");
    $stmt->execute();
    $rows = $stmt->fetch();

    $stmt=$con->prepare("SELECT * FROM about");
    $stmt->execute();
    $about = $stmt->fetch();
    
    
    $stmt=$con->prepare("SELECT * FROM slider_customer");
    $stmt->execute();
    $customers = $stmt->fetchAll();

      
    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $check= checkitem('email' ,'email_latestoffers' ,$email );

        if($check==1){

            echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
            header("Refresh:4; url=about.php");
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
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="assets/img/<?php echo $rows['image'];?>">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2><?php echo $rows['htext'];?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- slider Area End-->
    
    <!-- product list part start-->
    <section class="about_us padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="about_us_content">
                        <h5><?php echo $about['admin'];?></h5>
                        <h3><?php echo $about['text'];?></h3>
                        <div class="about_us_video">
                            <img src="assets/img/<?php echo $about['image'];?>" alt="#" class="img-fluid">
                            <a class="about_video_icon popup-youtube" href="<?php echo $about['video'];?>"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->

    <!-- feature part here -->
    <section class="feature_part section_padding">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="feature_part_tittle">
                        <h3>Credibly innovate granular
                        internal or organic sources
                        whereas standards.</h3>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="feature_part_content">
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources. Credibly innovate granular internal or “organic” sources whereas high standards in web-readiness.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/feature_icon_1.svg" alt="#">
                        <h4>Credit Card Support</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/feature_icon_2.svg" alt="#">
                        <h4>Online Order</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/feature_icon_3.svg" alt="#">
                        <h4>Free Delivery</h4>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single_feature_part">
                        <img src="assets/img/feature_icon_4.svg" alt="#">
                        <h4>Product with Gift</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- feature part end -->
    
    <!-- client review part here -->
    <section class="client_review">
        <div class="container">
            <div class="col-lg-12">
                <div class="section-tittle text-center mb-85 clinet">
                    <h2>Customer opinions</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="client_review_slider owl-carousel">
                    <?php foreach($customers as $customer){?>
                        <div class="single_client_review">
                            <div class="client_img">
                                <img src="assets/img/<?php echo $customer['image'];?>" alt="#">
                            </div>
                            <p><?php echo $customer['text'];?></p>
                            <h5><?php echo $customer['name'];?></h5>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- client review part end -->

    <!-- subscribe part here -->
    <section class="subscribe_part section_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="subscribe_part_content">
                        <h2>Get promotions & updates!</h2>
                        <p>Seamlessly empower fully researched growth strategies and interoperable internal or “organic” sources credibly innovate granular internal .</p>
                        <div class="subscribe_form">
                        <form method="post">
                            <input type="email" name="email" placeholder="Enter your mail">
                           <button class="btn_1" name="send">Subscribe</button>
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