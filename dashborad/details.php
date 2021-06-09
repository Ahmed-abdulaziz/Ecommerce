<?php
ob_start();
session_start();
$pagetitle = 'details';
include 'init.php';
if(isset($_SESSION['fname'])){

    if(isset($_GET['id'])){
        $IDD = $_GET['id'];

        $row = select('*' , 'products' , "WHERE id = $IDD");

    
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
                                    <li class="active">details</li>
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
                  
                        <!-- Right Block -->
                        <div class="col-md-12">

                            <div class="card">
                            <div class="card-header">
                                    <strong><?php echo $row['text'];?></strong>
                                </div>
                                <div class="card-body" style="text-align: center">
                             

                                                 <img src="../assets/img/<?php echo $row['image'];?>">
                                                <p> <strong>Name : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>price : $</strong><?php echo $row['price'];?></p>
                                                <p> <strong>Quantity : </strong>  <?php echo $row['Quantity'];?></p>
                                                <?php if($row['discount'] > 0){?>
                                                <p> <strong>Discount : </strong>  <?php echo $row['discount'];?></p>
                                                <?php }?>
                                                <p> <strong>star : </strong>  <?php echo $row['star'];?></p>
                                                <a href="action.php?do=edit&table=products&id=<?php echo $row['id'];?>"> <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>  
                               <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></div>
                                       

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
        echo "<div class='alert alert-danger'>please select product</div>";
        header("Refresh:3; url=index.php");
    }
                            }else{
                                header('Location: login.php');
                            }
                            ob_end_flush();
    ?>
