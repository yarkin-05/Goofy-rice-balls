<?php
  include 'functions.php';

?>
<?=template_header('Register')?>
<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation" novalidate id="register">

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="username" id = "username" placeholder="Username" required >
                               
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                                
                            </div>

                           <div class="col-md-12">
                                <select id='role' class="form-select mt-3" required>
                                      <option selected disabled value="">Role</option>
                                      <option value="administrador"> Administrator </option>
                                      <option value="editor"> Editor </option>
                                      <option value="autor"> Autor </option>
                                      <option value="lector"> Lector </option>
                      
                             
                           </div>


                           <div class="col-md-12">
                              <input class="form-control" type="password" id="password" name="password" placeholder="Password" required>
                               
                           </div>
                  

                            <div class="form-button mt-3">
                                <button id="register" name="register" type="submit" class="button-17" role="button">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?template_footer()?>