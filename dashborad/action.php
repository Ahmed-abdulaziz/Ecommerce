<?php
ob_start();
session_start();
$pagetitle = 'Categories';
include 'init.php';

if(isset($_SESSION['fname'])){

  
            
                               
                     
?>
        <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li class="active">Categories</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.breadcrumbs-->
        <!-- Content -->
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
           <?php 
                if($_GET['do'] == 'add' && $_GET['table'] == 'products'){

                    if(isset($_POST['add'])){

                        $name        =  $_POST['name'];
                        $quentity    = $_POST['quentity'];
                        $price       = $_POST['price'];
                        $star        = $_POST['star'];
                        $discount    = $_POST['discount'];
                        $type        = $_POST['type'];
                        $category    = $_POST['category'];
                        $Description =$_POST['Description'];

                        $imageName = $_FILES['image']['name'];
                        $imageSize = $_FILES['image']['size'];
                        $imageTmp  = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
            
                        $exp = explode('.' , $imageName);
                        $imageExtension = strtolower(end($exp));
                        $Mimage = rand(0,100000) . '_' .$imageName;
                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                        

                        $stmt=$con->prepare("INSERT INTO products (image ,text , description , price , discount , star , Quantity , categories , type	) 
                                                 VALUES (:zimage ,:ztext ,:zdescription , :zprice , :zdiscount ,:zstar ,:zQuantity, :zcategories, :ztype )");
                        $stmt->execute(array(
                            'zimage'   =>  $Mimage,
                            'ztext' => $name,
                            'zdescription'   =>  $Description,
                            'zprice' => $price,
                            'zdiscount'   =>  $discount,
                            'zstar' => $star,
                            'zQuantity'   =>  $quentity,
                            'zcategories' => $category,
                            'ztype'   =>  $type
                            
                        ));
                        echo "<div class ='alert alert-success container'>Product IS Add</div>";
                        header("Refresh:3; url=Categores_details.php");
                        exit();
    
                    }
                 
           ?>         
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Add products</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">quentity</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="quentity" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">price</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="price" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">star</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="star" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">discount</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="discount" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">type</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" name="type" size="0">
                                            <option value="offer">offer</option>
                                            <option value="new">new</option>
                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">category</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control" name="category" size="0">
                                            <?php 
                                            $rows= selectall('*','categories');
                                                foreach($rows as $row){
                                            ?>
                                            <option value="<?php echo $row['name'];?>"><?php echo $row['name'];?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" name="Description" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='add'>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                    <?php }elseif($_GET['do'] == 'edit' && $_GET['table'] == 'products'){


                            if(isset($_GET['id'])){

                                $idd=$_GET['id'];
                                $row=select('*' , 'products' , "WHERE id = $idd");
                                
                                if(isset($_POST['edit'])){

                                    $name        =  $_POST['name'];
                                    $quentity    = $_POST['quentity'];
                                    $price       = $_POST['price'];
                                    $star        = $_POST['star'];
                                    $discount    = $_POST['discount'];
                                    $type        = $_POST['type'];
                                    $category    = $_POST['category'];
                                    $Description =$_POST['Description'];

                                    $imageName = $_FILES['image']['name'];
                                    $imageSize = $_FILES['image']['size'];
                                    $imageTmp  = $_FILES['image']['tmp_name'];
                                    $imageType = $_FILES['image']['type'];

                                    if(empty($imageName)){

                                        $result = select('image' , 'products' , "WHERE id = $idd");
                                        $Mimage = $result['image']; 
                                    } else {
                                        $imageName = $_FILES['image']['name'];
                                        $imageSize = $_FILES['image']['size'];
                                        $imageTmp  = $_FILES['image']['tmp_name'];
                                        $imageType = $_FILES['image']['type'];

                                        $exp = explode('.' , $imageName);
                                        $imageExtension = strtolower(end($exp));
                                        $Mimage = rand(0,100000) . '_' .$imageName;
                                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                                    }
                                   
                                    
                                    $stmt=$con->prepare("UPDATE products SET  image = ?, text = ? , description = ? , price = ? , discount = ? , star = ? , Quantity = ? , categories = ? , type = ?  WHERE id = ?");
                                    $stmt->execute(array( $Mimage , $name ,$Description , $price ,  $discount , $star ,   $quentity , $category ,  $type    ,$idd));
                                  
                                    echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Upadted </div>";
                                    header("Refresh:2; url=details.php?id=$idd");
                                    exit();
                                }
                          ?>
                             <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Edit products</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" value="<?php echo $row['text'];?>" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">quentity</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  value = "<?php echo $row['Quantity'];?>" name="quentity" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">price</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  value = "<?php echo $row['price'];?>" name="price" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">star</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  value = "<?php echo $row['star'];?>" name="star" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">discount</label>
                                    <div class="col-lg-9">
                                        <input class="form-control"  value = "<?php echo $row['discount'];?>" name="discount" type="number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">type</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control"  value = "<?php echo $row['type'];?>"  name="type" size="0">
                                            <option value="offer">offer</option>
                                            <option value="new">new</option>
                                       
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">category</label>
                                    <div class="col-lg-9">
                                        <select id="user_time_zone" class="form-control"  name="category" size="0">
                                            <?php 
                                            $rows= selectall('*','categories');
                                                foreach($rows as $rows){
                                            ?>
                                            <option value="<?php echo $rows['name'];?>"><?php echo $rows['name'];?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                        <img src="../assets/img/<?php echo $row['image'];?>">
                                        <input class="form-control" value="<?php echo $row['image'];?>" name="image" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                    <div class="col-lg-9">
                                        <textarea class="form-control" value = "<?php echo $row['description'];?>" name="Description" ></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='edit'>Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                    <?php   }else{
                                header('Location: index.php');
                            }
                        }
                    
                    elseif($_GET['do'] == 'add' && $_GET['table'] == 'categoris'){

                        
                    if(isset($_POST['add'])){

                        $name  =  $_POST['name'];

                 
                        
                        $stmt=$con->prepare("INSERT INTO categories (name)  VALUES (:zname )");
                        $stmt->execute(array(
                            'zname'   =>  $name,
                         
                            
                        ));
                        echo "<div class ='alert alert-success container'>category IS Add</div>";
                        header("Refresh:3; url=home.php");
                        exit();
    
                    }
                    
                    ?>
                      <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Add categoris</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='add'>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                <?php }elseif($_GET['do'] == 'edit' && $_GET['table'] == 'categoris'){


                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $row = select('name' , 'categories' , "WHERE id  = $id");

                        if(isset($_POST['edit'])){
                            
                            $name = $_POST['name'];
                            $check = checkitem('name' , 'categories' , "WHERE name = '$name'");

                            if($check > 0 ){
                                echo "<div class ='alert alert-danger container'>soory this category name IS aleardy exist</div>";
                            }else{

                            $stmt = $con->prepare("UPDATE categories SET name = ? WHERE id = ?");
                            $stmt->execute(array($name,$id));
                              
                            echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Upadted </div>";
                            header("Refresh:2; url=home.php");
                            exit();
                            }

                        }
                   
                  ?>

                    <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Edit categoris</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form" role="form" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" value="<?php echo $row['name']?>" name="name" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='edit'>Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>

           <?php  }else{
               header('Location: index.php');
           }
           
        
        } elseif($_GET['do'] == 'add' && $_GET['table'] == 'sider'){

                         if(isset($_POST['add'])){

                        $text  =  $_POST['text'];

                        $htext  =  $_POST['htext'];

                        $imageName = $_FILES['image']['name'];
                        $imageSize = $_FILES['image']['size'];
                        $imageTmp  = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
            
                        $exp = explode('.' , $imageName);
                        $imageExtension = strtolower(end($exp));
                        $Mimage = rand(0,100000) . '_' .$imageName;
                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                 

                        $stmt=$con->prepare("INSERT INTO slider (pagename , image ,htext , text)  VALUES (:zpagename ,:zimage ,:zhtext , :Ztext)");
                        $stmt->execute(array(
                            'zpagename'   =>  'Aman',
                            'zimage'   =>  $Mimage,
                            'zhtext'   =>   $htext,
                            'Ztext'   =>  $text,
                         
                            
                        ));
                        echo "<div class ='alert alert-success container'>slider IS Add</div>";
                        header("Refresh:3; url=home.php");
                        exit();
    
                    }
                    ?>

                    <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Add sider</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">head text</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="htext" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">text</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="text" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='add'>Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
            
                <?php }elseif($_GET['do'] == 'edit' && $_GET['table'] == 'slider'){

                 
                if(isset($_GET['id'])){
                $idd = $_GET['id'];
                $row = select('*' , 'slider' , "WHERE id = $idd");
                   
                 if(isset($_POST['edit'])){
   
                    $htext    = $_POST['htext'];
                    $text       = $_POST['text'];

                    $imageName = $_FILES['image']['name'];
                    $imageSize = $_FILES['image']['size'];
                    $imageTmp  = $_FILES['image']['tmp_name'];
                    $imageType = $_FILES['image']['type'];

                    if(empty($imageName)){

                        $result = select('image' , 'slider' , "WHERE id = $idd");
                        $Mimage = $result['image']; 
                    } else {
                        $imageName = $_FILES['image']['name'];
                        $imageSize = $_FILES['image']['size'];
                        $imageTmp  = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];

                        $exp = explode('.' , $imageName);
                        $imageExtension = strtolower(end($exp));
                        $Mimage = rand(0,100000) . '_' .$imageName;
                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                    }
                   
                    
                    $stmt=$con->prepare("UPDATE slider SET  image = ?, htext = ? , text = ?  WHERE id = ?");
                    $stmt->execute(array( $Mimage , $htext ,$text ,$idd));
                  
                    echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Upadted </div>";
                    header("Refresh:2; url=home.php");
                    exit();

                        }?>

                        
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Edit sider</h3>
                        </div>
                        <div class="card-body">
                       
                            <form method="post" class="form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">head text</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" value="<?php echo $row['htext']?>" name="htext" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">text</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" value="<?php echo $row['text']?>"  name="text" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                    <img src="../assets/img/<?php echo $row['image'];?>">
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                  <button class="btn  btn-primary" name='edit'>Edit</button></a>     
                                    </div>
                                </div>
                            </form>
                            <a href="?do=delete&table=slider&id=<?php echo $row['id'];?>"> <button class="btn btn-block btn-danger">delete</button></a>

                        
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                    <?php 
                }else{
                    header('Location: index.php');
                }
                }
                

                elseif($_GET['do'] == 'add' && $_GET['table'] == 'blog'){

                    if(isset($_POST['add'])){

                        $text  =  $_POST['text'];

                        $Description  =  $_POST['Description'];

                        $imageName = $_FILES['image']['name'];
                        $imageSize = $_FILES['image']['size'];
                        $imageTmp  = $_FILES['image']['tmp_name'];
                        $imageType = $_FILES['image']['type'];
            
                        $exp = explode('.' , $imageName);
                        $imageExtension = strtolower(end($exp));
                        $Mimage = rand(0,100000) . '_' .$imageName;
                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                 

                        $stmt=$con->prepare("INSERT INTO blog ( image , text , description)  VALUES (:zimage ,:ztext , :Zdescription)");
                        $stmt->execute(array(
                            
                            'zimage'   =>  $Mimage,
                            'ztext'   =>   $text,
                            'Zdescription'   =>  $Description,
                         
                            
                        ));
                        echo "<div class ='alert alert-success container'>blog IS Add</div>";
                        header("Refresh:3; url=blogs.php");
                        exit();
    
                    }
                    
                    ?>

                    <div class="col-lg-12">
                        <div class="card">
                        <div class="col-md-8 offset-md-2">
                    <span class="anchor" id="formUserEdit"></span>


                    <!-- form user info -->
                    <div class="card card-outline-secondary">
                        <div class="card-header">
                            <h3 class="mb-0">Add blogs</h3>
                        </div>
                        <div class="card-body">
                            <form method="post" class="form" role="form" autocomplete="off" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">text</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="text" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="Description" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" name="image" type="file">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <button class="btn btn-primary" name='add'>Add</button></a> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /form user info -->

                </div>
                    </div><!-- /# column -->
                      
                    

                </div>
                <?php } elseif($_GET['do'] == 'edit' && $_GET['table'] == 'blog'){

                            if(isset($_GET['id'])){
                                $idd = $_GET['id'];
                                $row = select('*' , 'blog' , "WHERE id = $idd");
                                
                                if(isset($_POST['edit'])){

                                    $text    = $_POST['text'];
                                    $Description  =  $_POST['Description'];

                                    $imageName = $_FILES['image']['name'];
                                    $imageSize = $_FILES['image']['size'];
                                    $imageTmp  = $_FILES['image']['tmp_name'];
                                    $imageType = $_FILES['image']['type'];

                                    if(empty($imageName)){

                                        $result = select('image' , 'blog' , "WHERE id = $idd");
                                        $Mimage = $result['image']; 
                                    } else {
                                        $imageName = $_FILES['image']['name'];
                                        $imageSize = $_FILES['image']['size'];
                                        $imageTmp  = $_FILES['image']['tmp_name'];
                                        $imageType = $_FILES['image']['type'];

                                        $exp = explode('.' , $imageName);
                                        $imageExtension = strtolower(end($exp));
                                        $Mimage = rand(0,100000) . '_' .$imageName;
                                        move_uploaded_file($imageTmp , "../assets/img//" . $Mimage);
                                    }
                                
                                    
                                    $stmt=$con->prepare("UPDATE blog SET  image = ?, text = ? , description = ?  WHERE id = ?");
                                    $stmt->execute(array( $Mimage , $text ,$Description ,$idd));
                                
                                    echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Upadted </div>";
                                    header("Refresh:2; url=blogs.php");
                                    exit();

                                        }

                            ?>

                            <div class="col-lg-12">
                                <div class="card">
                                <div class="col-md-8 offset-md-2">
                            <span class="anchor" id="formUserEdit"></span>


                            <!-- form user info -->
                            <div class="card card-outline-secondary">
                                <div class="card-header">
                                    <h3 class="mb-0">Edit blogs</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" class="form" role="form" autocomplete="off" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">text</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" value="<?php echo $row['text']?>" name="text" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Description</label>
                                            <div class="col-lg-9">
                                                <input class="form-control"  value="<?php echo $row['description']?>" name="Description" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label">Image</label>
                                            <div class="col-lg-9">
                                                <img src="../assets/img/<?php echo $row['image']?>">
                                                <input class="form-control" name="image" type="file">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label form-control-label"></label>
                                            <div class="col-lg-9">
                                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                                <button class="btn btn-primary" name='edit'>Edit</button></a> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /form user info -->

                            </div>
                            </div><!-- /# column -->
                            


                            </div>
                            <?php }else{

                                header("Location: index.php");
                            }} elseif($_GET['do'] == 'delete'){

                                if(isset($_GET['id']) && isset($_GET['table'])){
                                    $IDD = $_GET['id'];
                                    $table = $_GET['table'];

                                    $stmt=$con->prepare("DELETE FROM  $table WHERE id = :zid");
                                    $stmt->bindparam('zid',$IDD);
                                    $stmt->execute();
                                   
                                    echo "<div class='container alert alert-success'>".$stmt->rowCount()." recored Deleted </div>";
                                    header("Refresh:2; url=index.php");
                                    exit();
                                }else{
                                    header("Location: index.php");
                                }

                            }?>
            </div><!-- .animated -->
        </div>

        
        <!-- /.content -->
        <?php
   
      include 'includes/footer.php';
}else{
    header('Location: login.php');
}
    ?>