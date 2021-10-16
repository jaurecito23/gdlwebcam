<?php include_once "includes/templates/header.php"; ?>


    <section class="section galeria-contenedor  contenedor">
      <h2>Calendario de Eventos</h2>

      <?php






        try{

            require_once "includes/funciones/db_conexion.php";

            $sql = "SELECT evento_id , nombre_evento, fecha_evento,hora_evento, cat_evento,icono, nombre_invitado, apellido_invitado ";
            $sql .= " FROM eventos ";
            $sql .= " INNER JOIN categoria_evento ";
            $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
            $sql .= " INNER JOIN invitados ";
            $sql .= " ON eventos.id_inv = invitados.invitado_id ";
            $sql .= " ORDER by evento_id";



            $resultado = $conn->query($sql);


        }catch(\Exception $e){

            echo $e->getMessage();


        }

      ?>

        <div class="calendario">
                <?php
                $calendario = [];
                while($eventos = $resultado->fetch_assoc()){


                    $categoria = $eventos["cat_evento"];
                    $fecha = $eventos["fecha_evento"];
                    $evento = array(

                        'titulo' => $eventos["nombre_evento"],
                        "fecha" => $eventos["fecha_evento"],
                        "hora" => $eventos["hora_evento"],
                        "categoria"=> $eventos["cat_evento"],
                        "invitado"=> $eventos["nombre_invitado"]." ".  $eventos["apellido_invitado"],
                        "icono"=>"fa"." ".$eventos["icono"]
                    );


                   $calendario[$fecha][] = $evento;
                }
            ?>

                <?php
                    //Imprime todos los eventos

                        foreach ($calendario as $dia => $lista_eventos):?>


                            <h3>

                                <i class="fa fa-calendar"> </i>
                                <?php

                            // Para mostrar la fecha muchos mas lindas

                                setlocale(LC_TIME, 'spanish');
                                setlocale(LC_TIME,"es_ES.UTF-8");
                                echo  strftime( "%A, %d de %B del %Y", strtotime($dia)); ?>

                            </h3>

                            <?php foreach ($lista_eventos as $evento):?>


                                <div class="dia">

                                    <p class="titulo"><?php echo $evento["titulo"];?></p>
                                    <p class="hora"><i class="fa fa-clock" aria-hidden="true"></i><?php echo $evento["hora"]. " " . $evento["fecha"];?></p>
                                    <p class="categoria"><i class="<?php echo $evento["icono"]; ?> aria-hidden="true"></i><?php echo $evento["categoria"];?></p>
                                    <p class=""><i class="fa fa-user" aria-hidden="true"></i><?php echo $evento["invitado"];?></p>

                                </div>


                            <?php endforeach; // De eventos?>



                    <?php endforeach; // De dias?>
                                <?php $conn->close();?>
        </div><!--calendario-->

    </section>





    <?php include_once "includes/templates/footer.php";?>
