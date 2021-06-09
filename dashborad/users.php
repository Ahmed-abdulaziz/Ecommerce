<?php

$pagetitle = "Users";
include 'init.php';


if(isset($_GET['do'])){

    $do= $_GET['do'];

    if($do =='admin'){

        $open = selectall('*' , 'users' , 'WHERE grouped = 1');

    }elseif($do =='user'){

        $open = selectall('*' , 'users' , 'WHERE grouped = 0');
    }
    elseif($do =='pending'){

        $open = selectall('*' , 'users' , 'WHERE state = 0');
    }
   
} else{
    $do = 'Users';
    $open = selectall('*' , 'users');
}

?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Users</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li class="active">users</li>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><?php echo $do;?></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                          

                                            foreach($open as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo  $row['fname'];?></td>
                                            <td><?php echo  $row['email'];?></td>
                                            <td><?php echo  $row['Address'];?></td>
                                            <td><?php echo  $row['phone'];?></td>
                                            <td><?php
                                                if($row['state'] == 0){
                                            ?>
                                                <button class="btn btn-info">Approve</button>
                                                <?php }else{
                                                    echo 'Approved';

                                                }?>
                                            </td>
                                        </tr>
                                            <?php }?>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
  </script>
<?php
      
      include 'includes/footer.php';
    ?>
