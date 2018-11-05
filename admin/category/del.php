<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/header.php'; ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/leftbar.php'; ?>
    <?php  
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }

        $query = "DELETE FROM cat WHERE cat_id = {$id}";
        $result = $mysqli -> query($query);
        if ($result) {
            header('location: index.php?msg=Xóa thành công!');
        }
    ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/admin/inc/footer.php'; ?>