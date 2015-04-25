<?php
$parent = dirname($_SERVER['REQUEST_URI']);
$serverPath = dirname(__FILE__);
//echo $parent;
//echo " --- " . $serverPath;

require_once('../includes/2_head_html.php'); 
?>

<form action="checklogin.php" method="post" enctype="" name="login_form" id="login_form">
  		<fieldset class="">
      
       			
                <label class="login_label" for="myusername_label">Operario</label>
            	<input name="myusername" class="login_input" onClick="this.select();" id="myusername" value=""><br />

                
                <label  class="login_label" for="mypassword_label" >Contrase&ntilde;a</label>
                <input name="mypassword" class="login_input" onClick="this.select();" id="mypassword" type="password" value=""><br />
   
        
         <input type="submit" name="Submit" value="Acceder >" class="login_btn">
     
     	</fieldset>
 </form>
 