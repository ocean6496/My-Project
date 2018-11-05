
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
<div class="page-wrapper">
    <?php  
        $id = 0;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        $queryOldTruyen = "SELECT * FROM story WHERE story_id = '{$id}' ";
        $resultOldTruyen = $mysqli -> query($queryOldTruyen);
        $arOldTruyen = mysqli_fetch_assoc($resultOldTruyen);
        $fileName = $arOldTruyen['picture'];

        if ($fileName != '') {
            $filePath = $_SERVER['DOCUMENT_ROOT'].'/files/'.$fileName;
            unlink($filePath);
        }

        $queryTruyen = "DELETE FROM story WHERE story_id = '{$id}' ";
        $resultTruyen = $mysqli -> query($queryTruyen);
        if ($resultTruyen) {
            header("location:index.php?msg=Xóa thành công!");
        } else {
            header("location:index.php?msg=Lỗi!");
        }
    ?>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>
<?php  
//thêm user trùng:SELECT username FROM users WHERE username = '$username';
?>