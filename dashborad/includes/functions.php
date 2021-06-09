<?php 
function gettitle(){
    global $pagetitle;

    if(isset($pagetitle)){
        echo strtoupper($pagetitle);
    }else{
        echo 'Defult';
    }
}

/**Check user login or not */

    function checklogin($email , $password){

     global $con;

    $stmt=$con->prepare("SELECT id , fname ,lname ,email, Password FROM users WHERE email= ? AND Password = ? AND grouped = 1 ");
    $stmt->execute(array($email,$password));
    $row = $stmt->fetch();
    $count=$stmt->rowCount();
    return $count;

    }


/**
 * function th check item in database is founded or not to store data Repeated
 * function (column , table , value to store)
 * 
 */

function checkitem($select , $from , $extra = '' ){

    global $con;

    $stmt= $con->prepare("SELECT $select  FROM $from  $extra ");
    $stmt->execute();
    $count= $stmt->rowCount();
    return $count;

}

function checkproduct($select , $select2 , $from , $value1 ,$value2 ){

    global $con;

    $stmt1= $con->prepare("SELECT $select , $select2 FROM $from  WHERE $select = ? And $select2 = ?");
    $stmt1->execute(array($value1 , $value2));
    $count= $stmt1->rowCount();
    return $count;

}
/**function to Insert value 
 * into  table insert into
 * 
*/

function insert($into , $column , $value){

    global $con;
     
    $stmt=$con->prepare("INSERT INTO $into ($column) VALUES ($value)");
    $stmt->execute();
   
}

/** function select all item */

 function selectall($select , $from , $extra = ''){

    global $con;

    $stmt= $con->prepare("SELECT $select  FROM $from  $extra ");
    $stmt->execute();
    $rows = $stmt->fetchAll();
    return $rows;
 }

 function select($select , $from , $extra = ''){

    global $con;

    $stmt= $con->prepare("SELECT $select  FROM $from  $extra ");
    $stmt->execute();
    $rows = $stmt->fetch();
    return $rows;
 }


?>



                   


                  