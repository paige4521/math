<?php 
require_once('./admin/config.php');
if(!isset($data->email)){
        header("Location: ./users/dashboard.php");
        exit;
    }      
// require_once('./inc/header.php');
?>
    <!-- <div id="top-banner">
       <div id="top-banner-screen" class="d-flex align-items-center justify-content-center">
            <h1>Basic Math for Kids test</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 offset-md-3">
                <div id="login-form" class="shadow my-5">
                    <div id="title-bar" class="mb-5">
                        <p>Please Login...</p>
                    </div>
                    <form method="post" action='./admin/login.php'>
                        <div class="mb-3">
                            <label for="userEmail" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="userEmail" name="userEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="userPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                        </div>
                        <p>Do not have account? Create One <a href="./admin/register.php">Here</a></p>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> -->
<?php
require_once('./inc/footer.php');
?>