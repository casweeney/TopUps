<?php
	require_once("app/functions.php");
	require_once("app/database.php");
	$phone_number = Database::escaped_string($_POST['phoneNumber']);
	$network = Database::escaped_string($_POST['network']);
	$amount = Database::escaped_string($_POST['amount']);
	$userId = $_POST['userId'];
	$transaction_type = "Airtime Recharge";

	$sql = " SELECT account_balance FROM users WHERE id = '{$userId}' ";
    $result = Database::query($sql);
    $row = Database::fetch_data($result);
    $previous_balance = $row['account_balance'];
    $new_balance = $previous_balance - $amount;
    if($amount>$previous_balance){
    	echo "Insufficient funds";
    }else{
    	$sql = "UPDATE users SET account_balance = '{$new_balance}' WHERE id = '{$userId}'";
    	$result = Database::query($sql);
    	if($result){
    		$link = "https://mobilenig.net/api/airtime.php/?username=Topupsng&password=View@131&network=$network&phoneNumber=$phone_number&amount=$amount";
			$url = $link;
		    $ch = curl_init();
		    curl_setopt($ch, CURLOPT_URL, $url);
		    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true );
		    // This is what solved the issue (Accepting gzip encoding)
		    curl_setopt($ch, CURLOPT_ENCODING, "gzip,deflate");     
		    $response = curl_exec($ch);
		    curl_close($ch);
		    if($response == 00){
		        $sql = "INSERT INTO all_transactions(user_id,transaction_type,amount) VALUES('$userId','$transaction_type','$amount')";
		        $result = Database::query($sql);
		        if($result){
		        	echo "Airtime recharge successful";
		        }else{
		        	echo "Something went wrong";
		        }
		    }else{
		    	$sql = "UPDATE users SET account_balance = account_balance+$amount WHERE id = '{$userId}'";
    			$result = Database::query($sql);
    			if($result){
    				echo "Airtime recharge failed";
    			}
		    }
    	}
    }