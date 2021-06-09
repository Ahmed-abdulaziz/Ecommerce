<?php
ob_start();
session_start();
$pagetitle = 'Contact';
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
                                <h1>Contact</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">Pages</a></li>
                                    <li class="active">Contact</li>
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
                <div class="col-lg-6">
                    <div class="card" >
                        <div class="card-header">
                        <h4>Last Massages</h4>
                        </div>
                        <div  class="card-body">
                        <?php
                                  
                                  $rows = selectall('*' , 'contact' , 'ORDER BY id DESC limit 3');
                                  foreach($rows as $row){
                            ?>
                                
                               
                                  

                                    <ul class="list-group">
                              
                                    <p><strong>Name : </strong><?php echo $row['name'];?></p>
                                  <p><strong>Email : </strong><?php echo $row['email'];?></p>
                                  <p><strong>Massage : </strong><?php echo $row['massage'];?></p>
                                        <button class="btn btn-danger">Delete</button>
                                        <br>
                                   
                                    </ul>
                                  <?php }?>
                        </div>
                      
                    </div>
                   
                    <!-- /# card -->
                </div>

                    <div class="col-lg-6">
                    <div class="card" >
                        <div class="card-header">
                        <h4>Contact</h4>
                        </div>
                        <div  class="card-body">
                        <?php
                                  
                                  $row = select('*' , 'address');
                                
                            ?>
                                    <ul class="list-group">
                                  <p><strong>Governorate : </strong><?php echo $row['Governorate'];?></p>
                                  <p><strong>Street : </strong><?php echo $row['street'];?></p>
                                  <p><strong>Phone : </strong><?php echo $row['phone'];?></p>
                                  <p><strong>Mail : </strong><?php echo $row['mail'];?></p>
                                  <button class="btn btn-info">Edit</button>
                                 <button class="btn btn-danger">Delete</button><br>
                                    </ul>
                                
                        </div>
                      
                    </div>
                   
                    <!-- /# card -->
                </div>
                </div><!-- /# row -->


            </div><!-- .animated -->
        </div>
        <!-- /.content -->
        <?php
      
      include 'includes/footer.php';
}else{
    header('Location: login.php');
}
    ?>

