<?php
ob_start();
 session_start(); 
$pagetitle = 'Blog Details';

    include "init.php";
if(isset($_GET['id'])){
   $ID=$_GET['id'];
}else{
   header("Location: blog.php");
}

$stmt=$con->prepare("SELECT * FROM commentsofblogs Where id_blog = $ID  ORDER BY id DESC LIMIT 3 ");
$stmt->execute();
$comments = $stmt->fetchAll();


$stmt=$con->prepare("SELECT * FROM commentsofblogs Where id_blog = $ID  ORDER BY id DESC ");
$stmt->execute();
$comment = $stmt->fetchAll();
$count=$stmt->rowCount();

if(isset($_POST['submit'])){

         if(isset($_SESSION['fname'])){

            $comment = $_POST['comment'];
            $email = $_SESSION['email'];
            $name = $_SESSION['fname'];
        
               $stmt=$con->prepare("INSERT INTO commentsofblogs (id_blog ,name , email , Comment , Date)
                                        VALUES (:zid_blog , :zname , :zemail , :zComment , now() )");
               $stmt->execute(array(
                  'zid_blog'   =>  $ID,
                  'zname'   =>  $name,
                  'zemail'   =>  $email,
                  'zComment'   =>  $comment,
         
             ));
             header("Refresh:0; url=single-blog.php?id=$ID");
             exit();
         }else{
            echo "<div class='alert alert-danger container'>Please Login ...</div>";
            header("Refresh:2; url=single-blog.php?id=$ID");
            exit();
         }
       

}
    
    $stmt=$con->prepare("SELECT * FROM Blog WHERE id = $ID");
    $stmt->execute();
    $Blogs = $stmt->fetchAll();
    if(isset($_POST['send'])){

      $email=$_POST['email'];
      $check= checkitem('email' ,'email_latestoffers' ,$email );

      if($check >=1){

          echo "<div class='alert alert-danger container'>This Email Is Already In Database</div>";
          header("Refresh:4; url=single-blog.php");
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
                          <h2>Single Blog</h2>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- slider Area End-->
     
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
            <?php foreach($Blogs as $blog){?>
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="assets/img/<?php echo $blog['image'];?>" alt="">
                  </div>
                  <div class="blog_details">
                     <h2><?php echo $blog['text'];?> </h2>
                     <h4><?php echo $blog['description'];?> </h4>
                     <ul class="blog-info-link mt-3 mb-4">
                      
                        <li><a href="#comment"><i class="fa fa-comments"></i> <?php echo $count;?> Comments</a></li>
                     </ul>
                     <p class="excert">
                     <?php echo $blog['text'];?> </p>
                    
                  </div>
               </div>
            <?php }?>
   
               <div class="comments-area" id="comment">
                  <h4><?php echo $count;?> Comments</h4>
                  <?php foreach ($comments as $comment){?>
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <p class="h3"><?php echo $comment['name'];?></p>
                           </div>
                           <div class="desc">
                              <p class="comment">
                              <?php echo $comment['Comment'];?>
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <p class="date"><?php echo $comment['Date'];?> </p>
                                 </div>
                                 
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php }?>
               </div>
               <div class="comment-form">
                  <h4>Leave a Comment</h4>
                  <form class="form-contact comment_form" method="post">
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                        </div>
                        
                     </div>
                     <div class="form-group">
                        <button type="submit" name="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
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
                           <input type="email" name="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button name="send" class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
   <?php
   ob_end_flush();
      include "assets/includes/footer.php";
  ?>