<?php include_once "includes/templates/header.php"; ?>


    <section class="seccion contenedor">


      <h2>Registro de Usuarios</h2>
      <form class="registro" action="pagar.php" method="POST" id="registro">
        <div id="datos_usuarios" class="registro caja clearfix">
          <div class="campo">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre">
          </div>
          <div class="campo">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" placeholder="Tu Apellido">
          </div>
          <div class="campo">
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" placeholder="Tu Email">
          </div>

          <div id="error"></div>
        </div><!--Fin registro-->
        <div id="paquetes" class="paquetes">
          <h3>Elige el número de Boletos</h3>
          <ul class="lista-precios clearfix">

            <li>
                <div class="tabla-precio">
                    <h3>Pase por día (Viernes)</h3>
                  <p class="numero"> $30 </p>

                <ul>
                  <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                  <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                  <li><i class="fas fa-check"></i>Todos los Talleres</li>
                </ul>

                <div class="orden">
                  <label for="pase_dia"> Boletos Deseados: </label>
                  <input type="number" min="1" id="pase_dia" name="boletos[un_dia][cantidad]" size="2" placeholder="0">
                  <input type="hidden"  name="boletos[un_dia][precio]" value="30">
                </div>
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

                <div class="orden">
                  <label for="pase_completo"> Boletos Deseados: </label>
                  <input type="number" min="1" id="pase_completo" name="boletos[completo][cantidad]" size="2" placeholder="0">
                  <input type="hidden"  name="boletos[completo][precio]" value="50">
                </div>
              </div>
            </li>
            <li>
                <div class="tabla-precio">
                    <h3>Pase por 2 días (Viernes y Sábados)</h3>
                  <p class="numero"> $45 </p>

                <ul>
                  <li><i class="fas fa-check"></i>Bocadillos Gratis</li>
                  <li><i class="fas fa-check"></i>Todas las Conferencias</li>
                  <li><i class="fas fa-check"></i>Todos los Talleres</li>
                </ul>

                <div class="orden">
                  <label for="pase_dosdias"> Boletos Deseados: </label>
                  <input type="number" min="1" id="pase_dosdias" name="boletos[dosdias][cantidad]" size="2" placeholder="0">
                  <input type="hidden"  name="boletos[dosdias][precio]" value="45">
                </div>
              </div>
              </li>
        </ul>

        </div><!--Paquetes-->

        <div id="eventos" class="eventos clearfix">

          <h3>Elige tus talleres</h3>
          <div class="caja">
            <div id="viernes" class="contenido-dia clearfix">
              <h4>viernes</h4>
                <div>
                  <p>Talleres</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time>  Responsive</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Seguridad</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00</time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Conferencias</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Seminarios</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                </div>
            </div>


            <div id="sabados" class="contenido-dia clearfix">
              <h4>Sabados</h4>
                <div>
                  <p>Talleres</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time>  Responsive</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Seguridad</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00</time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Conferencias</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Seminarios</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>

            </div>



            <div id="domingos" class="contenido-dia clearfix">
              <h4>Domingos</h4>
                <div>
                  <p>Talleres</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time>  Responsive</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Seguridad</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00</time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Conferencias</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
                <div>
                  <p>Seminarios</p>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>
                  <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time> 10:00 </time> Conferencia</label>

                </div>
            </div>


          </div>

        </div>
        </div><!--Eventos-->


        <div id="resumen" class="resumen">
          <h3>Pago y Extras</h3>
          <div class="caja clearfix">
            <div class="extras">
              <div class="orden">
                  <label for="camisa_evento" > Camisa del evento $10 <small>(Promoción 7% dto.)</small></label>
                  <input type="number" min="0" name="pedido_extra[camisas][cantidad]" id="camisa_evento" placeholder="0" size="3">
                  <input type="hidden"  name="pedido_extra[camisas][precio]" value="10">
              </div><!--Orden-->
              <div class="orden">
                  <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5 , CSS3,JavaScript)</small></label>
                  <input type="number" name="pedido_extra[etiquetas][cantidad]" min="0" id="etiquetas" placeholder="0" size="3">
                  <input type="hidden"  name="pedido_extra[etiquetas][precio]" value="2">
              </div><!--Orden-->
              <div class="orden">
                  <label for="regalo">Seleccione un regalo</label><br><br>
                  <select id="regalo" name="regalo" required>
                    <option value="">--Seleccione un regalo--</option>
                    <option value="1">Pulseras</option>
                    <option value="2">Etiquetas</option>
                    <option value="3">Plumas</option>
                  </select>
              </div><!--Orden-->

              <input type="button" id="calcular"  class="button" value="calcular">

          </div><!--Extras-->

          <div class="total">
            <p>Resumen</p>
            <div id="lista-productos">


            </div>
            <p>Total</p>
            <div id="suma-total">

            </div>

            <input type="hidden" name="total_pedido" id="total_pedido" >
            <input id="btnRegistro" type="submit" name="submit" class="button" value="Pagar">

          </div><!--Total-->
        </div><!--Caja-->
      </div><!--Resument-->

        </form>

      </section>


      <?php include_once "includes/templates/footer.php";?>






