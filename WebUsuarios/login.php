<?php

    session_start();
    include("./../Resources/configBD.php");

    if(isset($_SESSION['modo'])){
        die();
    }

    $nickname = $_POST['nickname'];
    $contrasena = $_POST['contrasena'];    

	$sql = "select * from usuario where nickname = '$nickname' and contrasena = SHA1('$contrasena')";    
    $res = mysqli_query($conexion, $sql	);
	$hay = mysqli_num_rows($res);

    if($hay == 1){
        $tupla = mysqli_fetch_row($res);
        $_SESSION['modo'] = 'Usuario';
        $_SESSION['nickname'] = $nickname;
        $_SESSION['nombre'] = $tupla[2] . ' ' . $tupla[3] . ' ' . $tupla[4];
    }

    echo $hay;

    mysqli_close($conexion);
	
?>