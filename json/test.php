<?php

$id = $_GET['id'];


$respond= $id;




include('../config/config.php');

	$sql = "SELECT id_presupuesto, codigo_presupuesto, id_usuario, label_operario, timestamp, cliente_nombre FROM presupuestos WHERE id_usuario=1";
	$result = mysql_query($sql) or die('Error, list recogidas failed. ' . mysql_error());
	
$respond= "";
	while ($row = mysql_fetch_assoc($result)) {
		
		
		$respond.= "<li class='listItemPres' data-value='" . $row['id_presupuesto'] . "' >" . $row['id_presupuesto'] .  " - " .  $row['label_operario'] .  " - " . $row['timestamp'] . "</li>";
	
		
		
	
	}








$jsondata_mod['respond'] = $respond;
echo json_encode($jsondata_mod);

?>