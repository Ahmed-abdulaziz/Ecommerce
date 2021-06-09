<?php
ob_start();
session_start();
$pagetitle = 'Lastes';
include 'init.php';
if(isset($_SESSION['fname'])){
?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Lastes</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li class="active">Lastes</li>
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
                        <div class="col-md-12">


                                    <div class="card">
                                        <div class="card-header">
                                            <strong>slider</strong>
                                        </div>
                                        <div class="card-body">
                                            <?php 
                                                    $rows = selectall('*' , 'slider' , 'WHERE pagename = "product list"');
                                                    foreach($rows as $row){
                                            ?>
                                            <a href="<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['htext'];?></p>
                                            
                                                <a href="action.php?do=edit&table=slider&id=<?php echo $row['id'];?>"> <button class="btn btn-info">Edit</button></a>
                                                <a href="action.php?do=delete&table=slider&id=<?php echo $row['id'];?>">  <button class="btn btn-danger">Delete</button></a>
                                                    <?php }?>
                                        </div>
                                    </div><!-- /# card -->
                                   

                                    </div> 
                                    <?php $rows = selectall('*' , 'categories');
                                           foreach($rows as $row){ 
                                               $name = $row['name'];
                                    ?>
                            <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <a href="Categores_details.php?categori=<?php echo  $row['name'];?>"><strong><?php echo  $name ;?></strong></a>
                                    
                                </div>
                                <div class="card-body" style="    height: 600px; overflow: overlay;">
                               <?php $rows = selectall('*' , 'products' , "WHERE categories = '$name' ORDER BY id DESC limit 3");
                                 $check = checkitem('id' , 'products' , "WHERE categories = '$name'");
                                 if($check >0){
                                            foreach($rows as $row){?>

                                                <a href="details.php?id=<?php echo $row['id'];?>"> <img src="../assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>price : </strong>  <?php echo $row['price'];?></p>
                                                <p> <strong>Quantity : </strong>  <?php echo $row['Quantity'];?></p>
                                                <p> <strong>star : </strong>  <?php echo $row['star'];?></p>
                                            <?php }
                                              }else{

                                                echo "<div class='alert alert-danger'>NOT have a product of this categori</div>";
                                            }
                                            ?>

                                </div>
                            </div>
                            </div>
                           
                                        <?php }?>
                          
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