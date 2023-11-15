
<?php
  include 'connect.php';
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?=template_header("Login")?>

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Name" id="name" required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="username" placeholder="username" id="user" required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="lastname" placeholder="Last name" required id="last_name">
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="text" name="birthday" placeholder="Birthday" id="birthday" required>
                            </div>
                            
                            <div class="form-button mt-3">
                                <button id="Register" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?=template_footer()?>