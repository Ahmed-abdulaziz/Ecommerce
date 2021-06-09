<?php
ob_start();
 session_start(); 
$pagetitle = 'Login';

    include 'init.php';
  
 
    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        $email=$_POST['email'];
        $password=sha1($_POST['pass']);
        $stmt=$con->prepare("SELECT id , fname ,lname ,email, Password FROM users WHERE email= ? AND Password = ? ");
        $stmt->execute(array($email,$password));
        $row = $stmt->fetch();
        $count=$stmt->rowCount();
        if($count > 0 ){
           
            $_SESSION['fname'] = $row['fname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];

            echo "<div class='alert alert-success container'>Welcome "." ". $row['fname']." " .$row['lname'] ."</div>";
            header("Refresh:4; url=index.php");
            exit();
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
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider Area End-->

    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
            <?php if(!isset($_SESSION['fname'])){?>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="signup.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
            <?php }?>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="Email" class="form-control" id="name" name="email"  placeholder="email">
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="pass" placeholder="Password">
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
    <?php
    ob_end_flush();
      include "assets/includes/footer.php";
  ?>