<?php
    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        if($_SESSION['modo'] == 'Admin') die();
    } else die();

    $op = $_POST['operacion'];

    if($op == 1){
        $nombre = $_POST['nombre'];
        $ap = $_POST['ap'];
        $am = $_POST['am'];
        $nickname = $_SESSION['nickname'];        
        $correo = $_POST['correo'];

        $sql = "update usuario set nombre = '$nombre', apaterno = '$ap', amaterno = '$am', correo = '$correo' where nickname = '$nickname'";
        mysqli_query($conexion, $sql);
        $ret = mysqli_affected_rows($conexion);
    
        echo $ret;

    } else {

        $nickname = $_SESSION['nickname'];
        $anterior = $_POST['anterior'];
        $contrasena = $_POST['contrasena'];

        $sql = "update usuario set contrasena = SHA1('$contrasena') where nickname = '$nickname' and contrasena = SHA1('$anterior')";
        mysqli_query($conexion, $sql);
        $ret = mysqli_affected_rows($conexion);
    
        echo $ret;

    }

    mysqli_close($conexion);

?>