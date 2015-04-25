<?php

include('../config/config.php');
	
	$id_usuario = $_POST['id_usuario'];
	$label_operario = $_POST['label_operario'];
	$cliente_nombre = $_POST['cliente_nombre'];
	


$result = mysql_query("INSERT INTO presupuestos (		
				id_usuario,
				label_operario,
				cliente_nombre
				) 
			  VALUES (		
					'$id_usuario',
					'$label_operario',
					'$cliente_nombre'
			  )");
if (!$result) {
die('Could not query:' . mysql_error());
}else{
	
	$jsondata_mod['respond'] = $label_operario;
	echo json_encode($jsondata_mod);
	header("Location: ../index.php");
	}


?>
