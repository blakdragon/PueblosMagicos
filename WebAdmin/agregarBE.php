<?php
    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        if($_SESSION['modo'] == 'Usuario') die();
    } else die();

    $nombre = $_POST['nombre'];
    $estado = $_POST['estado'];
    $desc = $_POST['descripcion'];
    $curp = $_SESSION['curp'];

    $sql = "select idpm from pueblomagico";
    $res = mysqli_query($conexion, $sql);	
    $hay = mysqli_num_rows($res) + 1;
    
    $sql = "insert into pueblomagico values($hay, '$nombre', '0, 0, 0', $estado, '$curp', '$desc')";    
    $res = mysqli_query($conexion, $sql);	
    $ret = mysqli_affected_rows($conexion);

    echo $ret;

    

?>