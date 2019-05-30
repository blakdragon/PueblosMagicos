<?php

	session_start();    

	if (isset($_SESSION['modo'])) {
		$modo = $_SESSION['modo'];
		if($modo == 'Admin')
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./../WebAdmin\" />");					
	} else {
		die("<meta http-equiv=\"Refresh\" content=\"0; url=./\" />");
    }

?>
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="utf-8" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">	    	  	    
	    <script type="text/javascript" src="./../Resources/js/jquery-3.3.1.min.js"></script>	    
	    <script type="text/javascript" src="./../Resources/validetta/validetta.min.js"></script>
		<script type="text/javascript" src="./../Resources/validetta/validettaLang-es-ES.js"></script> 
	    <script type="text/javascript" src="./../Resources/confirm330/js/jquery-confirm.js"></script>		
	    <script type="text/javascript" src="./../Resources/materialize/js/materialize.min.js"></script>	    
	    <script type="text/javascript" src="./../Resources/js/Usuarios/menu.js"></script>
		<link href="./../Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./../Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./../Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./../Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title>Menú</title>
	</head>
	<body>
	    <div class="container">

            <div class = "row">
                <div class = "col s12 center-align">
                    <h1>Menú</h1>
                </div>
            </div>

            <div class = "row">
                <div class= "input-field col s12 m4 offset-m4">
                    <a href = "pueblosMagicos.php"><button class="btn" type="button" style="width: 100%">Ver Pueblos Mágicos</button></a>
                </div>               

                <div class= "input-field col s12 m4 offset-m4">
                    <a href = "editar.php"><button class="btn" type="button" style="width: 100%">Editar información</button></a>
                </div>
            
                <div class= "input-field col s12 m4 offset-m4">
                    <button class="btn" id = "btn" type="button" style="width: 100%">Cerrar Sesión</button>
                </div>
            </div>

	    </div>
	</body>
</html>