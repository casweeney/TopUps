<?php
	require_once("app/controller.php");
	require_once("app/session.php");
	if(isset($_POST) && !empty($_POST)){
		$user = User::find_by_id($user_session->user_id);
	    $user_id = Database::inject_checker($user->id);
		$transferedAmount = Database::inject_checker($_POST['transferedAmount1']);
		$transferedNote = Database::inject_checker($_POST['transferedNote1']);
		$request_status = "Not Verified";
		if(empty($transferedAmount) || empty($transferedNote)){
			echo "<span class='text-danger'>No field should be empty</span>";
		}else{
			$sql = "SELECT user_id FROM funding_requests WHERE request_status = '{$request_status}'";
			$result = Database::query($sql);
			if($result->num_rows == 1){
				echo "<span class='text-danger'>Your previous payment has not been verified please hold on</span>";
			}else{
				$sql = "INSERT INTO funding_requests(user_id,amount_transfered,bank_details,request_status) VALUES('$user_id','$transferedAmount','$transferedNote','$request_status')";
				$result = Database::query($sql);
				echo $result ? "Payment details has been sent, please wait for verification" : "<span class='text-danger'>Something went wrong</span>";
			}
		}
	}
	