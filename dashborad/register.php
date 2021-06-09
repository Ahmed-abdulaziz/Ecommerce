<?php 
session_start();
include "connect.php";
include "includes/functions.php";

    if(isset($_POST['submit'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $Address = $_POST['Address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $zip = $_POST['zip'];
        $phone = $_POST['phone'];

        insert('users' , 'fname , lname , email , password , Address , city ,country , zip , phone' , "$fname , $lname ,$email , $pass , $Address , $city , $country , $zip , $phone");
    }

?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
</head>
<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                     <h1>
                         AMAN
                     </h1>
                    </a>
                </div>
                <div class="login-form">
               
                    <form method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <input type="text" name= "fname" class="form-control" placeholder="first Name">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "lname" class="form-control" placeholder="last Name">
                        </div>
                        <div class="form-group col-6">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-6">
                            <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "Address" class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "city" class="form-control" placeholder="city">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "country" class="form-control" placeholder="country">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "zip" class="form-control" placeholder="Zip">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" name= "phone" class="form-control" placeholder="phone">
                        </div>
                        <div class="checkbox col-6">
                            <label>
                                <input type="checkbox"> Agree the terms and policy
                            </label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button>
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>
