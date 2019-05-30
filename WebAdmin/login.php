<?php

    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        die();
    }

    $curp = $_POST['curp'];
    $contrasena = $_POST['contrasena'];    

	$sql = "select * from administrador where curp = '$curp' and contrasena = SHA1('$contrasena')";    
    $res = mysqli_query($conexion, $sql	);
	$hay = mysqli_num_rows($res);

    if($hay == 1){
        $tupla = mysqli_fetch_row($res);
        $_SESSION['modo'] = 'Admin';
        $_SESSION['curp'] = $curp;
        $_SESSION['nombre'] = $tupla[2] . ' ' . $tupla[3] . ' ' . $tupla[4];
    }

    echo $hay;

    mysqli_close($conexion);
	
?>