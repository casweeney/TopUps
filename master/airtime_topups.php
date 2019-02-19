<div class="row">
	<div class="col-md-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h5>Airtime recharge history</h5>
			</div>
			<div class="panel-body">
				<?php
					$airtime_recharge = "Airtime Recharge";
					$sql = "SELECT users.fullname,all_transactions.transaction_type,all_transactions.amount,all_transactions.created_at FROM users, all_transactions WHERE users.id = all_transactions.user_id AND transaction_type = '{$airtime_recharge}'";
					$result = Database::query($sql);
					if($result->num_rows > 0){
						$n=0;
						echo "
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Name</th>
											<th>Transaction</th>
											<th>Amount</th>
											<th>Date</th>
										</tr>
									</thead>
						";
						while($row = Database::fetch_data($result)){
							$n++;
							$name = $row['fullname'];
							$transaction_type = $row['transaction_type'];
							$amount = $row['amount'];
							$transaction_date = $row['created_at'];
							echo "
								<tbody>
									<tr>
										<td>{$n}</td>
										<td>{$name}</td>
										<td>{$transaction_type}</td>
										<td>NGN {$amount}</td>
										<td>{$transaction_date}</td>
									</tr>
								</tbody>
							";
						}
						echo "
								</table>
							</div>
						";
					}else{
						echo "<b>No available records...</b>";
					}
				?>
			</div>
		</div>
	</div>
</div>