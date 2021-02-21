<?php include 'include/header.php'?>
<?php include '../Frontend/classes/brand_product.php';?>
<!-- Right Panel -->
<?php
    $brand = new Brand();
    if (!isset($_GET['brandid']) || $_GET['brandid'] == null){
        echo "<script>window.location = 'brand_product_list.php'</script>";
    }else{
        $brandId = $_GET['brandid'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $brandName = $_POST['brandName'];
        $updateBrand = $brand->updates_brand($brandName, $brandId);
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
                    <h1>Update brand product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">Brand product</a></li>
                        <li><a href="brand_product_add.php">Update brand product</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Update product category</h4>
                </div>
                <div class="card-body">
                    <?php
                    $get_brand_name = $brand->getbrandbyId ($brandId);
                    if ($get_brand_name){
                        while ($result = $get_brand_name->fetch_assoc()){
                            ?>
                    <form action="" method="post">
                        <div class="row form-group">
                            <div class="col col-sm-10">
                                <input type="text" id="input-normal" value="<?php echo $result['brand_name']?>" name="brandName"  class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-sm-10">
                                <input type="submit" class="btn btn-primary" name="submit" Value="Update" />
                            </div>
                        </div>
                    </form>
                    <?php
                            }
                        }
                    ?>
                    <?php
                        if (isset($updateBrand)){
                            echo $updateBrand;
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




