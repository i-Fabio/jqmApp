<?php

$id = $_GET['id'];

$respond= $id;




include('../config/config.php');

	$sql = "SELECT  id_usuario,label_operario,cliente_nombre,cliente_dni,cliente_direccion,cliente_municipio,cliente_cp,operario_telefono,cliente_movil,numero_ot,marca_caldera,matricula_caldera,desc_concepto1,desc_concepto2,desc_concepto3,desc_concepto4,desc_concepto5,precio_concepto1,precio_concepto2,precio_concepto3,precio_concepto4,precio_concepto5,total,iva,total_iva,observaciones,estado_presupuesto,acepta FROM presupuestos WHERE id_presupuesto=$id";
	$result = mysql_query($sql) or die('Error, list recogidas failed. ' . mysql_error());
	
$respond= "";
	while ($row = mysql_fetch_assoc($result)) {
		
		$respond.= '<form><input class="print_button" type="button" value="Imprimir Ticket" onClick="window.print()"></form>';
		$respond.= "<h1>Detalle Presupuesto</h1>";
	
		$respond.= '<table class="ui-responsive table-stroke">';
		
		$respond.= "<tr><td colspan='2'><strong>Ticket Lonix Invest, S.L.</strong></td><tr><tr><td>usuario</td><td>" . $row['id_usuario'] . "</td></tr><tr><td>Operario</td><td>" . $row['label_operario'] . "</td></tr><tr><td>Nombre Cliente</td><td>" . $row['cliente_nombre'] . "</td></tr><tr><td>DNI</td><td>" . $row['cliente_dni'] . "</td></tr><tr><td colspan='2'><strong>Datos del cliente</strong></td><tr><tr><td>Direcci&oacute;n</td><td>" . $row['cliente_direccion'] . "</td></tr><tr><td>Municipio</td><td>" . $row['cliente_municipio'] . "</td></tr><tr><td>cliente_cpCP</td><td>" . $row['cliente_cp'] . "</td></tr><tr><td colspan='2'><strong>Info. Mantto. Caldera</strong></td><tr><tr><td>Telefono Operario</td><td>" . $row['operario_telefono'] . "</td></tr><tr><td>Movil</td><td>" . $row['cliente_movil'] . "</td></tr><tr><td colspan='2'><strong>Trabajos comprendidos</strong></td><tr><tr><td>Numero OT</td><td>" . $row['numero_ot'] . "</td></tr><tr><td>Marca Caldera</td><td>" . $row['marca_caldera'] . "</td></tr><tr><td>Matricula Caldera</td><td>" . $row['matricula_caldera'] . "</td></tr><tr><td>Concepto 1</td><td>" . $row['desc_concepto1'] . "</td></tr><tr><td>Concepto 2</td><td>" . $row['desc_concepto2'] . "</td></tr><tr><td>Concepto 3</td><td>" . $row['desc_concepto3'] . "</td></tr><tr><td>Concepto 4</td><td>" . $row['desc_concepto4'] . "</td></tr><tr><td>Concepto 5</td><td>" . $row['desc_concepto5'] . "</td></tr><tr><td>Precio</td><td>" . $row['precio_concepto1'] . "</td></tr><tr><td>Precio</td><td>" . $row['precio_concepto2'] . "</td></tr><tr><td>Precio</td><td>" . $row['precio_concepto3'] . "</td></tr><tr><td>Precio</td><td>" . $row['precio_concepto4'] . "</td></tr><tr><td>Precio</td><td>" . $row['precio_concepto5'] . "</td></tr><tr><td>Total</td><td>" . $row['total'] . "</td></tr><tr><td>21% IVA</td><td>" . $row['iva'] . "</td></tr><tr><td>Total + iva</td><td>" . $row['total_iva'] . "</td></tr><tr><td colspan='2'><strong>Observacines</strong></td><tr><tr><td>Observaciones</td><td>" . $row['observaciones'] . "</td></tr><tr><td>Estado del Ticket</td><td>" . $row['estado_presupuesto'] . "</td></tr><tr><td>Aceopta</td><td>" . $row['acepta'] . "</td></tr>";
		
		$respond.= '</table>';
		
	}








$jsondata_mod['respond'] = $respond;
echo json_encode($jsondata_mod);

?>
