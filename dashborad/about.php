<?php

include 'init.php';
?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>About</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li><a href="#">pages</a></li>
                                    <li class="active">About</li>
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
                                                    $rows = selectall('*' , 'slider' , 'WHERE pagename = "About"');
                                                    foreach($rows as $row){
                                            ?>
                                             <img src="assets/img/<?php echo $row['image'];?>">
                                                <p> <strong>Text : </strong>  <?php echo $row['htext'];?></p>
                                            
                                                <a href="action.php?do=edit&table=slider&id=<?php echo $row['id'];?>"> <button class="btn btn-info">Edit</button></a>
                                                <button class="btn btn-danger">Delete</button>
                                                    <?php }?>
                        </div>
                    </div>
                    <!-- /# card -->
                </div>
                    <!-- /# column -->

                    <!-- /# row -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                
                                <h4>Admin : <span id="admin_name"></span> </h4>
                            </div>
                            <div class="card-body">
                                <?php 
                                        $rows = selectall('*' ,'about');
                                        foreach($rows as $row)
                                        {
                                ?>

                                        <h6><?php echo $row['text'];?></h6>
                                        <input hidden type="text" id="admin" value="<?php echo $row['admin']?>"><br>
                                        
                             <button class="btn btn-info">Edit</button>
                             <button class="btn btn-danger">Delete</button>
                                    <?php }?>
                                  
                            </div>
                         
                        </div>
                        <!-- /# card -->
                    </div>
                    <!-- /# column -->

                    <!-- /# row -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Video</h4>
                            </div>
                            <div class="card-body">
                            <?php 
                                        $rows = selectall('*' ,'about');
                                        foreach($rows as $row)
                                        {
                                ?>

                                        <div class="about_us_video">
                                        <img src="assets/img/<?php echo $row['image'];?>" alt="#" class="img-fluid">
                                        
                                            <iframe width="100%" height="100%"
                                            src="<?php echo $row['video'];?>">
                                            </iframe>
                                        </div>
                                       
                                        
                             <button class="btn btn-info">Edit</button>
                             <button class="btn btn-danger">Delete</button>
                                    <?php }?>
                                  
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                

                </div> <!-- .row -->
            </div><!-- .animated -->
        </div><!-- .content -->
        <script>
        
            var admin_name = document.getElementById('admin_name'),
                admin = document.getElementById('admin');


                admin_name.textContent = admin.value;
        </script>
 <?php
      
      include 'includes/footer.php';
    ?>