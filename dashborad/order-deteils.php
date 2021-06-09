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

    if(isset($_GET['do'])){
        $IDD = $_GET['do'];
        $rows = selectall('*' ,'orders_deteils' , "WHERE id_order = $IDD");
    } else{
        echo "<div class='container alert alert-danger'>plaese chooce Order </div>";
            header("Refresh:2; url=index.php");
            exit();
    }
    if(isset($_POST['submit'])){

        $stmt=$con->prepare("UPDATE orders SET  completed = 1 Where id= $IDD");
        $stmt->execute();

        $stmt1=$con->prepare("UPDATE orders_deteils SET  completed = 1 Where id_order = $IDD");
        $stmt1->execute();
        if($stmt->rowCount() < 1 ){

        echo "<div class='container alert alert-info'> order aleardy Completed </div>";
        header("Refresh:2; url=orders.php");
        exit(); 
        }else{
            echo "<div class='container alert alert-success'>".$stmt->rowCount()." orders is Completed </div>";
            header("Refresh:2; url=orders.php");
            exit();
        }
       
    }

?>
            <div class="content">
                    <div class="card-body">
                       <h4 class="box-title">Orders </h4>
                    </div>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">product name</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $total = 0;
                                foreach($rows as $row){
                                
                                    $total+=$row['priceofQuantity'];  
                            ?>
                            <tr>
                            <th scope="row"><?php echo $row['id_order'];?></th>
                            <td><a href="details.php?id=<?php echo  $row['id_product']; ?>"><?php echo $row['text'];?></a> </td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['priceofQuantity'];?></td>
                            </tr>
                            
                                <?php }?>
                                    <tr>
                                <td></td>


                                <td>
                               
                                </td>
                                <td>
                                <h5>Total</h5>
                              
                                </td>
                                <td>  <h5><div id="total">  <span>$</span> <?php echo  $total;?></div></h5></td>

                            </tr>
                            <tr>
                                <td></td>


                                <td>
                               
                                </td>
                                
                                <td>
                                
                              
                                </td>
                                <td>  <h5><div>
                                    <form method="post">
                                    <button class="btn btn-success" name="submit"> Complete order</button>

                                    </form>
                                   
                                </div></h5></td>

                            </tr>
                            
                               
                        </tbody>
                        
                    </table>
            </div>
<?php
    include 'includes/footer.php';

    }// if email or pass not correct
    else{
        header('Location: login.php');
    }

}else{

    header('Location: login.php');
}
    
ob_end_flush();?>