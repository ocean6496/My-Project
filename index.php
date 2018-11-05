<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/story/inc/header.php'; ?>
<div class="content_resize">
  <div class="mainbar">
    
     <?php  
      $queryST = "SELECT * FROM story ORDER BY story_id DESC ";
      $resultST = $mysqli -> query($queryST);
      while ($row = mysqli_fetch_assoc($resultST)) {
        $story_id = $row['story_id'];
        $name = $row['name'];
        $preview_text = $row['preview_text'];
        $created_at = $row['created_at'];
        $counter = $row['counter'];
        $picture = $row['picture'];
        

    ?>
    <div class="article">
      <h2><?php echo "$name"; ?></h2>
      <p class="infopost">Ngày đăng: <?php echo "$created_at"; ?>. Lượt đọc: <?php echo "$counter"; ?></p>
      <div class="clr"></div>
      <div class="img"><img src="./templates/public/images/img1.jpg" width="161" height="192" alt="" class="fl" /></div>
      <div class="post_content">
        <p><?php echo "$preview_text"; ?></p>
        <p class="spec"><a href="" class="rm">Chi tiết</a></p>
      </div>
      <div class="clr"></div>
    </div>
    <?php 
      }
    ?>

    <p class="pages"><small>Trang 1 / 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>
  </div>
  <div class="sidebar">
  <?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/story/inc/leftbar.php'; ?>
  </div>
  <div class="clr"></div>
</div>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/templates/story/inc/footer.php'; ?>
