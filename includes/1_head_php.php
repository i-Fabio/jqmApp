<?php
include('config/myfunctions.php');
//Check session
session_start();
if(!isset($_SESSION['user'])){
header("location:login/main_login.php");
}
if(isset($_GET['mailuser'])){
$userMail = $_GET['mailuser'];
$levelMail = $_GET['leveluser'];
$_SESSION["user"] = $userMail;
//$_SESSION["psw"] = $mypassword;
$_SESSION["level"] = $levelMail;
$id=$_SESSION["id"];
}
if(isset($_SESSION['user'])){
$user=$_SESSION["user"];
$level=$_SESSION["level"];
$id=$_SESSION["id"];
$email_address=$_SESSION["email_address"];
$session_login=$level;
}else{
	$session_login=false;
}
?>
