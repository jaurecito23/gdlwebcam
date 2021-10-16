
    <?php

    try{

        require_once "includes/funciones/db_conexion.php";

        $sql = "SELECT * FROM invitados";
        $resultado = $conn->query($sql);


    }catch(\Exception $e){

        echo $e->getMessage();


    }
    ?>

<section class="invitados contenedor seccion">
    <h2>Nuestros Invitados</h2>

<ul class="lista-invitados clearfix">
        <?php while( $invitado = $resultado->fetch_assoc()):?>


                    <li>

                        <div class="invitado">
                     <a class="invitado-info" href="#invitado<?php echo $invitado["invitado_id"];?>">
                        <img src="img/<?php echo $invitado["url_imagen"]; ?>.jpg" alt="Imagen Invitado">
                        <p><?php echo $invitado["nombre_invitado"] ." ". $invitado["apellido_invitado"]?></p>
                        </div>
                    </a>
                    </li>

                    <div style="display: none;">
                        <div class="invitado-info" id="invitado<?php echo $invitado["invitado_id"];?>">

                            <h2> <?php echo $invitado["nombre_invitado"] ." ". $invitado["apellido_invitado"] ?></h2>
                            <img src="img/<?php echo $invitado["url_imagen"]; ?>.jpg" alt="Imagen Invitado">
                              <p><?php echo $invitado["descripcion"]; ?></p>

                        </div>
                    </div>

   <?php endwhile; ?>

   </ul>


</section>