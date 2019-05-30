<?php
    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        if($_SESSION['modo'] == 'Admin') die();
    } else die();

    $sql = "select nombre from pueblomagico";
    $res = mysqli_query($conexion, $sql);				
    
    $ret = "{";
    $primero = true;
	while($tupla = mysqli_fetch_row($res)){
        if(!$primero)
            $ret .= ",";
        $ret .= "\"" . $tupla[0] . "\"" . ": null";
        $primero = false;
    }

    $ret .= "}";

    echo $ret;

    mysqli_close($conexion);

?>