<?php
include('../../config/connect.php');
$tbl_name="usuarios"; // Table name


// username and password sent from form
$myusername=$_GET['usuario'];
$mypassword=$_GET['password'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$encrypted_mypassword=md5($mypassword);

$sql="SELECT * FROM $tbl_name WHERE codigo_usuario='$myusername' and password='$mypassword'";
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
// Register $myusername, $mypassword and redirect to file "login_success.php"
//session_register("myusername");
//session_register("mypassword");
session_start(); 
$_SESSION["user"] = $member_username;
$_SESSION["psw"] = $mypassword;
$_SESSION["level"] = $member_level;
$_SESSION["email_address"] = $member_email;
$_SESSION["id"] = $member_id;


$jsondata_mod['id_usuario'] = $member_id;
$jsondata_mod['nombre_usuario'] = $member_username;
$jsondata_mod['user_level'] = $member_level;
	echo json_encode($jsondata_mod);
}
else {

$jsondata_mod['id_usuario'] = 'no';
	echo json_encode($jsondata_mod);


}
?>

