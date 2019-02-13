<?php
	require_once("app/controller.php");
	require_once("app/session.php");
    if(isset($_POST) && !empty($_POST)){
        $phone = Database::escaped_string($_POST['phone1']);
        $password = Database::escaped_string($_POST['password1']);
        $password = sha1(md5($password));

        if(empty($phone) || empty($password)){
            echo "Phone and Password must be filled to login";
        }else{
            $sql = User::authenticate($phone, $password);
            if($sql){
                $user_session->login($sql);
                echo "success";
            }else{
                echo "OOPS! Login failed, wrong phone number or password";
            }
        }
    }