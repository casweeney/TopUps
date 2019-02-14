<?php
	require_once("../app/controller.php");
	require_once("../app/session.php");
    if(isset($_POST) && !empty($_POST)){
        $email = Database::escaped_string($_POST['email1']);
        $password = Database::escaped_string($_POST['password1']);
        $password = sha1(md5($password));

        if(empty($email) || empty($password)){
            echo "Email and Password must be filled to login";
        }else{
            $sql = Admin::authenticate($email, $password);
            if($sql){
                $admin_session->login($sql);
                echo "success";
            }else{
                echo "OOPS! Login failed, wrong phone number or password";
            }
        }
    }