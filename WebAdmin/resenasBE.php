<?php
    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        if($_SESSION['modo'] == 'Usuario') die();
    } else die();

    $idresena = $_POST['idresena'];
    $curp = $_SESSION['curp'];

    $sql = "update resena set curp = '$curp', aprovada = 1 where idresena = $idresena";    
    $res = mysqli_query($conexion, $sql);	    
    $ret = mysqli_affected_rows($conexion);

    echo $ret;

    

?>