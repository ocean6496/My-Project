<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Quản lý truyện</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />

        <div class="row">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="row">
                                <div class="col-sm-6">
                                    <a href="add.php" class="btn btn-success btn-md">Thêm</a>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <form method="post" action="">
                                        <input type="submit" name="search" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                        <input type="search" class="form-control input-sm" placeholder="Nhập tên truyện" style="float:right; width: 300px;" />
                                        <div style="clear:both"></div>
                                    </form><br />
                                </div>
                            </div>
                            <?php  
                                if (isset($_GET['msg'])) {        
                            ?>
                            <h4 style="color: red;"><?php echo $_GET['msg']?></h4>
                            <?php  
                                }
                            ?>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên truyện</th>
                                        <th>Danh mục</th>
                                        <th>Lượt đọc</th>
                                        <th>Hình ảnh</th>
                                        <th width="160px">Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $queryTruyen = "SELECT s.*,c.name AS catName FROM story AS s INNER JOIN cat AS c ON s.cat_id = c.cat_id ORDER BY story_id DESC ";
                                        $resultTruyen = $mysqli -> query($queryTruyen);
                                        while ($arDM = mysqli_fetch_assoc($resultTruyen)) {
                                            $story_id = $arDM['story_id'];
                                            $nameStory = $arDM['name'];
                                            $nameCat = $arDM['catName'];
                                            $counter = $arDM['counter'];
                                            $picture = $arDM['picture'];
                                            $urlDel = "/admin/story/del.php?id={$story_id}";
                                            $urlEdit = "/admin/story/edit.php?id={$story_id}";

                                    ?>
                                    <tr class="">
                                        <td><?php echo "$story_id"; ?></td>
                                        <td><?php echo "$nameStory"; ?></td>
                                        <td><?php echo "$nameCat"; ?></td>
                                        <td class="center"><?php echo "$counter"; ?></td>                           
                                        <td class="center">
                                            <img src="/files/<?php echo($picture); ?>" alt="" height = 80px; width =100px; />
                                        </td>
                                        
                                       
                                        <td class="center">
                                            <a href="<?php echo($urlEdit); ?>" title="" class="btn btn-primary"><i class="fa fa-edit "></i> Sửa</a>
                                            <a href="<?php echo($urlDel); ?>" title="" class="btn btn-danger"><i class="fa fa-pencil" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"></i> Xóa</a>
                                        </td>
                                    </tr>
                                    <?php  
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="dataTables_info" id="dataTables-example_info" style="margin-top:27px">Hiển thị từ 1 đến 5 của 24 truyện</div>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous"><a href="#">Trang trước</a></li>
                                            <li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">3</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">4</a></li>
                                            <li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">5</a></li>
                                            <li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next"><a href="#">Trang tiếp</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
<!-- /. PAGE INNER  -->
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>