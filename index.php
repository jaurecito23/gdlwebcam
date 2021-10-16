<?php include_once "includes/templates/header.php"; ?>

    <section class="seccion contenedor">
        <h2>La mejor Conferencia de diseño Web en Español</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem laudantium deserunt vitae soluta quam molestiae ipsa quae facere non aliquam fuga, laborum obcaecati optio maiores qui iusto nulla. Quos, temporibus.</p>
    </section><!--Section Intro-->

    <section class="programa ">

        <div class="contenedor-video">

            <video autoplay muted loop poster="bg-talleres.jpg">
                <source src="video/video.mp4" type="video/mp4">
                <source src="video/video.webm" type="video/mp4">
                <source src="video/video.webm" type="video/mp4">
            </video>

        </div>

        <div class="contenido-programa">
          <div class="contenedor">
            <div class="programa-evento">
                <h2>Programa del evento</h2>


                <?php

                              try{

                                  require_once "includes/funciones/db_conexion.php";

                                  $sql = "SELECT * FROM categoria_evento";
                                  $resultado = $conn->query($sql);



                              }catch(\Exception $e){

                                  echo $e->getMessage();

                              }

                    ?>


                <nav class="menu-programa">
                              <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)): ?>



                      <a href="#<?php echo strtolower($cat["cat_evento"])?>"><i class="fa <?php echo $cat['icono'];?>"></i><?php echo $cat["cat_evento"];?></a>

                      <?php endwhile; ?>

                    </nav>
                    <?php
  function mostrar($var){


    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}
                  try{

                      require_once "includes/funciones/db_conexion.php";

                      $sql = "SELECT `evento_id` , `nombre_evento`, `fecha_evento`,`hora_evento`, `cat_evento`,`icono`, `nombre_invitado`, `apellido_invitado`";
                      $sql .= " FROM `eventos` ";
                      $sql .= " INNER JOIN `categoria_evento` ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                      $sql .= " INNER JOIN `invitados` ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " AND eventos.id_cat_evento = '1'";
                      $sql .= " ORDER by evento_id  LIMIT 2; ";
                      $sql .= " SELECT `evento_id` , `nombre_evento`, `fecha_evento`,`hora_evento`, `cat_evento`,`icono`, `nombre_invitado`, `apellido_invitado`";
                      $sql .= " FROM `eventos` ";
                      $sql .= " INNER JOIN `categoria_evento` ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                      $sql .= " INNER JOIN `invitados` ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " AND eventos.id_cat_evento = '2'";
                      $sql .= " ORDER by evento_id  LIMIT 2; ";
                      $sql .= " SELECT `evento_id` , `nombre_evento`, `fecha_evento`,`hora_evento`, `cat_evento`,`icono`, `nombre_invitado`, `apellido_invitado`";
                      $sql .= " FROM `eventos` ";
                      $sql .= " INNER JOIN `categoria_evento` ";
                      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria";
                      $sql .= " INNER JOIN `invitados` ";
                      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
                      $sql .= " AND eventos.id_cat_evento = '3'";
                      $sql .= " ORDER by evento_id  LIMIT 2; ";




                  }catch(\Exception $e){

                      echo $e->getMessage();

                     }
                  ?>

                     <?php  $conn->multi_query($sql); ?>

                     <?php
                     $i = 0;
                     do{
                       $resultado = $conn->store_result();
                       $row = $resultado->fetch_all(MYSQLI_ASSOC);

                   foreach ($row as $evento) { ?>

                    <?php if($i % 2 ==  0): ?>
                        <div id="<?php echo strtolower($evento["cat_evento"])?>" class="info-curso ocultar clearfix">
                      <?php endif; ?>

                        <div class="detalle-evento">
                          <h3><?php echo $evento["nombre_evento"];?></h3>
                          <p><i class="fa fa-clock"></i><?php echo $evento["hora_evento"]; ?> hrs</p>
                          <p><i class="fa fa-calendar"></i><?php echo $evento["fecha_evento"]; ?></p>
                          <p><i class="fa fa-user"></i><?php echo $evento["nombre_invitado"] ." ".$evento["apellido_invitado"];?></p>
                        </div>

                        <?php if($i % 2 ==  1): ?>
                        <a href="calendario.php" class="button float-right">Ver Todos</a>
                        </div><!--Talleres-->
                        <?php endif; ?>

                    <?php $i++;?>
                     <?php   }?><!--Endforeach-->
                          <?php $resultado->free();?>
                    <?php  } while ($conn->more_results() && $conn->next_result()); ?>





            </div><!--Programa-evento-->
          </div><!--Contenedor-->
        </div><!--Contenido - PRograma-->

    </section><!--Section Programa-->



    <?php include_once "includes/templates/invitados.php"; ?>

    <div class="contador parallax">

        <div class="contador">
            <ul class="resumen-evento clearfix">

              <li><p class="numero"></p> Invitados</li>
              <li><p class="numero"></p>Talleres</li>
              <li><p class="numero"></p> Días</li>
              <li><p class="numero"></p>Conferencias</li>
            </ul>
        </div>
    </div>

    <section class="precios seccion">

        <h2>Precios</h2>
          <div class="contenedor">

              <ul class="lista-precios clearfix">

                  <li>
                      <div class="tabla-precio">
                          <h3>Pase por día</h3>
                        <p class="numero"> $30 </p>

                      <ul>
                        <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                        <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                        <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>

                      <a href="#" class="button hollow"> Comprar </a>
                    </div>
                  </li>
                  <li>
                      <div class="tabla-precio">
                          <h3>Todos los dias</h3>
                        <p class="numero"> $50 </p>

                      <ul>
                        <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                        <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                        <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>

                      <a href="#" class="button"> Comprar </a>
                    </div>
                  </li>
                  <li>
                      <div class="tabla-precio">
                          <h3>Pase por 2 días</h3>
                        <p class="numero"> $45 </p>

                      <ul>
                        <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                        <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                        <li><i class="fas fa-check"></i>Todos los Talleres</li>
                      </ul>

                      <a href="#" class="button hollow"> Comprar </a>
                    </div>
                    </li>
              </ul>
           </div>
    </section>


    <div id="mapa" class="mapa"></div>

    <section class="seccion">
      <h2>Testimoniales</h2>
      <div class="testimoniales contenedor clearfix">
      <div class="testimonial">
        <blockquote>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique, dolor ut dignissim tempor, erat lorem blandit nisi, eu ullamcorper mauris tortor eget ligula.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite> Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>

          </footer>
        </blockquote>
      </div><!--Fin de testimonial-->
      <div class="testimonial">
        <blockquote>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique, dolor ut dignissim tempor, erat lorem blandit nisi, eu ullamcorper mauris tortor eget ligula.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite> Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>

          </footer>
        </blockquote>
      </div><!--Fin de testimonial-->
      <div class="testimonial">
        <blockquote>
           <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tristique, dolor ut dignissim tempor, erat lorem blandit nisi, eu ullamcorper mauris tortor eget ligula.</p>
          <footer class="info-testimonial clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite> Oswaldo Aponte Escobedo <span>Diseñador en @prisma</span></cite>

          </footer>
        </blockquote>
      </div><!--Fin de testimonial-->
      </div>
    </section>


    <div class="newsletter parallax">
      <div class="contenedor contenido">

        <p> registrate al newsletter:</p>
        <h3>gdlwebcam</h3>
        <a href="#mc_embed_signup" class="boton_newsletter button transparent">Registro</a>
      </div><!--contenido-->


    </div><!--newsletter-->


    <section class="section">

      <h2>Faltan</h2>
      <div class="cuenta-regresiva clearfix contenedor">
        <ul class="clearfix">
          <li><p id="dias" class="numero"></p>dias</li>
          <li><p id="horas" class="numero"></p>horas</li>
          <li><p id="minutos" class="numero"></p>minutos</li>
          <li><p id="segundos" class="numero"></p>segundos</li>
        </ul>
      </div>
    </section>



    <?php include_once "includes/templates/footer.php";?>