<?php 

session_start();

$active='Cart';

include("includes/db.php");
include("functions/functions.php");

?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($con,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($con,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
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
                    <a href="index.php" style="font-size:180%;">Second Chance</a>
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
                    <a href="cart.php" class="btn navbar-btn btn-primary right"><!-- btn navbar-btn btn-primary Begin -->

                        <i class="fa fa-shopping-cart"></i>

                        <span><?php items(); ?> Items</span>

                    </a><!-- btn navbar-btn btn-primary Finish -->
                </li>

                <li class="<?php if($active=='Account') echo"active"; ?>">

                    <?php

                    if(!isset($_SESSION['customer_email'])){

                        echo"<a href='checkout.php'>My Account</a>";

                    }else{

                        echo"<a href='customer/my_account.php?my_orders'>My Account</a>";

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
                        <a href="index.php">Home</a>
                    </li>
                    <li class="<?php if($active=='Shop') echo"active"; ?>">
                        <a href="shop.php">Shop</a>
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
                       Shop
                   </li>
                   
                   <li>
                       <a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a>
                   </li>
                   <li> <?php echo $pro_title; ?> </li>
               </ul><!-- breadcrumb Finish -->
               
           </div><!-- col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-9 Begin -->
               <div id="productMain" class="row">
<!--                   <div class="col-sm-1">-->
<!--                       <div id="mainImage">-->
<!--                           <div class="item active">-->
<!--                               <center><img class="img-responsive" src="admin_area/product_images/--><?php //echo $pro_img1; ?><!--" alt="Product 3-a"></center>-->
<!--                           </div>-->
<!--                           <div id="myCarousel" class="carousel slide" data-ride="carousel">-->
<!--                               <ol class="carousel-indicators">-->
<!--                                   <li data-target="#myCarousel" data-slide-to="0" class="active" ></li>-->
<!--                                   <li data-target="#myCarousel" data-slide-to="1"></li>-->
<!--                                   <li data-target="#myCarousel" data-slide-to="2"></li>-->
<!--                               </ol>-->
<!--                               -->
<!--                               <div class="carousel-inner">-->
<!--                                   <div class="item active">-->
<!--                                       <center><img class="img-responsive" src="admin_area/product_images/--><?php //echo $pro_img1; ?><!--" alt="Product 3-a"></center>-->
<!--                                   </div>-->
<!--                                   <div class="item">-->
<!--                                       <center><img class="img-responsive" src="admin_area/product_images/--><?php //echo $pro_img2; ?><!--" alt="Product 3-b"></center>-->
<!--                                   </div>-->
<!--                                   <div class="item">-->
<!--                                       <center><img class="img-responsive" src="admin_area/product_images/--><?php //echo $pro_img3; ?><!--" alt="Product 3-c"></center>-->
<!--                                   </div>-->
<!--                               </div>-->
<!--                               -->
<!--                               <a href="#myCarousel" class="left carousel-control" data-slide="prev">-->
<!--                                   <span class="glyphicon glyphicon-chevron-left"></span>-->
<!--                                   <span class="sr-only">Previous</span>-->
<!--                               </a>-->
<!--                               -->
<!--                               <a href="#myCarousel" class="right carousel-control" data-slide="next">-->
<!--                                   <span class="glyphicon glyphicon-chevron-right"></span>-->
<!--                                   <span class="sr-only">Previous</span>-->
<!--                               </a>-->
<!--                               -->
<!--                           </div>-->
<!--                       </div>-->
<!--                   </div>-->
                   
                   <div class="col-sm-12"><!-- col-sm-6 Begin -->
<!--                       <div class="box">-->
                           <div class="col-md-3">
                           <div class="item active">
                               <center><img class="img-responsive" src="admin_area/product_images/<?php echo $pro_img1; ?>" alt="Product 3-a"></center>
                           </div>
                           </div>

                           <div class="col-md-6">
                           <h1 class="text-center"> <?php echo $pro_title; ?> </h1>
                           
                           <?php add_cart(); ?>
                           
                           <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->
                               <div class="form-group"><!-- form-group Begin -->
                                   <label for="" class="col-md-6 control-label">Products Quantity</label>
                                   
                                   <div class="col-md-3"><!-- col-md-7 Begin -->
                                          <select name="product_qty" id="" class="form-control"><!-- select Begin -->
                                           <option>1</option>
                                           <option>2</option>
                                           <option>3</option>
                                           <option>4</option>
                                           <option>5</option>
                                           </select><!-- select Finish -->
                                   
                                    </div><!-- col-md-7 Finish -->
                                   
                               </div><!-- form-group Finish -->
                               
                               <p class="price">$ <?php echo $pro_price; ?></p>
                               
                               <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                               
                           </form><!-- form-horizontal Finish -->
                           </div>
<!--                       </div>-->
                       <div class="col-md-6"></div>
                       
                   </div><!-- col-sm-6 Finish -->
<!--                   <div class="col-sm-3"></div>-->
                   
               </div>
               
               <div class="box" id="details"><!-- box Begin -->

                       <h4>Product Details</h4>
                   
                   <p>
                       
                       <?php echo $pro_desc; ?>
                       
                   </p>
                   
                       <h4>Size</h4>
                       
                       <ul>
                           <li>Small</li>
                           <li>Medium</li>
                           <li>Large</li>
                       </ul>  
                       
                       <hr>
                   
               </div><!-- box Finish -->

           </div><!-- col-md-9 Finish -->
           
       </div><!-- container Finish -->
   </div><!-- #content Finish -->
   
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
