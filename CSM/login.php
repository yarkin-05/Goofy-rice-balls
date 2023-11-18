
<?php
  include 'functions.php';
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
                        <h3>Login</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="username" placeholder="username" id="username" required>
                            </div>
                            

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" id="email" required>
                                
                            </div>

                           <div class="col-md-12">
                               <input class="form-control" type="password" name="password" placeholder="Password" required id="password">
                            </div>

                           <div class="form-button mt-3">
                                <button type="submit" id="login" class="button-17">Login</button>
                            </div>

                            <div id='validation'></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?=template_footer()?>








