<?php
    ob_start();
    require_once("app/controller.php");
	//SIGN UP ALGORITHM
    $fullName = Database::escaped_string($_POST['fullName1']);
    $phone = Database::escaped_string($_POST['phone1']);
    $email = Database::escaped_string($_POST['email1']);
    $password = Database::escaped_string($_POST['password1']);
    $cpassword = Database::escaped_string($_POST['cpassword1']);
    $hash = sha1(md5($password));
    $account_balance = 0.00;
    if(empty($fullName) || empty($email) || empty($phone) || empty($password)){
        echo "<span class='text-danger'>Sorry! Name, Email, Phone number and Password are Required</span>";
    }
    elseif(!single_email_validator($email)){
        echo "<span class='text-danger'>Type a valid email</span>";
    }
    elseif(!numbers_only($phone)){
        echo "<span class='text-danger'>Only numbers required</span>";
    }
    elseif($password !== $password){
        echo "<span class='text-danger'>Password mismatch</span>";   
    }else{
    	$sql = "SELECT phone FROM users WHERE phone = '{$phone}'";
    	$result = Database::query($sql);
    	if(mysqli_num_rows($result) > 0){
	    	echo "<span class='text-danger'>Sorry! This number already exist</span>";
	    }else{
            $sql = " SELECT email FROM users WHERE email = '{$email}' ";
            $result = Database::query($sql);
            if(mysqli_num_rows($result) > 0){
                echo "<span class='text-danger'>Sorry! This email already exist</span>";  
            }else{
                $sql = "INSERT INTO users(fullname, phone, email, password, account_balance) VALUES('$fullName', '$phone', '$email', '$hash', '$account_balance')";
                $result = Database::query($sql);
                if($result){
                    echo "<span class='text-success text-center'>Signup successful</span>";
                }else{
                    echo "<span class='text-danger text-center'>Signup failed</span>";
                }
            }
	    }
    }
?>