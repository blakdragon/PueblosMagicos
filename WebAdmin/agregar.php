<?php

    session_start();    
    include("./../Resources/configBD.php");

	if (isset($_SESSION['modo'])) {
		$modo = $_SESSION['modo'];
		if($modo == 'Usuario')
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./../WebUsuarios\" />");					
	} else {
		die("<meta http-equiv=\"Refresh\" content=\"0; url=./\" />");
	}

	$sql = "select * from estado";
    $res = mysqli_query($conexion, $sql);					
    $edos = "";
	while($tupla = mysqli_fetch_row($res))
        $edos .= "<option value = '$tupla[0]'>$tupla[1]</option>\n";

    mysqli_close($conexion);

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
	    <script type="text/javascript" src="./../Resources/js/Admin/agregar.js"></script>
		<link href="./../Resources/confirm330/css/jquery-confirm.css" rel="stylesheet">
		<link href="./../Resources/materialize/css/materialize.min.css" rel="stylesheet">	    
		<link href="./../Resources/validetta/validetta.min.css" rel="stylesheet">		
	    <link href="./../Resources/iconfont/material-icons.css" rel="stylesheet">    	    
	    <title>Agregar Pueblo Mágico</title>
	</head>
	<body>
	    <div class="container">

            <div class = "row">
                <div class = "col s12 center-align">
                    <h1>Agregar Pueblo Mágico</h1>
                </div>
            </div>

            <div class = "row">
                <form id = "formulario">

                    <div class = "col s12 m6 offset-m4 input-field">                
                        <input id="nombre" name = "nombre" type="text" class="validate" data-validetta="required">
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class = "col s6 offset-s3 m2 offset-m4 input-field">                                        
                        <select id = "estado" name = "estado">
                            <?php echo $edos ?>
                        </select>                        
                        <label>Estado</label>                    
                    </div>
                    <div class = "col s12 m6 input-field">
                        <textarea id="descripcion" name = "descripcion" class="materialize-textarea" data-validetta="required"></textarea>
                        <label for="descripcion">Descripción</label>
                    </div>                

                    <div class= "input-field col s12 m4 offset-m4">
                        <button class="btn" id = "btn" type="submit" style="width: 100%">Guardar</button>
                    </div>

                </form>
            </div>

	    </div>
	</body>
</html>