<?php
ob_start();
 session_start(); 
$pagetitle = 'Blog';

    include "init.php";

    $stmt=$con->prepare("SELECT * FROM slider Where pagename = 'Blog'");
    $stmt->execute();
    $rows = $stmt->fetchAll();

    $stmt=$con->prepare("SELECT * FROM Blog ORDER BY id DESC");
    $stmt->execute();
    $blogs = $stmt->fetchAll();




    if(isset($_POST['send'])){

        $email=$_POST['email'];
        $check= checkitem('email' ,'email_latestoffers' ,$email );

        if($check >=1){

            echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
            header("Refresh:4; url=blog.php");
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
    <?php foreach($rows as $row){?>
        <!-- Mobile Menu -->
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

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                    <?php foreach($blogs as $Blog){?>
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="assets/img/<?php echo $Blog['image'];?>" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>15</h3>
                                    <p>Jan</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.php?id=<?php echo $Blog['id'];?>">
                                    <h2><?php echo $Blog['text'];?></h2>
                                </a>
                                <p><?php echo $Blog['description'];?></p>
                                <ul class="blog-info-link">
                                            <?php 
                                            
                                            $ID = $Blog['id'];
                                            $stmt=$con->prepare("SELECT * FROM commentsofblogs Where id_blog = $ID  ORDER BY id DESC LIMIT 3 ");
                                            $stmt->execute();
                                            $comments = $stmt->fetchAll();
                                            $count=$stmt->rowCount();
                                            ?>
                                    <li><a href="single-blog.php?id=<?php echo $Blog['id'];?>&#comment"><i class="fa fa-comments"></i> <?php echo $count ;?> Comments</a></li>
                                </ul>
                            </div>
                        </article>

                    <?php }?>

                     
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btns" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>

                            <form method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                    type="submit" name="send">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
    <?php
    ob_end_flush();
      include "assets/includes/footer.php";
  ?>