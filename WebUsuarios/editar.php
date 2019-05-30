<?php

    session_start();    
    include("./../Resources/configBD.php");

	if (isset($_SESSION['modo'])) {
		$modo = $_SESSION['modo'];
		if($modo == 'Admin')
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./../WebAdmin\" />");					
	} else {
		die("<meta http-equiv=\"Refresh\" content=\"0; url=./\" />");
    }
    
    $nickname = $_SESSION['nickname'];

	$sql = "select * from usuario where nickname = '$nickname'";
    $res = mysqli_query($conexion, $sql);					
    $tupla = mysqli_fetch_row($res);

    $nombre = $tupla[2];
    $ap = $tupla[3];
    $am = $tupla[4];
    $correo = $tupla[5];

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
	    <script type="text/javascript" src="./../Resources/js/Usuarios/editar.js"></script>
		<link href="./../Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./../Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./../Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./../Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title></title>
	</head>
	<body>
	    <div class="container">

            <div class = "row">
                <div class = "col s12 center-align">
                    <h1>Editar Información</h1>
                </div>
            </div>

            <div class = "divider"></div>            
            <div class = "section">
                <div class = "row"><h5>Información Personal</h5></div>
                <form id = "formulario1">

                    <input type = "hidden" name = "operacion" value ="1">

                    <div class = "row">
                        <div class= "input-field col s12 m4 offset-m2">                    
                            <input id="nombre" name = "nombre" type="text" data-validetta = "required" value = '<?php echo $nombre;?>'>
                            <label for="nombre" class = "active">Nombre</label>
                        </div>
                    
                        <div class= "input-field col s12 m4">                    
                            <input id="ap" name = "ap" type="text" data-validetta = "required" value = '<?php echo $ap;?>'>
                            <label for="ap" class = "active">Apellido Paterno</label>
                        </div>

                        <div class= "input-field col s12 m4 offset-m2">                    
                            <input id="am" name = "am" type="text" data-validetta = "required" value = '<?php echo $am;?>'>
                            <label for="am" class = "active">Apellido Materno</label>
                        </div>
                    
                        <div class= "input-field col s12 m4">
                            <i class="material-icons prefix">account_circle</i>
                            <input disabled id="nickname" name = "nickname" type="text" data-validetta = "required,regExp[nickExp]" value = '<?php echo $nickname;?>' >
                            <label for="nickname">Nickname</label>
                        </div>                    
                
                        <div class= "input-field col s12 m4 offset-m2">                    
                            <i class="material-icons prefix">email</i>
                            <input id="correo" name = "correo" type="text" data-validetta = "required,email" value = '<?php echo $correo?>'>
                            <label for="correo" class = "active">Correo</label>
                        </div>
                    
                        <div class= "input-field col s12 m4">
                            <button class="btn" id = "btn1" type="submit" style="width: 100%">Actualizar</button>
                        </div>

                    </div>            
                </form>
            </div>
            <div class = "divider"></div>            
            <div class = "section">
                <div class = "row"><h5>Información de Ingreso</h5></div>
                <form id = "formulario2">                                            

                    <input type = "hidden" name = "operacion" value ="2">
                    <div class = "row">
                        <div class= "input-field col s12 m4 offset-m2">                    
                            <i class="material-icons prefix">enhanced_encryption</i>
                            <input id="anterior" name = "anterior" type="password" data-validetta = "required">
                            <label for="anterior">Contraseña Anterior</label>
                        </div>

                        <div class= "input-field col s12 m4">                    
                        <i class="material-icons prefix">enhanced_encryption</i>
                            <input id="contrasena" name = "contrasena" type="password" data-validetta = "required">
                            <label for="contrasena">Nueva Contraseña</label>
                        </div>
                    
                        <div class= "input-field col s12 m4 offset-m2">
                            <i class="material-icons prefix">enhanced_encryption</i>
                            <input id="rep" name = "rep" type="password" data-validetta = "required,equalTo[contrasena]">
                            <label for="rep">Repetir Contraseña</label>
                        </div>                        
                    
                        <div class= "input-field col s12 m4">
                            <button class="btn" id = "btn2" type="submit" style="width: 100%">Actualizar</button>
                        </div>

                    </div>            
                </form>
            </div>
	    </div>
	</body>
</html>

<?php
	//mysqli_close($conexion);
?>