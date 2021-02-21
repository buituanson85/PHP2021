<?php include 'include/header.php'?>
<?php include '../Frontend/classes/origin_product.php';?>
<!-- Right Panel -->
<?php
    $origin = new Origin();
    if (!isset($_GET['originid']) || $_GET['originid'] == null){
        echo "<script>window.location = 'origin_product_list.php'</script>";
    }else{
        $originId = $_GET['originid'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $originName = $_POST['originName'];
        $updateOrigin = $origin->updates_origin($originName, $originId);
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
                    <h1>Update origin product</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="index.php">Origin product</a></li>
                        <li><a href="origin_product_add.php">Update origin product</a></li>
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
                    $get_origin_name = $origin->getbrandbyId ($originId);
                    if ($get_origin_name){
                        while ($result = $get_origin_name->fetch_assoc()){
                            ?>
                    <form action="" method="post">
                        <div class="row form-group">
                            <div class="col col-sm-10">
                                <input type="text" id="input-normal" value="<?php echo $result['origin_name']?>" name="originName"  class="form-control">
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
                        if (isset($updateOrigin)){
                            echo $updateOrigin;
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





