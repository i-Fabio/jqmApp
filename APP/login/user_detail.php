<?php
include('../../config/connect.php');
$tbl_name="usuarios"; // Table name


// username and password sent from form
$myusername=$_GET['user'];


$sql="SELECT * FROM $tbl_name WHERE codigo_usuario='$myusername'";
$result=mysql_query($sql);
while ($rowMember = mysql_fetch_assoc($result)) {	
	$member_level=$rowMember['level'];
	$member_email=$rowMember['email'];
	$member_username=$rowMember['nombre_usuario'];
	$member_id=$rowMember['id_usuario'];
}
// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

$user_details='<h1>' . $member_username . '</h1>' . '<p>ID: ' . $member_id . '</p>' . '<p>LEVEL: ' . $member_level . '</p>';

$jsondata_mod['id_usuario'] = $member_id;
$jsondata_mod['user_details'] = $user_details;
$jsondata_mod['user_level'] = $member_level;
	echo json_encode($jsondata_mod);
}
else {

$jsondata_mod['id_usuario'] = 'no';
	echo json_encode($jsondata_mod);


}
?>

