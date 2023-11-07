<?php

include 'functions.php';
//this file will be used to delete an image from our server and associates in the mySQL databse
$pdo = pdo_connect_mysql();
$msg = '';

//check if image id exists
if(isset($_GET['id'])){
  //select the record that is going to be deleted
  $stmt = $pdo->prepare('SELECT * FROM upload WHERE id = ?');
  $stmt->execute([$_GET['id']]);
  $image = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$image) exit('Image doesn\'t exist with that ID');

  //make sure the user confirms before deletion
  if(isset($_GET['confirm'])){
    if($_GET['confirm'] == 'yes'){
    //User clicked the yes button
    unlink($image['filepath']);
    $stmt = $pdo->prepare('DELETE FROM upload WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    //output msg
    $msg = 'You have deleted the image!';
    }else{
    //user clocked the no
    header('Location: index.php');
    exit;
    } 
  }
} else exit('No ID specified');


?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Image #<?=$image['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete <?=$image['title']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$image['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$image['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>

<?=template_footer()?>