<?php
    session_start();
    include("./../Resources/configBD.php");

    if( isset($_SESSION['modo'])){
        if($_SESSION['modo'] == 'Admin') die();
    } else die();

    $op = $_POST['opcion'];

    if($op == 1){
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

    } else if($op == 2){
        $nombre = $_POST['nombre'];
        
        $sql = "select * from pueblomagico p, estado e where p.idestado = e.idestado and p.nombre = '$nombre'";        
        $res = mysqli_query($conexion, $sql);	
        $tupla = mysqli_fetch_row($res);

        $idpm = $tupla[0];
        $desc = $tupla[5];
        $estado = $tupla[7];        

        $sql = "select nickname, calificacion, comentario from resena where idpm = $idpm and aprovada = 1";
        $res = mysqli_query($conexion, $sql);	
        $resenas = "";
        while($tupla = mysqli_fetch_row($res)){

            $nickr = $tupla[0];
            $calif = $tupla[1];
            $comentario = $tupla[2];

            $resenas .= "<div class=\"divider\"></div>
                        <div class=\"section\">
                        <h5>$nickr - Calificación: $calif</h5>
                        <p>$comentario</p>
                        </div>";
        }

        ?>
        <div class = "row">
            <div class = "col s12 center-align">
                <h3><?php echo $nombre ?></h3>
            </div>            
        </div>
        <div class = "row">
            <div class = "col s12 m8 offset-m2 left-align">
                <b>Estado: <?php echo $estado ?></b>
            </div>            
        </div>

        <div class = "row">
            <div class = "col s12 m6 offset-m3">
                <?php echo $desc ?>
            </div>            
        </div>

        <div class = "row">
            <div class = "col s12 m8 offset-m2 left-align">
                <b>Reseñas:</b>
            </div>            
        </div>

        <div class = row> 
            <div class = "col s12 m6 offset-m3">
                <?php echo $resenas ?>
            </div>          
        <div>

        <div class = "row">
            <form id = "formulario">
                <div class = "col s6 offset-s3 m2 offset-m4 input-field">                                        
                    <select id = "calificacion" name = "calificacion">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>                        
                    <label>Calificación</label>                    
                </div>
                <div class = "col s12 m6 input-field">
                    <textarea id="comentario" name = "comentario" class="materialize-textarea" data-validetta="required"></textarea>
                    <label for="comentario">Comentarios</label>
                </div>

                <input name = "opcion" type = "hidden" value = "3">
                <input name = "nombre" type = "hidden" value = "<?php echo $nombre ?>">                    

                <div class= "input-field col s12 m4 offset-m4">
                    <button class="btn" id = "btn" type="submit" style="width: 100%">Subir Reseña</button>
                </div>

            </form>
        </div>

        <?php

        
    } else {
        $nombre = $_POST['nombre'];
        $calif = $_POST['calificacion'];
        $comentario = $_POST['comentario'];
        $nickname = $_SESSION['nickname'];

        $sql = "select idresena from resena";
        $res = mysqli_query($conexion, $sql);	
        $hay = mysqli_num_rows($res) + 1;

        $sql = "select idpm from pueblomagico where nombre = '$nombre'";
        $res = mysqli_query($conexion, $sql);	
        $tupla = mysqli_fetch_row($res);
        $idpm = $tupla[0];

        $sql = "insert into resena(idresena, nickname, idpm, calificacion, comentario, aprovada) values($hay, '$nickname', $idpm, $calif, '$comentario', 0)";
        $res = mysqli_query($conexion, $sql);	
        $ret = mysqli_affected_rows($conexion);

        echo $ret;

    }

    mysqli_close($conexion);

?>