<?php

	session_start();

    if (isset($_SESSION['modo'])) {
        $modo = $_SESSION['modo'];

        if($modo == 'Admin'){
            die("<meta http-equiv=\"Refresh\" content=\"0; url=./WebAdmin\" />");
        } else if($modo == 'Usuario'){
            die("<meta http-equiv=\"Refresh\" content=\"0; url=./WebUsuarios\" />");
        }
    }	

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	  	    
	    <script type="text/javascript" src="./Resources/js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./Resources/validetta/validetta.min.js"></script>
		<script type="text/javascript" src="./Resources/validetta/validettaLang-es-ES.js"></script> 
	    <script type="text/javascript" src="./Resources/confirm330/js/jquery-confirm.js"></script>		
	    <script type="text/javascript" src="./Resources/materialize/js/materialize.min.js"></script>	    	    
		<link href="./Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title>Seleccionar</title>
	</head>
	<body>
	    <div class="container">

            <div class="row">
				<div class="col s12 center-align">
					<h1>INICIO</h1>	
				</div>
			</div>			
			<div class="row">
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="./WebAdmin"><button class="btn" style="width: 100%">Administrador</button></a>
		        </div>
				<div class="col s12 m6 offset-m3 input-field">
		            <a href="./WebUsuarios"><button class="btn" style="width: 100%">Usuario</button></a>
		        </div>				        
		     </div>		

	    </div>
	</body>
</html>