
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm danh mục</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <?php  
                if (isset($_GET['msg'])) {        
            ?>
             <h4><?php echo $_GET['msg']?></h4>
            <?php  
                }
            ?>
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                    $id = 0;
                                     if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                    }

                                    $queryOldDM = "SELECT * FROM cat WHERE cat_id = '$id' ";
                                    $resultOldDM = $mysqli -> query($queryOldDM);
                                    $rowOldDM = mysqli_fetch_assoc($resultOldDM);
                                    $nameOld = $rowOldDM['name'];

                                    if (isset($_POST['submit'])) {
                                        $name = $_POST['name'];
                                        $queryDM = "UPDATE cat SET name='$name' WHERE cat_id = '$id' ";
                                        $result = $mysqli -> query($queryDM);
                                        //câu lệnh sql trả về 1 true 2 false
                                        if ($result) {
                                            header("location:index.php?msg=Sửa thành công!");
                                        } else {
                                            header("location:index.php?msg=Lỗi!");
                                        }
                                    }
                                  
                                ?>
                                <form role="form" action="" method="POST">
                                    <div class="form-group">
                                        <label>Tên danh mục</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo($nameOld) ?>" />
                                    </div>       
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Sửa</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>