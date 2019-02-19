<?php
	if(isset($_POST['add_network_btn'])){
		$add_network = Database::escaped_string(strtoupper($_POST['add_network']));
		if(empty($add_network)){
			$msg = "<b>No fill network name</b>";
		}else{
			$sql = "SELECT network_name FROM network WHERE network_name = '{$add_network}'";
			$result = Database::query($sql);
			if($result->num_rows == 1){
				$msg = "<b>This network has already been added</b>";
			}else{
				$sql = "INSERT INTO network(network_name) VALUES('{$add_network}')";
				$result = Database::query($sql);
				$result?$msg = "<b>Network added</b>":"";
			}
		}
	}

	if(isset($_POST['network_delete'])){
		$network_id = $_POST['network_id'];
		$sql = "DELETE FROM network WHERE id = '{$network_id}'";
		$result = Database::query($sql);
		$result ? $msg = "Network deleted" : "";
	}

	if(isset($_POST['data_price_btn'])){
		$data_price = Database::escaped_string($_POST['data_price']);
		$data_desc = Database::escaped_string($_POST['data_desc']);
		$nets_id = $_POST['nets_id'];

		$sql = "SELECT data_price FROM data_price WHERE network_id = '{$nets_id}' AND data_price = '{$data_price}'";
		$result = Database::query($sql);
		if($result->num_rows == 1){
			$msg = "This price already exist";
		}else{
			$sql = "INSERT INTO data_price(network_id,data_price,data_desc) VALUES('$nets_id','$data_price','$data_desc')";
			$result = Database::query($sql);
			$result ? $msg = "Data price added" : "";
		}
	}
?>
<div class="row">
	<div class="col-md-12" class="text-center">
		<p class="text-center"><b><?php echo isset($msg)?$msg:""; ?></b></p>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h5>Add Data & Airtime Networks</h5>
			</div>
			<div class="panel-body">
				<form method="POST" action="">
					<input class="form-control" type="text" name="add_network" id="nets" placeholder="Network name" required>
					<br>
					<button type="submit" name="add_network_btn" class="btn btn-success">Add to list</button>
				</form>

			</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				<h5>List of available networks</h5>
			</div>
			<div class="panel-body">
				<?php
					$sql = "SELECT id,network_name FROM network";
					$result = Database::query($sql);
					if($result->num_rows > 0){
						$n=0;
						echo"
							<div class='table-responsive'>
								<table class='table table-striped'>
									<thead>
										<tr>
											<th>S/N</th>
											<th>Networks</th>
											<th>Action</th>
										</tr>
									</thead>
						";
						while ($row = Database::fetch_data($result)) {
							$n++;
							$id = $row['id'];
							$network_name = $row['network_name'];
							echo "
								<tbody>
									<tr>
										<td>{$n}</td>
										<td>{$network_name}</td>
										<td>
											<form method='POST'>
												<input type='hidden' name='network_id' value='{$id}' />
												<input type='submit' name='network_delete' class='btn btn-danger btn-xs' value='Delete' />
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
						echo "<span class='text-danger'>No added network</span>";
					}
				?>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h5>Add Mobile Data Plans</h5>
			</div>
			<div class="panel-body">
				<form method="POST">
					<select class="form-control" id="addBundle" name="nets_id">
						<option selected>Choose network</option>
						<?php
							$sql = "SELECT id, network_name FROM network";
							$result = Database::query($sql);
							if($result->num_rows > 0){
								while($row = Database::fetch_data($result)){
									$net_id = $row['id'];
									$net_name = $row['network_name'];
									echo "
										<option value='{$net_id}'>{$net_name}</option>
									";
								}
							}
						?>
					</select><br>
					<input class="form-control" type="text" name="data_price" id="nets" placeholder="Data price" required>
					<br>
					<input class="form-control" type="text" name="data_desc" id="nets" placeholder="Data Description" required>
					<br>
					<button type="submit" name="data_price_btn" class="btn btn-success" id="addBtn" onclick="addTo()">Add to</button>
				</form>

			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h5>View added mobile plans</h5>
			</div>
			<div class="panel-body">
				<select class="form-control" id="viewPlans">
					<option selected>Choose network</option>
					<?php
						$sql = "SELECT id, network_name FROM network";
						$result = Database::query($sql);
						if($result->num_rows > 0){
							while($row = Database::fetch_data($result)){
								$net_id = $row['id'];
								$net_name = $row['network_name'];
								echo "
									<option value='{$net_id}'>{$net_name}</option>
								";
							}
						}
					?>
				</select>
				<br>
				<div class="table-responsive">
					<table id="tb" class="table table-striped">
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var hm;
		$("#viewPlans").change(function(){
			var net_identity = $("#viewPlans").val();
			$.post("data_bundles.php?bundles", {bundles:net_identity}, function(response){
				data = JSON.parse(response);
				var disp = data.length-1;
				for(i=0;i<=disp;i++){
					hm+="<tr><td>"+ data[i].network_name +"</td><td>"+ data[i].data_price +"</td><td>"+ data[i].data_desc +"</td><td><button class='btn btn-danger btn-xs'>Del</button></td></tr>";
				}
				$("#tb").html(hm);
				hm="";
			});
		});
	});
</script>