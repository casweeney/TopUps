<?php
	require_once("app/functions.php");
	require_once("app/database.php");
	if(isset($_POST['net'])){
		$net = $_POST['net'];
		$sql = "SELECT data_price FROM data_price WHERE network_id = '{$net}'";
		$result = $database->query($sql);
		$outp = $result->fetch_all(MYSQLI_ASSOC);
		echo json_encode($outp);
	}