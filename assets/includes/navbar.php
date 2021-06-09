
    <!-- Preloader Start -->
  
 
    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header ">
               <div class="header-bottom  header-sticky">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-1 col-lg-1 col-md-1 col-sm-3">
                                <div class="logo">
                                  <a href="index.php"> <p class="h4 logo">AMAN</p></a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-8 col-md-7 col-sm-5">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>                                                
                                        <ul id="navigation">                                                                                                                                     
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="Catagori.php">Catagori</a></li>
                                            <li class="hot"><a href="product_list.php">Latest</a>
                                            </li>
                                            <li><a href="blog.php">Blog</a>
                                            </li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.php">Login</a></li>
                                                    <li><a href="about.php">About</a></li>
                                                    <li><a href="confirmation.php">Confirmation</a></li>
                                                    <li><a href="cart.php">Shopping Cart</a></li>
                                                   
                                                </ul>
                                            </li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div> 
                            <div class="col-xl-5 col-lg-3 col-md-3 col-sm-3 fix-card">
                                <ul class="header-right f-right d-none d-lg-block d-flex justify-content-between">
                                    <li class="d-none d-xl-block">
                                        <div class="form-box f-right ">
                                            <input type="text" name="Search" placeholder="Search products">
                                            <div class="search-icon">
                                                <i class="fas fa-search special-tag"></i>
                                            </div>
                                        </div>
                                     </li>
                                    <li class=" d-none d-xl-block">
                                        <div class="favorit-items">
                                            <i class="far fa-heart"></i>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="shopping-card">
                                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                            <span class="cart-orders">

                                            <?php 
                                                if(isset($_SESSION['fname'])){
                                                    $id = $_SESSION['id'];
                                                    $rows = checkitem('*','orders_deteils',"WHERE user_id = $id AND completed = 0");
                                                    echo $rows;
                                                     }else{
                                                      echo "0";   
                                                     }?>
                                            </span>
                                        </div>
                                    </li>
                                    <?php 
                                        if(isset($_SESSION['fname'])){?>
                                                <li class="d-none d-lg-block"><div class="dropdown">
                                                    <button class="btn header-btn " style="width: 145px" data-toggle="dropdown">
                                                    <?php echo $_SESSION['fname'];?>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="editprofile.php">Edit Profile</a>
                                                            <a class="dropdown-item" href="logout.php">LogOut</a>
                                                            
                                                    </div>
                                                </div></li>
                                     <?php   }else{
                                    ?>
                                   <li class="d-none d-lg-block"> <a href="login.php" class="btn header-btn">Sign in</a></li>
                                   <?php   }
                                    ?>
                                </ul>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
