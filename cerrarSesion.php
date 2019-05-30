<?php
    session_start();    
	if(isset($_SESSION['modo'])){		
		session_unset();
		session_destroy();		
	} 		
?>