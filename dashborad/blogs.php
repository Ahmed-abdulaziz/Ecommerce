<?php
ob_start();
session_start();
$pagetitle = 'Blogs';
include 'init.php';
if(isset($_SESSION['fname'])){
?>
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Blogs</h1>
                            </div>
                        </div>
                    </div>                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li class="active">Blogs</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">

             <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>slider</h4>
                        </div>
                        <div class="card-body">
                        <?php 
                                                    $rows = selectall('*' , 'slider' , 'WHERE pagename = "Blog"');
                                                    foreach($rows as $row){
                                            ?>
                                            <a href="<?php echo $row['id'];?>"> <img src="assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['htext'];?></p>
                                            
                                                <a href="action.php?do=edit&table=slider&id=<?php echo $row['id'];?>"> <button class="btn btn-info">Edit</button></a>
                                                <a href="action.php?do=delete&table=slider&id=<?php echo $row['id'];?>">   <button class="btn btn-danger">Delete</button></a>
                                                    <?php }?>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                           <a href="action.php?do=add&table=blog">
                                <h4><button class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add Blogs</button></h4>
                                </a>
                            </div>
                    </div>
                    <!-- /# card -->
                </div>
                <!-- /# column -->
          <?php      $rows = selectall('*' , 'blog');
           $check = checkitem('id' , 'blog');
         
           if($check >0){

                    foreach($rows as $row){
                        $idblog=$row['id'];
                $comment = checkitem('id' , 'commentsofblogs' , " WHERE id_blog ='$idblog' ");
          
          ?>
                <div class="col-lg-6">
                    <div class="card" >
                        <div class="card-header">
                            <h4><?php echo $row['text']?></h4>
                            
                            <a href="action.php?do=edit&table=blog&id=<?php echo $row['id'];?>"> <button class="btn btn-info fa-pull-right">Edit</button></a>
                     <a href="action.php?do=edit&table=blog&id=<?php echo $row['id'];?>">  <button class="btn btn-danger fa-pull-right">Delete</button></a>
                        </div>
                        <div  class="card-body"style="height: 521px;overflow: overlay ;">

                                                <a href="<?php echo $row['id'];?>"> <img src="../assets/img/<?php echo $row['image'];?>"></a>  
                                                <p> <strong>Text : </strong>  <?php echo $row['text'];?></p>
                                                <p> <strong>description : </strong>  <?php echo $row['description'];?></p>
                                                <p> <strong>comments : </strong>  <?php echo  $comment;?></p>
                                          
                        </div>
                        
                   
                    </div>
                    
                    <!-- /# card -->
                </div>
                
                    <?php } 
                    }else{

                        echo "<div class='alert alert-danger'>NOT have a Blogs</div>";
                    }
                    ?>
                <!-- /# column -->

                <!-- /# column -->



            </div>
            <!-- /# row -->


        </div><!-- .animated -->
    </div><!-- .content -->

    <?php
      
      include 'includes/footer.php';
}else{
    header('Location: login.php');
}
ob_end_flush();
    ?>
