<?php include 'include/header.php'?>
<?php include '../Frontend/classes/category_product.php';?>
<?php
    $cat = new Category();
    if (isset($_GET['delId'])){
        $catId = $_GET['delId'];
        $delCat = $cat->del_category ($catId);
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
                    <h1>Category product list</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="#">Product portfolio</a></li>
                        <li class="active"><a href="category_product_list.php">Category product list</a></li>
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
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $show_cat = $cat->show_category ();
                                        if ($show_cat){
                                        $index = 1;
                                        while ($result = $show_cat->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?php echo $index++;?></td>
                                        <td><?php echo $result['category_name']?></td>
                                        <td>
                                            <a href="category_product_edit.php?categoryid=<?php echo $result['category_id']?>" class="active" ui-toggle-class="">
                                                <i class="fa fa-pencil-square-o text-success text-active" style="font-size: 24px"></i>
                                            </a>
                                            <a href="?delId=<?php echo $result['category_id']?>" onclick="return confirm('Are you sure to delete ?')" class="active pl-2" ui-toggle-class="">
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



