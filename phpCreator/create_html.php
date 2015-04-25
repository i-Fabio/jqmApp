

<?php
$array = array('id_usuario', 'label_operario', 'cliente_nombre', 'cliente_dni', 'cliente_direccion', 'cliente_municipio', 'cliente_cp', 'operario_telefono', 'cliente_movil', 'cliente_email', 'numero_ot', 'marca_caldera', 'modelo_caldera', 'matricula_caldera');



$fields = array(
    0 => array(
        'field' => 'id_usuario',
        'label' => 'usuario'
    ),
    1 => array(
        'field' => 'label_operario',
        'label' => 'Operario'
    ),
	2 => array(
        'field' => 'cliente_nombre',
        'label' => 'Nombre Cliente'
    ),
	3 => array(
        'field' => 'cliente_dni',
        'label' => 'DNI'
    ),
	4 => array(
        'field' => 'cliente_direccion',
        'label' => 'Direcci&oacute;n'
    ),
	5 => array(
        'field' => 'cliente_municipio',
        'label' => 'Municipio'
    ),
	6 => array(
        'field' => 'cliente_cp',
        'label' => 'cliente_cpCP'
    ),
	7 => array(
        'field' => 'operario_telefono',
        'label' => 'Telefono Operario'
    ),
	8 => array(
        'field' => 'cliente_movil',
        'label' => 'Movil'
    ),
	9 => array(
        'field' => 'numero_ot',
        'label' => 'Numero OT'
    ),
	10 => array(
        'field' => 'marca_caldera',
        'label' => 'Marca Caldera'
    ),
	11 => array(
        'field' => 'matricula_caldera',
        'label' => 'Matricula Caldera'
    ),
	12 => array(
        'field' => 'desc_concepto1',
        'label' => 'Concepto 1'
    ),
	13 => array(
        'field' => 'desc_concepto2',
        'label' => 'Concepto 2'
    ),
	14 => array(
        'field' => 'desc_concepto3',
        'label' => 'Concepto 3'
    ),
	15 => array(
        'field' => 'desc_concepto4',
        'label' => 'Concepto 4'
    ),
	16 => array(
        'field' => 'desc_concepto5',
        'label' => 'Concepto 5'
    ),
	17 => array(
        'field' => 'precio_concepto1',
        'label' => 'Precio 1'
    ),
	18 => array(
        'field' => 'precio_concepto2',
        'label' => 'Precio 2'
    ),
	19 => array(
        'field' => 'precio_concepto3',
        'label' => 'Precio 3'
    ),
	20 => array(
        'field' => 'precio_concepto4',
        'label' => 'Precio 4'
    ),
	21 => array(
        'field' => 'precio_concepto5',
        'label' => 'Precio 5'
    ),
	22 => array(
        'field' => 'total',
        'label' => 'Total'
    ),
	23 => array(
        'field' => 'iva',
        'label' => '21% IVA'
    ),
	24 => array(
        'field' => 'total_iva',
        'label' => 'Total + iva'
    ),
	25 => array(
        'field' => 'observaciones',
        'label' => 'Observaciones'
    ),
	26 => array(
        'field' => 'estado_presupuesto',
        'label' => 'Estado del Ticket'
    ),
	27 => array(
        'field' => 'acepta',
        'label' => 'Acepta'
    ),
	
	
	
);


foreach ($fields as $field)
{
   
	echo "<tr><td>" . $field['label'] . "</td><td>\" . \$row['" . $field['field'] . "'] . \"</td></tr>";
}






echo "\n";	
echo '<br /><br /><br /><br />-------FIELD VALUE--------<br /><br /><br /><br />';
echo "\n";	



foreach ($fields as $field) {
   
    echo "var " .  $field['field'] . " = $('#" .  $field['field'] . "').val();";
	echo "\n";	
	
}

echo '<br /><br /><br /><br />-------JSON DATA INPUT--------<br /><br /><br /><br />';
echo "\n";	


foreach ($fields as $field) {
  
	echo $field['field'] . ": " . $field['field'] . ", ";
	
}

echo '<br /><br /><br /><br />------PGP GET VARIABLE-------<br /><br /><br /><br />';
echo "\n";	

foreach ($fields as $field) {
  
	echo "$" . $field['field'] . "= \$_GET['" . $field['field'] . "'];";
echo "\n";	
	
}

echo '<br /><br /><br /><br />------MYSQL INSERT FIELD-------<br /><br /><br /><br />';
echo "\n";	

foreach ($fields as $field) {
  
	echo $field['field'] . ",";
	echo "\n";	
	
}


echo '<br /><br /><br /><br />-------MYSQL INSERT VALUE--------<br /><br /><br /><br />';
echo "\n";	

foreach ($fields as $field) {
  
	echo "'$" . $field['field'] . "',";
	echo "\n";	
	
}

echo '<br /><br /><br /><br />-------MYSQL SELECT DETALLE--------<br /><br /><br /><br />';
echo "\n";	

foreach ($fields as $field) {
  
	echo $field['field'] . ",";

	
}





echo '<br /><br /><br /><br />-------TABLE DETALLA--------<br /><br /><br /><br />';
echo "\n";

echo "<table>";



$counter=0;

foreach ($fields as $field)
{
   if($counter==0){
	echo "<tr><td colspan='2'><strong>Ticket Lonix Invest, S.L.</strong></td><tr>";
	}
	if($counter==4){
	echo "<tr><td colspan='2'><strong>Datos del cliente</strong></td><tr>";
	}
	if($counter==7){
	echo "<tr><td colspan='2'><strong>Info. Mantto. Caldera</strong></td><tr>";
	}
	if($counter==9){
	echo "<tr><td colspan='2'><strong>Trabajos comprendidos</strong></td><tr>";
	}
	if($counter==25){
	echo "<tr><td colspan='2'><strong>Observacines</strong></td><tr>";
	}
	echo "<tr><td>" . $field['label'] . "</td><td>\" . \$row['" . $field['field'] . "'] . \"</td></tr>";
	$counter++;
}

echo "</table>";




echo '<br /><br /><br /><br />-------ADD PRESUPUESTO--------<br /><br /><br /><br />';
echo "\n";
echo "\n";
echo "\n";

$counterInput=0;


$formulario = "";
$formulario.= "<ul>";
foreach ($fields as $field)
{




$formulario.= '<li class="ui-field-contain"><label for="' .  $field['field'] .'">' .  $field['label'] .'</label>';
$formulario.= '<input data-clear-btn="true" id="' .  $field['field'] .'" name="' .  $field['field'] .'" type="text" value=""></li>';

 
    $counterInput++;
}
$formulario.= "</ul>";
echo $formulario;
?>


