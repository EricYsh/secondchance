<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('../checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

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

<div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->
           <div class="col-md-12"><!-- col-md-12 Begin -->
               
               <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       My Account
                   </li>
                   <li>
                       Confirm Payment
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
                   
                   <h1 align="center"> Please Confirm Your Payment</h1>
                   
                   <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data"><!-- form Begin -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Invoice No: 这个自动生成一下？ </label>
                          
                          <input type="text" class="form-control" name="invoice_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Amount Sent: 加 相应购买数量，我们的一般都是1个吧</label>
                          
                          <input type="text" class="form-control" name="amount_sent" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Select Payment Mode: 这个删了？</label>
                          
                          <select name="payment_mode" class="form-control"><!-- form-control Begin -->
                              
                              <option> Select Payment Mode </option>
                              <option> Back Code </option>
                              <option> Paypall </option>
                              <option> Payoneer </option>
                              <option> Western Union </option>
                              
                          </select><!-- form-control Finish -->
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Transaction / Reference ID: 这个删了？</label>
                          
                          <input type="text" class="form-control" name="ref_no" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Paypall / Payoneer / Western Union Code: </label>
                          
                          <input type="text" class="form-control" name="code" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="form-group"><!-- form-group Begin -->
                           
                         <label> Payment Date: 自动生成当日时间</label>
                          
                          <input type="text" class="form-control" name="date" required>
                           
                       </div><!-- form-group Finish -->
                       
                       <div class="text-center"><!-- text-center Begin -->
                           
                           <button class="btn btn-primary btn-lg" name="confirm_payment"><!-- tn btn-primary btn-lg Begin -->
                               
                               <i class="fa fa-user-md"></i> Confirm Payment
                               
                           </button><!-- tn btn-primary btn-lg Finish -->
                           
                       </div><!-- text-center Finish -->
                       
                   </form><!-- form Finish -->
                   
                   <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($con,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($con,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($con,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
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