<?php
	require_once("../app/functions.php");
	require_once("../app/database.php");
	if(isset($_POST['bundles'])){
		$bundles = $_POST['bundles'];
		$sql = "SELECT network.network_name, data_price.id, data_price.data_price, data_price.data_desc FROM network, data_price WHERE network.id=network_id AND network_id = '{$bundles}'";
		$result = $database->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
	}
