<?php
	ob_start();
    require_once("../app/controller.php");
    if(isset($_POST) && !empty($_POST)){
    	$fullname = Database::escaped_string($_POST['fullname1']);
    	$email = Database::escaped_string($_POST['email1']);
    	$phone = Database::escaped_string($_POST['phone1']);
    	$password = Database::escaped_string($_POST['password1']);
    	$cpassword = Database::escaped_string($_POST['cpassword1']);
    	$hash = sha1(md5($password));

    	if(empty($fullname)||empty($email)||empty($phone)||empty($password)||empty($cpassword)){
    		echo "<span class='text-danger'>No field should be empty</span>";
    	}
    	elseif($password !== $cpassword){
    		echo "<span class='text-danger'>Password mismatch</span>";	
    	}else{
    		$sql = "SELECT phone FROM admin WHERE phone = '{$phone}'";
            $result = Database::query($sql);
            if($result->num_rows > 0){
                echo "<span class='text-danger'>Sorry! This number already exist</span>";
            }else{
            	$sql = " SELECT email FROM admin WHERE email = '{$email}' ";
                $result = Database::query($sql);
                if($result->num_rows > 0){
                    echo "<span class='text-danger'>Sorry! This email already exist</span>";  
                }else{
                	$sql = "INSERT INTO admin(fullname, phone, email, password) VALUES('$fullname', '$phone', '$email', '$hash')";
                    $result = Database::query($sql);
                    if($result){
                        echo "Signup successful";
                    }else{
                        echo "Signup failed";
                    }
                }
            }
    	}
    }
