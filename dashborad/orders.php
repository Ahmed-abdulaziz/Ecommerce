<?php
ob_start();
session_start();

 $pagetitle = 'Orders';
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
                                <h1>Orders</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                <li><a href="index.php">dashboard</a></li>
                                    <li class="active">Orders</li>
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
                                <strong class="card-title" v-if="headerText">Sizes</strong>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover table-striped table-align-middle mb-0">
                                    <thead>
                                       
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>pahone</th>
                                                    <th>payment</th>
                                                    <th>date</th>
                                                    <th>Status</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    
                                            $rows = selectall('*' , 'orders' , 'WHERE status = 1');
                                                
                                                foreach($rows as $row){
                                                    $IDD = $row['user_id']; 
                                                    $select = select('fname , lname , phone' , 'users' , "WHERE id = $IDD  ");
                                            ?>
                                            <tr>
                                                <td class="serial"><?php echo $row['id']?></td>
                                              
                                         
                                            
                                             <td> <a href="order-deteils.php?do=<?php echo $row['id'];?>"><span class="name"><?php echo  $select['fname'] . ' ' . $select['lname'];?> </span>   </a>  </td>
                                             
                                             <td><span ><?php echo $select['phone']?></span></td>
                                                <td><span ><?php echo $row['payment']?></span></td>
                                                <td><span ><?php echo $row['date']?></span></td>
                                                <td>
                                                    <?php if($row['completed'] == 0){
                                                    
                                                            $status = 'pending';
                                                    }else{
                                                        $status = 'completed';
                                                    }
                                                    
                                                    ?>
                                                    <span class="badge badge-<?php echo $status;?>"><?php echo $status;?></span>
                                                </td>
                                            </tr>
                                                <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--/.col-->
                </div>

            </div><!-- .animated -->

        </div><!-- .content -->

        <?php
      
      include 'includes/footer.php'; }// if email or pass not correct
      else{
          header('Location: login.php');
      }
  
  }else{
  
      header('Location: login.php');
  }
      
  ob_end_flush();?>
