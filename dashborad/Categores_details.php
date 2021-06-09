<?php
ob_start();
session_start();
$pagetitle = 'Categories';
include 'init.php';

if(isset($_SESSION['fname'])){

    if(isset($_GET['categori'])){
        $categori = $_GET['categori'];

        $rows = selectall('*' , 'products' ," WHERE categories = '$categori' ORDER BY id DESC");  
        $check =   checkitem('*' , 'products' ," WHERE categories = '$categori' ORDER BY id DESC ");

    }else{
        $categori = ' ';
        $rows = selectall('*' , 'products' ,"ORDER BY id DESC");
        $check =   checkitem('*' , 'products' ,  'ORDER BY id DESC');
    }

            
                               
                     
?>
        <!-- Breadcrumbs-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1><?php echo  $categori;?><a href="action.php?do=add&table=products"> <button type="button" class="btn btn-success" data-dismiss="modal">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add</button></a></h1> 
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
                    
                     if($check > 0 ){
                        foreach($rows as $row ){
                    ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body" style="height: 611px ; overflow: overlay;">
                              <a href="details.php?id=<?php echo $row['id'];?>"> <img src="../assets/img/<?php echo $row['image'];?>"></a>
                              <p><strong>name : </strong><?php echo $row['text'];?></p>
                               <p><strong>Price : $</strong><?php echo $row['price'];?></p>
                               <?php if($row['discount'] > 0){   ?>
                                   <p><strong>discount : </strong><?php echo $row['discount'];?></p>
                               <?php }?>
                               <p><strong>Quantity : </strong><?php echo $row['Quantity'];?></p>
                               <p><strong>star : </strong><?php echo $row['star'];?></p>
                            </div>
                            <div class="card-body">
                        <a href="action.php?do=edit&table=products&id=<?php echo $row['id'];?>">   <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a> 
                          <a href="action.php?do=delete&table=products&id=<?php echo $row['id'];?>">      <button type="button" class="btn btn-danger " data-dismiss="modal"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button></a></div>
                         
                        </div>
                    </div><!-- /# column -->
                        <?php }
                        }else{
                            echo "<div class='alert alert-danger'>The quantity is carried out</div>";
                        }
                        
                        ?>

                </div>

            </div><!-- .animated -->
        </div>

        
        <!-- /.content -->
        <?php
    
      include 'includes/footer.php';
}else{
    header('Location: login.php');
}
    ?>