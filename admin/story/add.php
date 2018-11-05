
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm truyện</h2>
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
                                    if (isset($_POST['submit'])) {
                                        $tenTruyen = $_POST['tentruyen'];
                                        $cat_id = $_POST['cat_id'];
                                        $hinhanh = $_FILES['hinhanh'];
                                        $tenHinhAnh = $hinhanh['name'];

                                        $mota = $_POST['mota'];
                                        $chitiet = $_POST['chitiet'];

                                        if ($tenHinhAnh != '') {//empty return boolean
                                            //xửa lý upload file
                                            $tmp_name = $_FILES['hinhanh']['tmp_name'];
                                            $path_upload = $_SERVER['DOCUMENT_ROOT'].'/files/'.$tenHinhAnh;
                                            move_uploaded_file($tmp_name, $path_upload);
                                        } 

                                        $queryTruyen= "INSERT INTO story(name,preview_text, detail_text, picture,cat_id) VALUES ('$tenTruyen', '$mota' , '$chitiet', '$tenHinhAnh', '$cat_id')";
                                        $result = $mysqli -> query($queryTruyen);
                                        //câu lệnh sql trả về 1 true 2 false
                                        if ($result) {
                                            header("location:index.php?msg=Thêm thành công!");
                                        } else {
                                            header("location:index.php?msg=Lỗi!");
                                        }
                                    }
                                  
                                ?>
                                <form role="form" action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Tên truyện</label>
                                        <input type="text" name="tentruyen" class="form-control" />
                                    </div>

                                    <div class="form-group">
                                        <label>Danh mục truyện</label>
                                        <select class="form-control" name="cat_id">
                                            <?php 
                                                  $queryDM = "SELECT * FROM cat ORDER BY cat_id DESC";
                                                    $resultDM = $mysqli -> query($queryDM);
                                                    while ($arDM = mysqli_fetch_assoc($resultDM)) {
                                                        $cat_id = $arDM['cat_id'];
                                                        $name = $arDM['name'];
                                            ?>
                                                <option value="<?php echo($cat_id); ?>"><?php echo "$name"; ?></option>
                                            <?php  
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea class="form-control" rows="3" name="mota"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Chi tiết</label>
                                        <textarea class="form-control" rows="5" name="chitiet"></textarea>
                                    </div>


                                    <button type="submit" name="submit" class="btn btn-success btn-md">Thêm</button>
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