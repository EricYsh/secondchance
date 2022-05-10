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

        <div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Begin -->

            <div class="panel-collapse collapse-data"><!-- panel-collapse collapse-data Begin -->

                <div class="panel-body"><!-- panel-body 1 Begin -->
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success btn-lg btn-block">Electronic</button>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary btn-lg btn-block">Fashion</button>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-dark btn-lg btn-block">Sports</button>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-info btn-lg btn-block">Tools</button>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-warning btn-lg btn-block">Luggage</button>
                    </div>

                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger btn-lg btn-block">Others</button>
                    </div>
                </div><!-- panel-body 1 Finish -->
<!--                <div class="panel-body scroll-menu">-->
<!---->
<!--                </div>-->

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