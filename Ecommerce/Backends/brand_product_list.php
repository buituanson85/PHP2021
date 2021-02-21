<?php include 'include/header.php'?>
<?php include '../Frontend/classes/brand_product.php';?>
<?php
    $brand = new Brand();
    if (isset($_GET['delId'])){
        $brandId = $_GET['delId'];
        $delBrand = $brand->del_brand ($brandId);
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
                    <h1>Brand product list</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="index.php">Brand product</a></li>
                        <li class="active"><a href="brand_product_list.php">Brand product list</a></li>
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
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Brand Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $show_brand = $brand->show_brand ();
                                        if ($show_brand){
                                            $index = 1;
                                            while ($result = $show_brand->fetch_assoc()){
                                            ?>
                                    <tr>
                                        <td><?php echo $index++;?></td>
                                        <td><?php echo $result['brand_name']?></td>
                                        <td>
                                            <a href="brand_product_edit.php?brandid=<?php echo $result['brand_id']?>" class="active" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 24px"></i>
                                            </a>
                                            <a href="?delId=<?php echo $result['brand_id']?>" onclick="return confirm('Are you sure to delete ?')" class="active pl-2" ui-toggle-class="">
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




