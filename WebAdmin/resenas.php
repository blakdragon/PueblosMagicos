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

	$sql = "select idresena, nickname, calificacion, comentario, nombre from resena r, pueblomagico p where r.idpm = p.idpm and aprovada = 0";
    $res = mysqli_query($conexion, $sql);					
    $resenas = "";    
	while($tupla = mysqli_fetch_row($res)){

        $idresena = $tupla[0];
        $nickname = $tupla[1];
        $calif = $tupla[2];
        $comentario = $tupla[3];
        $estado = $tupla[4];

        $resenas .= "<div id = \"lugar$idresena\">
                    <div class=\"divider\"></div>
                    <div class=\"section\">
                    <h5>$estado - $nickname - Calificación: $calif</h5>
                    <p>$comentario</p>
                    <button class=\"btn\" type=\"button\" onclick = \"Aprovar($idresena)\">Aprovar</button>
                    </div></div>";
    }

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
	    <script type="text/javascript" src="./../Resources/js/Admin/resenas.js"></script>
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
                    <h1>Aprovar Reseñas</h1>
                </div>
            </div>

            <?php echo $resenas; ?>

	    </div>
	</body>
</html>