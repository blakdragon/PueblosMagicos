<?php
    session_start();
    include("./../Resources/configBD.php");

    if(isset($_SESSION['modo'])){
        die();
    }

    $nombre = $_POST['nombre'];
    $ap = $_POST['ap'];
    $am = $_POST['am'];
    $nickname = $_POST['nickname'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];

    $sql = "insert into usuario values('$nickname', SHA1('$contrasena'), '$nombre', '$ap', '$am', '$correo')";        
    mysqli_query($conexion, $sql);
    $ret = mysqli_affected_rows($conexion);
    
    echo $ret;

    mysqli_close($conexion);
?>