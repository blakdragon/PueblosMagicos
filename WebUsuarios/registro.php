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
	    <script type="text/javascript" src="./../Resources/js/Usuarios/registro.js"></script>
		<link href="./../Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./../Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./../Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./../Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title>Registro</title>
	</head>
	<body>
	    <div class="container">

            <div class = "row">
                <div class = "col s12 center-align">
                    <h1>Nuevo Usuario</h1>
                </div>
            </div>

            <form id = "formulario">

                <div class = "row">
                    <div class= "input-field col s12 m4 offset-m2">                    
                        <input id="nombre" name = "nombre" type="text" data-validetta = "required">
                        <label for="nombre">Nombre</label>
                    </div>
                
                    <div class= "input-field col s12 m4">                    
                        <input id="ap" name = "ap" type="text" data-validetta = "required">
                        <label for="ap">Apellido Paterno</label>
                    </div>

                    <div class= "input-field col s12 m4 offset-m2">                    
                        <input id="am" name = "am" type="text" data-validetta = "required">
                        <label for="am">Apellido Materno</label>
                    </div>
                
                    <div class= "input-field col s12 m4">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="nickname" name = "nickname" type="text" data-validetta = "required,regExp[nickExp]">
                        <label for="nickname">Nickname</label>
                    </div>

                    <div class= "input-field col s12 m4 offset-m2">                    
                    <i class="material-icons prefix">enhanced_encryption</i>
                        <input id="contrasena" name = "contrasena" type="password" data-validetta = "required">
                        <label for="contrasena">Contraseña</label>
                    </div>
                
                    <div class= "input-field col s12 m4">
                        <i class="material-icons prefix">enhanced_encryption</i>
                        <input id="rep" name = "rep" type="password" data-validetta = "required,equalTo[contrasena]">
                        <label for="rep">Repetir Contraseña</label>
                    </div>

                    <div class= "input-field col s12 m4 offset-m2">                    
                        <i class="material-icons prefix">email</i>
                        <input id="correo" name = "correo" type="text" data-validetta = "required,email">
                        <label for="correo">Correo</label>
                    </div>                    
                
                    <div class= "input-field col s12 m4">
                        <button class="btn" id = "btn" type="submit" style="width: 100%">Crear Usuario</button>
                    </div>

                </div>            
            </form>
	    </div>
	</body>
</html>

<?php
	//mysqli_close($conexion);
?>