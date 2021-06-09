<!doctype html>
 <html class="no-js" lang=""> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo gettitle();?></title>
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    <!-- Left Panel -->

   
   <!-- Left Panel -->
   <aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i>Pages</a>
                    <ul class="sub-menu children dropdown-menu">  <li><i class="fa fa-puzzle-piece"></i><a href="home.php">Home</a></li>
                        <li><i class="fa fa-id-badge"></i><a href="categori.php">Categori</a></li>
                        <li><i class="fa fa-bars"></i><a href="lastes.php">lastes</a></li>

                        <li><i class="fa fa-id-card-o"></i><a href="blogs.php">Blogs</a></li>
                        <li><i class="fa fa-exclamation-triangle"></i><a href="about.php">About</a></li>
                        <li><i class="fa fa-spinner"></i><a href="contact.php">Contact</a></li>
                    </ul>
                </li>

                <li class="menu-title"></li><!-- /.menu-title -->

                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="users.php?do=admin">Admin</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="users.php?do=user">Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="orders.php"> <i class="menu-icon ti-email"></i>Orders </a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="categores_details.php" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Products</a>
                    <ul class="sub-menu children dropdown-menu">
                            <?php 
                                $rows = selectall('*' , 'categories');
                                foreach($rows as $row){
                            ?>
                        <li><a href="Categores_details.php?categori=<?php echo  $row['name'];?>"> <?php echo $row['name'];?></a></li>
                                <?php }?>
                    </ul>
                </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside>
<!-- /#left-panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

       