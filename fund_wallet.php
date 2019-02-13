<?php
	require_once("app/controller.php");
	require_once("app/session.php");
	if(isset($_POST) && !empty($_POST)){
		$user = User::find_by_id($user_session->user_id);
	    $user_id = Database::inject_checker($user->id);
		$funding_amount = Database::inject_checker($_POST['funding_amount1']);
		$sql = "SELECT account_balance FROM users WHERE id = '{$user_id}'";
		$result = Database::query($sql);
		if($result){
			while($row = Database::fetch_data($result)){
				$old_balance = $row['account_balance'];
			}
		}
		$new_balance = $old_balance + $funding_amount;
		$sql = "UPDATE users SET
		 		account_balance = '{$new_balance}' WHERE id = '{$user_id}'";
		$result = Database::query($sql);
		if($result){
			$transaction_type = "Wallet funding";
			$sql = "INSERT INTO all_transactions(user_id,transaction_type,amount) VALUES('$user_id','$transaction_type','$funding_amount')";
			$result = Database::query($sql);
			echo $result ? "Wallet Credited" : "Something went wrong";
		}
	}