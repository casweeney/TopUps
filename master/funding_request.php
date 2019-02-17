<?php
	if(isset($_POST['verify_transaction'])){
		$verified = "Verified";
		$trans_type = "Wallet funding";
		$trans_amount = $_POST['trans_amount'];
		$transaction_user = $_POST['transaction_user'];
		$trans_id = $_POST['trans_id'];
		$sql = " UPDATE funding_requests SET
					request_status = '{$verified}' WHERE id = '{$trans_id}' ";
		$result = Database::query($sql);
		if($result){
			$sql = "SELECT account_balance FROM users WHERE id = '{$transaction_user}'";
			$result = Database::query($sql);
			$row = Database::fetch_data($result);
			$old_balance = $row['account_balance'];
			$new_balance = $old_balance + $trans_amount;
			$sql = "UPDATE users SET
					account_balance = '{$new_balance}' WHERE id = '{$transaction_user}'";
			$result = Database::query($sql);
			if($result){
				$sql = "INSERT INTO all_transactions(user_id,transaction_type,amount) VALUES('$transaction_user','$trans_type','$trans_amount')";
				$result = Database::query($sql);
				$msg = $result ? "<span class='text-success'>Funding verified</span>" : "<span class='text-danger'>Fail to verify funding</span>";
			}
		}
	}
?>
<div class="row">
	<div class="col-md-12">
		<?php echo isset($msg)?"{$msg}":""; ?>
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Account funding requests</h4>
			</div>
			<div class="panel-body">
				<?php
					$not_verified = "Not Verified";
					$sql = "SELECT * FROM funding_requests WHERE request_status = '{$not_verified}'";
					$result = Database::query($sql);
					if(mysqli_num_rows($result) > 0){
						$n=0;
						echo"
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Amount</th>
											<th>Bank Details</th>
											<th>Status</th>
											<th>Date & Time</th>
											<th>Action</th>
										</tr>
									</thead>
						";
						while($row = Database::fetch_data($result)){
							$n++;
							$transaction_id = $row['id'];
							$user_id = $row['user_id'];
							$amount = $row['amount_transfered'];
							$bank_details = $row['bank_details'];
							$request_status = $row['request_status'];
							$transaction_date = $row['created_at'];
							echo "
								<tbody>
									<tr>
										<td>{$n}</td>
										<td>{$amount}</td>
										<td>{$bank_details}</td>
										<td>{$request_status}</td>
										<td>{$transaction_date}</td>
										<td>
											<form method='POST' action='index.php?funding_request'>
												<input type='hidden' value='{$amount}' name='trans_amount' />
												<input type='hidden' value='{$transaction_id}' name='trans_id' />
												<input type='hidden' value='{$user_id}' name='transaction_user' />
												<input type='submit' name='verify_transaction' value='Verify' class='btn btn-success btn-sm' />
											</form>
										</td>
									</tr>
								</tbody>
							";
						}
						echo "
							</table>
						</div>
						";
					}else{
						echo "<b>No available funding request...</b>";
					}
				?>
			</div>
		</div>
	</div>
</div>