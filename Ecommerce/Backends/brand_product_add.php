<?php include 'include/header.php'?>
<?php include '../Frontend/classes/brand_product.php';?>
<!-- Right Panel -->
<?php
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];
        $insertBrand = $brand->insert_brand ($brandName);
    }
?>
<div id="right-panel" class="right-panel">
    <!-- Start nav-bar-->
    <?php include 'include/nav-bar.php'?>
    <!--End nav bar -->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Add brand product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">Brand product</a></li>
                        <li><a href="category_product_add.php">Add brand product</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Add product category</h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row form-group">
                            <div class="col col-sm-10">
                                <input type="text" id="input-normal" name="brandName" placeholder="Brand name" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" Value="Save" />
                            </div>
                        </div>
                    </form>
                    <?php
                        if (isset($insertBrand)){
                            echo $insertBrand;
                        }
                    ?>
                </div>
            </div>
        </div>
        <!--        <div class="col-sm-12">-->

        <!--        </div>-->
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include 'include/footer.php'?>


