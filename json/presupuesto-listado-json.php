<?php

$id = $_GET['id'];
$level = $_GET['level'];

$respond= $id;




include('../config/config.php');

	if($level=='admin'){
		$sql = "SELECT * FROM presupuestos WHERE id_usuario IS NOT NULL ORDER BY id_presupuesto DESC ";
		
	}else if($level=='user'){
		$sql = "SELECT id_presupuesto, codigo_presupuesto, id_usuario, label_operario, timestamp, cliente_nombre FROM presupuestos WHERE id_usuario='$id'  ORDER BY id_presupuesto DESC ";	
			}else{
			$sql = "SELECT id_presupuesto, codigo_presupuesto, id_usuario, label_operario, timestamp, cliente_nombre FROM presupuestos WHERE id_usuario='$id'  ORDER BY id_presupuesto DESC ";		
				}

		
	
	$result = mysql_query($sql) or die('Error, list recogidas failed. ' . mysql_error());
	
$respond= "";

	while ($row = mysql_fetch_assoc($result)) {

	$print_label= "";
	if($level=='admin'){
		$print_label= $row['label_operario'];	
	}	
	$timestamp = $row['timestamp'];
	$rest = substr($timestamp, 0, 10);	
		
		$respond.= "<li class='listItemPres' data-value='" . $row['id_presupuesto'] . "' ><a href=''><h2>" . $row['cliente_nombre']  . $row['level'] .  "</h2><p>" .  $rest . "  " .  $print_label . "</p></a></li>";
	
	}








$jsondata_mod['respond'] = $respond;
echo json_encode($jsondata_mod);

?>