<?php

error_reporting(0);
if(isset($_POST['tc']))
{
	$tc=$_POST['tc'];

	
    echo file_get_contents("http://makima.69.mu/apiler/gsm.php?auth=makimadogs&gsm=$tc");
	

}

?>