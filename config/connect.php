<?php $live_mode=true;
if($live_mode==true){
// db properties
$dbhost = '82.194.67.224';
$dbuser = 'gasuser1';
$dbpass = 'oiuwhef78432';
$dbname = 'gas';
}else if($live_mode==false){
// db properties
$dbhost = 'localhost';
$dbuser = 'gasuser1';
$dbpass = 'oiuwhef78432';
$dbname = 'gas';
}else{
echo 'Please set up the $live_mode variabile';
}

mysql_connect($dbhost, $dbuser, $dbpass);
// make a connection to mysql here
$conn = mysql_connect ($dbhost, $dbuser, $dbpass) or die ("I cannot connect to the database because: " . mysql_error());
mysql_select_db ($dbname) or die ("I cannot select the database '$dbname' because: " . mysql_error());
?>


