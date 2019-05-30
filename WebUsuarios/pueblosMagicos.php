<?php

	session_start();    

	if (isset($_SESSION['modo'])) {
		$modo = $_SESSION['modo'];
		if($modo == 'Admin')
			die("<meta http-equiv=\"Refresh\" content=\"0; url=./../WebAdmin\" />");					
	} else {
		die("<meta http-equiv=\"Refresh\" content=\"0; url=./\" />");
	}

	//$sql = "consulta";
	//$res = mysqli_query($conexion, $sql);				
	//$sql1 = "select rfc, nombre, codigo from ganador where ";
	//$res = mysqli_query($conexion, $sql1);
	//while($tupla = mysqli_fetch_row($res)){

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
	    <script type="text/javascript" src="./../Resources/js/Usuarios/pueblosMagicos.js"></script>
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
					<h1>Ver Pueblos Mágicos</h1>
				</div>                
			</div>

            <div class="row">
                <div class="col s12">                
                    <div class="input-field col s12 m6 offset-m3">
                        <i class="material-icons prefix">textsms</i>
                        <input type="text" id="nombre" class="autocomplete">
                        <label for="nombre">Nombre</label>
                    </div>            
                </div>        
            </div>

			<div id = "resultado"></div>

	    </div>
	</body>
</html>

<?php
	//mysqli_close($conexion);
?>