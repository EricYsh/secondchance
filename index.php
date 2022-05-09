<?php

$active = 'Home';
include("includes/header.php");

?>

<div id="hot"><!-- #hot Begin -->

    <div class="box"><!-- box Begin -->

        <div class="container"><!-- container Begin -->

            <div class="col-md-12"><!-- col-md-12 Begin -->

                <h3>
                    Product Category
                </h3>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div class="container"><!-- container Begin -->

    <div class="col-md-12"><!-- col-md-12 Begin -->

        <?php

        $aPcat = array();

        // This is for products_categories Begin //
        if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){

            foreach($_REQUEST['p_cat'] as $sKey=>$sVal){

                if((int)$sVal!=0){

                    $aPcat[(int)$sVal] = (int)$sVal;

                }

            }

        }
        // This is for products_categories Finisih //

        ?>

        <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->

            <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->

                <div class="panel-body"><!-- panel-body 1 Begin -->
                    <div class="input-group"><!-- input-group Begin -->
                    </div><!-- input-group Finish -->
                </div><!-- panel-body 1 Finish -->
                <div class="panel-body scroll-menu"><!-- panel-body 2 Begin -->
                    <ul class="nav nav-pills nav-stacked category-menu" id="dev-p-cat"><!-- nav nav-pills nav-stacked category-menu Begin -->

                        <?php

                        $get_p_cat = "select * from product_categories where p_cat_top='yes'";
                        $run_p_cat = mysqli_query($con,$get_p_cat);

                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                            $p_cat_id = $row_p_cat['p_cat_id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            $p_cat_image = $row_p_cat['p_cat_image'];

                            if($p_cat_image == ""){

                            }else{

                                $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                            }

                            echo "
                    <li style='background:#dddddd' class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                            if(isset($aPcat[$p_cat_id])){
                                echo "checked='checked'";
                            }

                            echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                        }

                        $get_p_cat = "select * from product_categories where p_cat_top='no'";
                        $run_p_cat = mysqli_query($con,$get_p_cat);

                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){

                            $p_cat_id = $row_p_cat['p_cat_id'];
                            $p_cat_title = $row_p_cat['p_cat_title'];
                            $p_cat_image = $row_p_cat['p_cat_image'];

                            if($p_cat_image == ""){

                            }else{

                                $p_cat_image = "<img src='admin_area/other_images/$p_cat_image' width='20px'>&nbsp;";

                            }

                            echo "
                    <li class='checkbox checkbox-primary'>

                        <a>

                            <label>

                                <input ";

                            if(isset($aPcat[$p_cat_id])){
                                echo "checked='checked'";
                            }

                            echo " value='$p_cat_id' type='checkbox' class='get_p_cat' name='p_cat'>

                                <span>
                                $p_cat_image
                                $p_cat_title
                                </span>

                            </label>

                        </a>
                    
                    </li>
                    ";

                        }

                        ?>

                    </ul><!-- nav nav-pills nav-stacked category-menu Finish -->
                </div><!-- panel-body 2 Finish -->

            </div><!-- panel-collapse collapse-data Finish -->

        </div><!-- panel panel-default sidebar-menu Finish -->

    </div><!-- col-md-12 Finish -->

</div><!-- container Finish -->




<!----------------------------------------------------------------------------------------------->

<div id="hot"><!-- #hot Begin -->

    <div class="box"><!-- box Begin -->

        <div class="container"><!-- container Begin -->

            <div class="col-md-12"><!-- col-md-12 Begin -->

                <h3>
                    HOT Products
                </h3>

            </div><!-- col-md-12 Finish -->

        </div><!-- container Finish -->

    </div><!-- box Finish -->

</div><!-- #hot Finish -->

<div id="content" class="container"><!-- container Begin -->

    <div class="row"><!-- row Begin -->

        <?php

        getPro();

        ?>

    </div><!-- row Finish -->

</div><!-- container Finish -->

<?php

include("includes/footer.php");

?>

<script src="js/jquery-331.min.js"></script>
<script src="js/bootstrap-337.min.js"></script>


</body>
</html>