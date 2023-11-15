
<?php
  include 'connect.php';
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?=template_header("Password Change")?>

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Set Your Password</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="new_password" placeholder="New Password" id="new_password" required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="password" name="check_password" placeholder="Check Password" id="check_password" required>
                            </div>
                            <div class="form-button mt-3">
                                <button id="password_change" type="submit" class="btn btn-primary">Set Password</button>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?=template_footer()?>