
<?php
  include 'connect.php';
  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?=template_header("Register")?>

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Login Today</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="username" placeholder="Username" id="usern" required>
                            </div>
                            <div class="col-md-12">
                               <input class="form-control" type="password" name="password" placeholder="Password" id="password_login" required>
                            </div>
                            <div class="form-button mt-3">
                                <button id="login" type="submit" class="btn btn-primary">Log In</button>
                            </div>
                          
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?=template_footer()?>