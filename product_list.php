<?php
ob_start();
 session_start(); 
    $pagetitle='Product list';
    include "init.php";

    if(isset($_GET['do'])){
        $x = $_GET['do'];
       
        $stmt=$con->prepare("SELECT * FROM products WHERE categories = ? ");
        $stmt->execute(array($x));
        $sum = $stmt->rowCount();
        if($sum > 0){
            $products = $stmt->fetchAll();
        }
        else{
            $stmt=$con->prepare("SELECT * FROM products");
            $stmt->execute();
            $products = $stmt->fetchAll();
            echo "<div class = 'alert alert-danger container'>Sorry  ". $_GET['do']. " NOT AVALIABLE</div>";
            header("Refresh:3; url=product_list.php");
            exit();
        }
       
    }
    else{
        $stmt=$con->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
    }

    $stmt=$con->prepare("SELECT * FROM slider Where pagename = 'product list'");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    
  
    $stmt=$con->prepare("SELECT * FROM slider_customer");
    $stmt->execute();
    $customers = $stmt->fetchAll();

  


    $stmt1=$con->prepare("SELECT * FROM categories");
    $stmt1->execute();
    $cats = $stmt1->fetchAll();

    
    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $check= checkitem('email' ,'email_latestoffers' ,$email );

        if($check >= 1){

            echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
            header("Refresh:4; url=product_list.php");
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
    
    <!-- product list part start-->
    <section class="product_list section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="product_sidebar">
                        <div class="single_sedebar">
                            <form action="#">
                                <input type="text" name="#" placeholder="Search keyword">
                                <i class="ti-search"></i>
                            </form>
                        </div>
                        <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Category <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <?php foreach($cats as $cat){?>
                                    <p><a href="product_list.php?do=<?php echo $cat['name'];?>&#list"><?php echo $cat['name'];?></a></p>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="single_sedebar">
                            <div class="select_option">
                                <div class="select_option_list">Type <i class="right fas fa-caret-down"></i> </div>
                                <div class="select_option_dropdown">
                                    <p><a href="?type=new">new</a></p>
                                    <p><a href="#">Type 2</a></p>
                                    <p><a href="#">Type 3</a></p>
                                    <p><a href="#">Type 4</a></p>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                
                <div class="col-md-8" id="list">
                    <div class="product_list">
                        <div class="row">
                        <?php
                          
                        foreach( $products as $product){?>
                            <div class="col-lg-6 col-sm-6 " style="text-align: center;">
                                <div class="single_product_item">
                                    <img style="max-height: 300px;" src="assets/img/<?php echo $product['image'];?>" alt="" class="img-fluid">
                                    <h3> <a href="single-product.php?id=<?php echo $product['id'];?>&table=products"><?php echo $product['text'];?></a> </h3>
                                    <p >$<?php echo $product['price'];?></p>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product list part end-->
    
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
    <section class="subscribe_part section_padding" id="#x">
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
ob_end_flush();
     include "assets/includes/footer.php";
?>