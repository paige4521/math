<?php
require_once('./db/db.php');
require_once('./functions.php');

if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){
    $login_status = get_user_by_email($pdo,$_POST['userEmail']);
    if($login_status){
        if(password_verify($_POST['userPassword'], $login_status[0]->user_password)){
            $data->firstName = $login_status[0]->user_first_name;
            $data->lastName = $login_status[0]->user_last_name;
            $data->email = $login_status[0]->user_email;
            $data->avatar = $login_status[0]->user_avatar;
            redirect('../users/dashboard.php');
        }
        
    } else echo "Login email not Found";
}