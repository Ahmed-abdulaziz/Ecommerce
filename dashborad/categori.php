<?php
ob_start();
session_start();
$pagetitle = 'Categori';
include 'init.php';
if(isset($_SESSION['fname'])){
?>
       

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Categories</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li class="active">Categori</li>
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
                                        <div class="card-body">
                                            <?php 
                                                    $rows = selectall('*' , 'slider' , 'WHERE pagename = "Catagori"');
                                                    foreach($rows as $row){
                                            ?>
                                            <a href="<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['htext'];?></p>
                                            
                                                <a href="action.php?do=edit&table=slider&id=<?php echo $row['id'];?>"> <button class="btn btn-info">Edit</button></a>
                                                <a href="action.php?do=delete&table=slider&id=<?php echo $row['id'];?>">     <button class="btn btn-danger">Delete</button></a>
                                                    <?php }?>
                                        </div>
                                    </div><!-- /# card -->
                                   

                            <div class="card">
                                <div class="card-header">
                                    <strong>New</strong>
                                   
                                </div>
                                <div class="card-body">
                               <?php $rows = selectall('*' , 'products' , 'WHERE assort = "Catagori" AND type = "new" limit 4');
                                            foreach($rows as $row){?>

                                                <a href="details.php?id=<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>price : </strong>  <?php echo $row['price'];?></p>
                                                <p> <strong>Quantity : </strong>  <?php echo $row['Quantity'];?></p>
                                                <p> <strong>star : </strong>  <?php echo $row['star'];?></p>
                                            <?php }?>

                                </div>
                            </div>

                   


                            

                       
                            </div> <!-- .buttons -->
                        <!-- Right Block -->
                        <div class="col-md-6">

                            <div class="card">
                            <div class="card-header">
                                    <strong>offer</strong>
                                    
                                </div>
                                <div class="card-body">
                               <?php $rows = selectall('*' , 'products' , 'WHERE assort = "Catagori" AND type = "offer" limit 4');
                                            foreach($rows as $row){?>

                                                <a href="details.php?id=<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>price : </strong>  <?php echo $row['price'];?></p>
                                                <p> <strong>Quantity : </strong>  <?php echo $row['Quantity'];?></p>
                                                <p> <strong>star : </strong>  <?php echo $row['star'];?></p>
                                            <?php }?>

                                </div>
                            </div>
                            <div class="card">
                            <div class="card-header">
                                    <strong>Featured</strong>
                                 
                                </div>
                                <div class="card-body">
                               <?php $rows = selectall('*' , 'products' , 'WHERE assort = "Catagori" AND type = "Featured" limit 4');
                                            foreach($rows as $row){?>

                                                <a href="details.php?id=<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>price : </strong>  <?php echo $row['price'];?></p>
                                                <p> <strong>Quantity : </strong>  <?php echo $row['Quantity'];?></p>
                                                <p> <strong>star : </strong>  <?php echo $row['star'];?></p>
                                            <?php }?>

                                </div>
                            </div>


                          
                        </div>
                    </div><!-- .row -->
               
            </div><!-- .animated -->
        </div><!-- .content -->
        </div>
        <?php
      
      include 'includes/footer.php';
                            }else{
                                header('Location: login.php');
                            }
                            ob_end_flush();
    ?>
