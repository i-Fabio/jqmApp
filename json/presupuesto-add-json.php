<?php

include('../config/config.php');
	
$id_usuario= $_GET['id_usuario'];
$label_operario= $_GET['label_operario'];
$cliente_nombre= $_GET['cliente_nombre'];
$cliente_dni= $_GET['cliente_dni'];
$cliente_direccion= $_GET['cliente_direccion'];
$cliente_municipio= $_GET['cliente_municipio'];
$cliente_cp= $_GET['cliente_cp'];
$operario_telefono= $_GET['operario_telefono'];
$cliente_movil= $_GET['cliente_movil'];
$numero_ot= $_GET['numero_ot'];
$marca_caldera= $_GET['marca_caldera'];
$matricula_caldera= $_GET['matricula_caldera'];
$desc_concepto1= $_GET['desc_concepto1'];
$desc_concepto2= $_GET['desc_concepto2'];
$desc_concepto3= $_GET['desc_concepto3'];
$desc_concepto4= $_GET['desc_concepto4'];
$desc_concepto5= $_GET['desc_concepto5'];
$precio_concepto1= $_GET['precio_concepto1'];
$precio_concepto2= $_GET['precio_concepto2'];
$precio_concepto3= $_GET['precio_concepto3'];
$precio_concepto4= $_GET['precio_concepto4'];
$precio_concepto5= $_GET['precio_concepto5'];
$total= $_GET['total'];
$iva= $_GET['iva'];
$total_iva= $_GET['total_iva'];
$observaciones= $_GET['observaciones'];
$estado_presupuesto= $_GET['estado_presupuesto'];
$acepta= $_GET['acepta'];
	

$result = mysql_query("INSERT INTO presupuestos (		
				id_usuario,
label_operario,
cliente_nombre,
cliente_dni,
cliente_direccion,
cliente_municipio,
cliente_cp,
operario_telefono,
cliente_movil,
numero_ot,
marca_caldera,
matricula_caldera,
desc_concepto1,
desc_concepto2,
desc_concepto3,
desc_concepto4,
desc_concepto5,
precio_concepto1,
precio_concepto2,
precio_concepto3,
precio_concepto4,
precio_concepto5,
total,
iva,
total_iva,
observaciones,
estado_presupuesto,
acepta
				) 
			  VALUES (		
					'$id_usuario',
'$label_operario',
'$cliente_nombre',
'$cliente_dni',
'$cliente_direccion',
'$cliente_municipio',
'$cliente_cp',
'$operario_telefono',
'$cliente_movil',
'$numero_ot',
'$marca_caldera',
'$matricula_caldera',
'$desc_concepto1',
'$desc_concepto2',
'$desc_concepto3',
'$desc_concepto4',
'$desc_concepto5',
'$precio_concepto1',
'$precio_concepto2',
'$precio_concepto3',
'$precio_concepto4',
'$precio_concepto5',
'$total',
'$iva',
'$total_iva',
'$observaciones',
'$estado_presupuesto',
'$acepta'
			  )");
if (!$result) {
die('Could not query:' . mysql_error());
}else{
	
	
	}

$jsondata_mod['respond'] = $label_operario;
	echo json_encode($jsondata_mod);
?>
