<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");

?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Second Chance</title>
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
   
   <div id="top"><!-- Top Begin -->
       
       <div class="container"><!-- container Begin -->
           
           <div class="col-md-4 offer"><!-- col-md-6 offer Begin -->
               <ul style="list-style-type:none; padding-top: 15px; margin: 0px; text-align: left;">
                   <li>
                       <a href="../index.php" style="font-size:180%;">Second Chance</a>
                   </li>
               </ul>
           </div><!-- col-md-6 offer Finish -->

           <!-- 搜索在此 -->
           <div class="col-md-4"><!-- col-md-4 Begin -->
               <ul style="list-style-type:none; padding-top: 15px; margin: 0px; text-align: left;">
                   <li>
                       <form class="form-inline" role="search" action="/Search/SearchList" method="get" target="_blank">
                           <div class="form-group">
                               <input name="KeyWord" class="form-control mr-sm-2" type="text" placeholder="Search">
                           </div>
                           <button class="btn my-2 my-sm-0" type="submit" style="background:none; margin-left:-4rem; color:#ff9d00;" >
                               <i class="fa fa-search" ></i>
                           </button>
                       </form>
                   </li>
               </ul>

           </div><!-- col-md-4 Finish -->

           <!-- 购物车、登陆、登出在此 -->
           <div class="col-md-4"><!-- col-md-4 Begin -->

               <ul class="menu"><!-- cmenu Begin -->
                   <li>
                       <!-- <a href="cart.php">Cart</a> -->
                       <a href="../cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                           <i class="fa fa-shopping-cart"></i>

                           <span><?php items(); ?> Items</span>

                       </a><!-- btn navbar-btn btn-primary Finish -->
                   </li>

                   <li class="<?php if($active=='Account') echo"active"; ?>">

                       <?php

                       if(!isset($_SESSION['customer_email'])){

                           echo"<a href='../checkout.php'>My Account</a>";

                       }else{

                           echo"<a href='my_account.php?my_orders'>My Account</a>";

                       }

                       ?>

                   </li>

                   <li>
                       <a href="checkout.php">

                           <?php

                           if(!isset($_SESSION['customer_email'])){

                               echo "<a href='checkout.php'> Login </a>";

                           }else{

                               echo " <a href='logout.php'> Log Out </a> ";

                           }

                           ?>

                       </a>
                   </li>
               </ul><!-- menu Finish -->

           </div><!-- col-md-4 Finish -->
           
       </div><!-- container Finish -->
       
   </div><!-- Top Finish -->

   <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default Begin -->

       <div class="container"><!-- container Begin -->

           <div class="navbar-header"><!-- navbar-header Begin -->

               <!-- <a href="index.php" class="navbar-brand home">
                   <img src="images/ecom-store-logo.png" alt="M-dev-Store Logo" class="hidden-xs">
                   <img src="images/ecom-store-logo-mobile.png" alt="M-dev-Store Logo Mobile" class="visible-xs">
               </a> -->

               <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                   <span class="sr-only">Toggle Navigation</span>

                   <i class="fa fa-align-justify"></i>

               </button>

               <button class="navbar-toggle" data-toggle="collapse" data-target="#search">

                   <span class="sr-only">Toggle Search</span>

                   <i class="fa fa-search"></i>

               </button>

           </div><!-- navbar-header Finish -->

           <div class="navbar-collapse collapse" id="navigation"><!-- navbar-collapse collapse Begin -->

               <div class="padding-nav"><!-- padding-nav Begin -->

                   <ul class="nav navbar-nav left"><!-- nav navbar-nav left Begin -->

                       <li class="<?php if($active=='Home') echo"active"; ?>">
                           <a href="../index.php">Home</a>
                       </li>
                       <li class="<?php if($active=='Shop') echo"active"; ?>">
                           <a href="../shop.php">Shop</a>
                       </li>

                       <!-- <li class="<?php if($active=='Cart') echo"active"; ?>">
                           <a href="cart.php">Shopping Cart</a>
                       </li> -->

                   </ul><!-- nav navbar-nav left Finish -->

               </div><!-- padding-nav Finish -->

           </div><!-- navbar-collapse collapse Finish -->

       </div><!-- container Finish -->

   </div><!-- navbar navbar-default Finish -->
   
<!-- --------------------------------------------------------------------------------------------------------------------------- -->
   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="../index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-3"><!-- col-md-3 Begin -->
   
   <?php 
    
    include("includes/sidebar.php");
    
    ?>
               
           </div><!-- col-md-3 Finish -->
           
           <div class="col-md-9"><!-- col-md-9 Begin -->
               
               <div class="box"><!-- box Begin -->
                   
                   <?php
                   
                   if (isset($_GET['my_orders'])){
                       include("my_orders.php");
                   }
                   
                   ?>

                   <?php

                   if (isset($_GET['pay_offline'])){
                       include("pay_offline.php");
                   }

                   ?>
                   
                   <?php
                   
                   if (isset($_GET['edit_account'])){
                       include("edit_account.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['change_pass'])){
                       include("change_pass.php");
                   }
                   
                   ?>
                   
                   <?php
                   
                   if (isset($_GET['delete_account'])){
                       include("delete_account.php");
                   }
                   
                   ?>
                   
               </div><!-- box Finish -->
               
           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->

   <?php

   include("../includes/footer.php");

   ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php } ?>