<?php 
    session_start();
include "init.php";
    if(isset($_POST['price'])){
        
        $priceOFOneProduct = $_POST['pbm'];
        $id_product=$_POST['id_product'];
        $id_user = $_SESSION['id'];
        $image=$_POST['image'];
        $name=$_POST['name'];
        $price=$_POST['price'];
        $quantity=$_POST['quantity'];

        $check=checkitem('id_product , user_id' , 'orders_deteils' ,"WHERE id_product = $id_product AND user_id = $id_user AND completed = 0 AND status = 0");;
                     
        if( $check >= 1){
            $stmt=$con->prepare("SELECT * FROM orders_deteils WHERE id_product = $id_product ");
            $stmt->execute();
            $orders = $stmt->fetch();
            $totalprice = $quantity *  $priceOFOneProduct;

            $stmt=$con->prepare("UPDATE orders_deteils SET  quantity = ?,priceofQuantity = ?  WHERE id_product = ?");
            $stmt->execute(array($quantity, $totalprice ,$id_product));
        }else{
            $check = checkitem('user_id' , 'orders' ,"WHERE user_id = $id_user AND status = 0");
            $row= select('id' , 'orders' , "WHERE user_id = $id_user AND status = 0 AND completed = 0 ");
            $IDD = $row['id'];
            if($check >= 1){
                    $stmt=$con->prepare("INSERT INTO orders_deteils (id_order , id_product , user_id , image , text , PriceOfOneProduct , priceofQuantity ,quantity )
                    VALUES (:zid_order , :zidpro , :ziduser , :zimage , :zname , :zPriceOfOneProduct, :zpriceofQuantity , :zquantity)");
                    $stmt->execute(array(
                        'zid_order' =>  $IDD,
                        'zidpro'   =>  $id_product,
                        'ziduser'   =>  $id_user,
                        'zimage'   =>  $image,
                        'zname'   =>  $name,
                        'zpriceofQuantity'   =>  $price,
                        'zPriceOfOneProduct' => $priceOFOneProduct,
                        'zquantity'   =>  $quantity,
                    ));
                   

            }else{

                $stmt=$con->prepare("INSERT INTO orders (user_id) VALUES (:ziduser)");
                $stmt->execute(array(
                    'ziduser'   =>  $id_user,
                ));

                $row= select('id' , 'orders' , "WHERE user_id = $id_user AND status = 0 AND completed = 0");
                $IDD = $row['id'];

                $stmt=$con->prepare("INSERT INTO orders_deteils (id_order , id_product , user_id , image , text , PriceOfOneProduct , priceofQuantity ,quantity )
                VALUES ( :zid_order , :zidpro , :ziduser , :zimage , :zname , :zPriceOfOneProduct, :zpriceofQuantity , :zquantity)");
                $stmt->execute(array(
                    'zid_order' =>  $IDD,
                    'zidpro'   =>  $id_product,
                    'ziduser'   =>  $id_user,
                    'zimage'   =>  $image,
                    'zname'   =>  $name,
                    'zpriceofQuantity'   =>  $price,
                    'zPriceOfOneProduct' => $priceOFOneProduct,
                    'zquantity'   =>  $quantity,
                ));

            }
          }
     
    }



?>