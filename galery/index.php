<?php
//populate all images from database and implement navigation button to link paginated pages

include 'functions.php';

$pdo = pdo_connect_mysql();//connect to mysql database


$stmt = $pdo->query('SELECT * FROM upload ORDER BY date DESC');
//select all images from upload table and order them by descendent order date

$images = $stmt->fetchAll(PDO::FETCH_ASSOC); //connection from PHP and sql, returns thing in an array

<?=template_header('Gallery')?>
<div class = "content home">
  <h2> Gallery </h2>
  <p> View list of uploaded images </p>
  <a href="upload.php" class="upload-image"> Upload Image </a>
  <div class = "images">
    <?php foreach($image as $image):?> //for each image in image array
      <?php if (file_exists($image['filepath'])): ?> //image exists
        <a href='#'>
          <img src="<?=$image['filepath']?>" alt"<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>"  width='300px' height='auto'>
          <span> <?=$image['description']?> </span>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
</div>
<div class="image-popup"></div>
<?=template_footer()?>

?>