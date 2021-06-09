<?php
ob_start();
session_start();
$pagetitle = 'Home';
include 'init.php';

$email=$_SESSION['email'];
$password=$_SESSION['Password'];
$check = checklogin($email ,  $password);   // function check email and password correct or not

if($check > 0){

if(isset($_SESSION['fname'])){

?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Home</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="buttons">

                    <!-- Left Block -->
                    <div class="row">
                        <div class="col-md-6">

                            <div class="card">
                                <div class="card-header">
                                    <strong>slider</strong>
                                </div>
                                <div class="card-body" >
                                <!-- ---------------------------------------------slider----------------------------- -->
                                
                                            <div class="container my-4">


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
                                                            <a href="action.php?do=edit&table=slider&id=<?php echo $row['id'];?>"><img class="d-block w-100" src="../assets/img/<?php echo $row['image'];?>"
                                                                alt="First slide"></a>
                                                                <div class="mask rgba-black-light"></div>
                                                            </div>
                                                            <div class="carousel-caption">
                                                                <h3 class="h3-responsive">Light mask</h3>
                                                                <p>First text</p>
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
                                       <a href="action.php?do=add&table=sider"><button class="btn btn-success">Add</button></a> 
                                    <!-- --------------------------------------------slider ---------------------------->
                                </div>
                            </div><!-- /# card -->


                            <div class="card">
                                <div class="card-header">
                                    <strong>Last Product of categori </strong>
                                </div>
                                <div class="card-body" style="height: 600px;overflow:overlay">
                                
                               <div class="list-group">
                               <?php 
                                $rows = selectall('*' , 'products' ,'WHERE assort = "Catagori" ORDER BY id DESC limit 3');
                            foreach($rows as $row){
                                ?>
                                <a href="details.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action"><img  src="../assets/img/<?php echo $row['image'];?>"></a>
                               
                                <?php }?>
                                </div>
                               
                                </div>
                            </div><!-- /# card -->


                            

                        </div>

                <!-- Right Block -->
                <div class="col-md-6">
                <div class="card">
                        <div class="card-header">
                             <strong>categoris </strong>
                             <a href="action.php?do=add&table=categoris"><button class="btn btn-success">Add</button></a> 
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">name</th>
                                    <th scope="col">Controls</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $rows = selectall('*' , 'categories' ,'limit 6');
                                        foreach($rows as $row){
                                    ?>
                                <tr>
                                    <th scope="row"><a href="Categores_details.php?categori=<?php echo $row['name']?>"><?php echo $row['name']?> </a></th>
                                    <td> 

                                        <a href="action.php?do=edit&table=categoris&id=<?php echo $row['id']?>"><button class="btn btn-info">Edit</button></a>
                                        <a href="action.php?do=delete&table=categories&id=<?php echo $row['id'];?>">  <button class="btn btn-danger">Delete</button></a>
                                
                                      </td>
                                </tr>
                                <?php }?>
                            </tbody>    
                        </table>
                </div>



                            <div class="card">
                                <div class="card-header">
                                    <strong>Last Products</strong>
                                </div>
                                <div class="card-body" style="height: 600px;overflow:overlay">
                                
                               <div class="list-group">
                               <?php 
                                $rows = selectall('*' , 'products' ,'ORDER BY id DESC limit 3');
                            foreach($rows as $row){
                                ?>
                                <a href="details.php?id=<?php echo $row['id'];?>" class="list-group-item list-group-item-action"><img  src="../assets/img/<?php echo $row['image'];?>"></a>
                                <?php }?>
                                </div>
                               
                                </div>
                            </div>

                          
                        </div>
                    </div><!-- .row -->
                </div> <!-- .buttons -->
            </div><!-- .animated -->
        </div><!-- .content -->

        <?php
      
      include 'includes/footer.php';

                            }// if email or pass not correct
                            else{
                                header('Location: login.php');
                            }
                            }else{  // if email or pass not correct
                                header('Location: login.php');
                            }
                         
                            ob_end_flush();
    ?>
