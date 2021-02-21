<?php include 'include/header.php'?>
<?php include '../Frontend/classes/product.php';?>
<?php include '../Frontend/classes/brand_product.php';?>
<?php   include '../Frontend/classes/category_product.php'; ?>
<?php   include '../Frontend/classes/origin_product.php'; ?>
<!-- Right Panel -->
<?php
    $product = new Product();
    if (!isset($_GET['productid']) || $_GET['productid'] == null){
        echo "<script>window.location = 'product_list.php'</script>";
    }else{
        $product_id = $_GET['productid'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

        $updateProduct = $product-> update_product($_POST, $_FILES, $product_id); // có hình ảnh phải có $_FILES  $_POST lấy tất cả dữ liệu
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
                    <h1>Add Product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="index.php">Product</a></li>
                        <li><a href="product_add.php">Add Product</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($updateProduct)){
                            echo $updateProduct;
                        }
                    ?>
                    <?php
                        $get_product_by_id = $product->getProductById ($product_id);
                        if ($get_product_by_id){
                        while ($result_product = $get_product_by_id->fetch_assoc()){
                    ?>
                    <form action="" method="post" enctype="multipart/form-data" class="pt-3">
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label ">Product name:</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="text" id="input-normal" name="product_Name" value="<?php echo $result_product['product_name']?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Category product: </label>
                            </div>
                            <div class="col-12 col-md-3 text-right">
                                <select data-placeholder="Choose a Country..." name="category" class="standardSelect form-control" tabindex="1">
                                    <option value="">Choose a category...</option>
                                    <?php
                                        $cat = new Category();
                                        $catShow = $cat->show_category ();
                                        if (isset($catShow)){
                                            while ($resultCat = $catShow->fetch_assoc()){
                                                ?>
                                                <option
                                                    <?php
                                                    if ($resultCat['category_id'] == $result_product['category_id']){
                                                        echo 'selected';
                                                    }
                                                    ?>
                                                    value="<?php echo $resultCat['category_id'] ?>"><?php echo $resultCat['category_name'] ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Brand product: </label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select data-placeholder="Choose a Country..." name="brand" class="standardSelect form-control" tabindex="1">
                                    <option value="">Choose a brand...</option>
                                    <?php
                                        $brand = new Brand();
                                        $brandShow = $brand->show_brand ();
                                        if (isset($brandShow)){
                                            while ($resultBrand = $brandShow->fetch_assoc()){
                                                ?>
                                                <option
                                                    <?php
                                                    if ($resultBrand['brand_id'] == $result_product['brand_id']){
                                                        echo 'selected';
                                                    }
                                                    ?>
                                                    value="<?php echo $resultBrand['brand_id'] ?>"><?php echo $resultBrand['brand_name'] ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Origin product:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select data-placeholder="Choose a Country..." name="origin" class="standardSelect form-control" tabindex="1">
                                    <option value="">Choose a origin...</option>
                                    <?php
                                        $origin = new Origin();
                                        $originShow = $origin->show_origin ();
                                        if (isset($originShow)){
                                            while ($resultOrigin = $originShow->fetch_assoc()){
                                                ?>
                                                <option
                                                    <?php
                                                    if ($resultOrigin['origin_id'] == $result_product['origin_id']){
                                                        echo 'selected';
                                                    }
                                                    ?>
                                                    value="<?php echo $resultOrigin['origin_id'] ?>"><?php echo $resultOrigin['origin_name'] ?>
                                                </option>
                                                <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label text-right">Product price:</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="text" id="input-normal" name="product_price" value="<?php echo $result_product['product_price']?>" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Product Description:</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <textarea type="text" id="ckeditor1" name="product_desc" rows="2" placeholder="Product price" class="form-control">
                                    <?php echo $result_product['product_desc']?>
                                </textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Upload images:</label>
                            </div>
                            <div class="col-12 col-md-7">
                                <input type="file" id="image" name="image" placeholder="Product price"><br>

                                <div class="image-preview" id="imagePreview">
                                    <img class="image-preview__image" width="150px" src="uploads/<?php echo $result_product['product_image']?>" id="img_thumbnail" alt="">
                                    <span class="image-preview__default-text"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3 text-right">
                                <label class="form-control-label">Origin product:</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="type" class="standardSelect form-control" tabindex="1">
                                    <option>Choose the type...</option>
                                    <?php
                                        if ($result_product['product_type'] == 0){
                                    ?>
                                    <option selected value="0">Highlights</option>
                                    <option value="1">Not prominent</option>
                                    <?php
                                        }else{
                                    ?>
                                    <option value="0">Highlights</option>
                                    <option selected value="1">Not prominent</option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group pt-3">
                            <div class="col col-md-3 text-right">
                                <input type="submit" class="btn btn-primary px-4" name="submit" Value="Update" />
                            </div>
                        </div>
                    </form>
                    <?php
                            }
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




