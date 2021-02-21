<?php include 'include/header.php'?>
<?php   include_once '../Frontend/helpers/format.php'; ?>
<?php include '../Frontend/classes/product.php';?>
<?php include '../Frontend/classes/brand_product.php';?>
<?php   include '../Frontend/classes/category_product.php'; ?>
<?php   include '../Frontend/classes/origin_product.php'; ?>

<?php
    $product = new product();
    $fm = new Format();//gọi fomat desc
    if (isset($_GET['productid'])){
        $id = $_GET['productid'];
        $delPro = $product->del_product($id);
}
?>
<!-- Right Panel -->

<div id="right-panel" class="right-panel">
    <!-- Start nav-bar-->
    <?php include 'include/nav-bar.php'?>
    <!--End nav bar -->

    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Product list</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="index.php">Product</a></li>
                        <li class="active"><a href="product_list.php">Product list</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                            <?php
                                if (isset($delPro)){
                                    echo $delPro;
                                }
                            ?>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered pt-3">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Images</th>
<!--                                    <th>Description</th>-->
                                    <th>Category Name</th>
                                    <th>Brand Name</th>
                                    <th>Origin</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $productList = $product->show_product();
                                        if ($productList){
                                        $index = 0;
                                        while ($result = $productList->fetch_assoc()){
                                            $index++;
                                    ?>
                                    <tr>
                                        <td><?php echo $index ?></td>
                                        <td><?php echo $result['product_name']?></td>
                                        <td><?php echo $result['product_price']?></td>
                                        <td><img src="uploads/<?php echo $result['product_image']?>" style="max-width: 50px;"></td>
<!--                                        <td>--><?php //echo $fm->textShorten ($result['product_desc'], 50) ?><!--</td>-->
                                        <td><?php echo $result['category_name']?></td>
                                        <td><?php echo $result['brand_name']?></td>
                                        <td><?php echo $result['origin_name']?></td>
                                        <td><?php echo $result['product_type']?></td>
                                        <td>
                                            <a href="product_edit.php?productid=<?php echo $result['product_id']?>" class="active" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 24px"></i>
                                            </a>
                                            <a href="?productid=<?php echo $result['product_id']?>" onclick="return confirm('Are you sure to delete ?')" class="active pl-2" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text" style="font-size: 24px"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
    <div class="content mt-3">

        <div class="col-sm-12">

        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

<!-- Right Panel -->
<?php include 'include/footer.php'?>






