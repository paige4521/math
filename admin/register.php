<?php 
require_once('config.php');

require_once(SITE_ROOT.'inc'.DS.'header.php');
require_once('./db/db.php');

    $err = [];
    $va = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        foreach($_POST as $key => $value){
            $va[$key] = validate_input($value);
            if($va[$key] == '') $err[$key] = "err";
        }

        if($va['userPassword'] != $va['userConfPassword']){
            $err['userConfPassword'] = "err";
        }
        $em = db::getInstance()->get('users',array('user_email','=',$va['userEmail']))->count();
        if($em > 0 ) $err['email'] = "err";
        
        if(!in_array('err',$err)){
            db::getInstance()->Insert('users',
                array(
                    'user_first_name'   => $va['userFirstName'],
                    'user_last_name'    => $va['userLastName'],
                    'user_email'        => $va['userEmail'],
                    'user_password'     => password_hash($va['userConfPassword'], PASSWORD_ARGON2I),
                    'user_permission'   => 'user'
                ));
        }
    }
    function validate_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
    <div id="top-banner">
       <div id="top-banner-screen" class="d-flex align-items-center justify-content-center">
            <h1>Bismillahir Rahmanir Rahim</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12 offset-md-2">
                <div id="login-form" class="shadow my-5">
                    <div id="title-bar" class="mb-5">
                        <p>Please Login...</p>
                    </div>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="userFirstName" class="form-label">First Name <span class="alert-warning"> <?php if(isset($err['userFirstName'])) echo "First Name Required"; ?></span></label>
                                    <input type="text" class="form-control" id="userFirstName" name="userFirstName" required value=<?php if(isset($va['userFirstName'])) echo $va['userFirstName']; ?>>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="userLastName" class="form-label">Last Name <span class="alert-warning"><?php if(isset($err['userLastName'])) echo "Last Name Required"; ?></span></label>
                                    <input type="text" class="form-control" id="userLastName" name="userLastName" required value=<?php if(isset($va['userLastName'])) echo $va['userLastName']; ?>>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="userEmail" class="form-label">Email address <span class="alert-warning"><?php if(isset($err['email'])) echo "Email Already registered"; ?></span></label>
                                    <input type="email" class="form-control" id="userEmail" name="userEmail" required value=<?php if(isset($va['userEmail'])) echo $va['userEmail']; ?>>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="userPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="userPassword" name="userPassword" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="mb-3">
                                    <label for="userConfPassword" class="form-label">Confirm Password <span class="alert-warning"><?php if(isset($err['userConfPassword'])) echo "Password &amp Confirm Password Not same"; ?></span></label>
                                    <input type="password" class="form-control" id="userConfPassword" name="userConfPassword" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require_once('./inc/footer.php');
?>