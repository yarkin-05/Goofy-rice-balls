<?php
include 'user.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$id = $_SESSION['id'];

$info = getProfileInfo($id);
//echo $info;

?>

<?=template_header('User profile')?>
<div class="body">
  <div class="row py-5 px-4"> 
    <div class="col-md-5 mx-auto"> 
      <div class="bg-white shadow rounded overflow-hidden"> 
        <div class="px-1 pt-0 pb-4 cover"> 
          <div class="media align-items-end profile-head"> 
            <div class="profile mr-3">
              <img src=<?= $info['filepath'] ?> alt="no info" class="rounded mb-2 img-thumbnail" style="max-height: 100px; height: auto;">
              <a href="edit_profile.php" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a>
            </div> 
            <div class="media-body mb-5 text-white"> 
              <h4 class="mt-0 mb-0"> <?= $username ?> </h4> 
                <p class="small mb-4"> 
                  <i class="fas fa-map-marker-alt mr-2"></i> 
                  <?= $email ?>
                </p>
              </div> 
            </div> 
          </div> 
        <div class="bg-light p-4 d-flex justify-content-end text-center"> 
          <ul class="list-inline mb-0"> 
  
            <li class="list-inline-item"> 
              <h5 class="font-weight-bold mb-0 d-block">340</h5>
              <small class="text-muted"> 
                <i class="fas fa-user mr-1"></i>
                Publicaciones
              </small> 
            </li> 
          </ul> 
        </div> 
        <div class="px-4 py-3"> 
          <h5 class="mb-0">About</h5> 
          <div class="p-4 rounded shadow-sm bg-light"> 
            <p class="font-italic mb-0"> <?= $info['informacion_adicional'] ?></p> 
            
          </div> 
        </div> 
        <div class="py-3 px-4"> 
          <div class="d-flex align-items-center justify-content-between mb-3"> 
            <h5 class="mb-0">Publicaciones Recientes</h5>
            <a href="#" class="btn btn-link text-muted">Show all</a> </div> 
            <div class="row"> 
              <div class="col-lg-6 mb-2 pr-lg-1" style="display: flex;">

                <img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm" id="publicaciones">
              </div> 
              
              </div> 
            </div> 
          </div> 
        </div>
    </div>
</div>
<?=template_footer()?>