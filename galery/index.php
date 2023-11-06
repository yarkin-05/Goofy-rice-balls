<?php
//populate all images from database and implement navigation button to link paginated pages

include 'functions.php';

$pdo = pdo_connect_mysql();//connect to mysql database


$stmt = $pdo->query('SELECT * FROM upload ORDER BY date DESC');
//select all images from upload table and order them by descendent order date

$images = $stmt->fetchAll(PDO::FETCH_ASSOC); //connection from PHP and sql, returns thing in an array
?>

<?=template_header('Gallery')?>
<div class="content home">
	<h2>Gallery</h2>
	<p>Welcome to the gallery page! You can view the list of uploaded images below.</p>
	<a href="upload.php" class="upload-image">Upload Image</a>
	<div class="images">
		<?php foreach ($images as $image): ?>
		<?php if (file_exists($image['filepath'])): ?>
		<a href="#">
			<img src="<?=$image['filepath']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" width="300" height="200">
			<span><?=$image['description']?></span>
		</a>
		<?php endif; ?>
		<?php endforeach; ?>
	</div>
</div>
<div class="image-popup"></div>
<?=template_footer()?>
?>