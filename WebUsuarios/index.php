<?php

	session_start();    

	if (isset($_SESSION['modo'])) {
		$modo = $_SESSION['modo'];
		if($modo == 'Admin')
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./../WebAdmin\" />");
		else
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./menu.php\" />");
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
	    <script type="text/javascript" src="./../Resources/js/Usuarios/index.js"></script>
		<link href="./../Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./../Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./../Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./../Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title>Usuario - Página principal</title>
	</head>
	<body>
	    <div class="container">            

            <div class="row">
				<div class="col s12 center-align">
					<h1>Inicio Sesión Usuarios</h1>	
				</div>
            </div>	
            
            <div class="row"></div>
            <div class="row"></div>   
            
            <form id = "formulario">
            
                <div class="row">
                    <div class="input-field col m4 offset-m1 s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nickname" name = "nickname" type="text" data-validetta = "required">
                        <label for="nickname">Nickname</label>
                    </div>            
                    <div class="input-field col m4 offset-m2 s12">
                        <i class="material-icons prefix">enhanced_encryption</i>
                        <input id="contrasena" name = "contrasena" type="password" data-validetta = "required">
                        <label for="contrasena">Contraseña</label>
                    </div>
                </div>            
                
                <div class="row">
                    <div class="col s12 m3 offset-m3 input-field">
                        <button class="btn" id = "btn" type="submit" style="width: 100%">Login</button>
					</div>					
					<div class="col s12 m3 input-field">
						<a href="registro.php"><button class="btn" type="button" style="width: 100%">Crear Cuenta</button></a>
					</div>
				</div>
				
            </form>

	    </div>
	</body>
</html>