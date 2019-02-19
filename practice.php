<?php
	require_once("app/controller.php");
	$sql = "SELECT n.network_name,p.data_desc from network n join data_price p where n.id=p.network_id";
	$result = Database::query($sql);
	$outp = $result->fetch_all(MYSQLI_ASSOC);
	echo json_encode($outp);
?>