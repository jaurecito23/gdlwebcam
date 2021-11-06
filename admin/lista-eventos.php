<?php include_once "funciones/sessiones.php"; ?>

<?php include_once "templates/header.php"; ?>


  <!-- BARRA -->
    <?php include_once "templates/barra.php"; ?>
    <!-- BARRA -->

  <!-- NAVEGACION -->
  <?php include_once "templates/navegacion.php"; ?>

  <!-- NAVEGACION -->

  <div class="content-wrapper">
<!-- CONTENT -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tabla de Eventos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

              <?php
          require_once "funciones/funciones.php";
            $resultado = null;
                try{

                  $sql = "SELECT evento_id,nombre_evento,fecha_evento,hora_evento,id_cat_evento,cat_evento,nombre_invitado,apellido_invitado ";
                  $sql .= " FROM eventos ";
                  $sql .= " INNER JOIN categoria_evento ";
                  $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
                  $sql .= " INNER JOIN invitados ";
                  $sql .= " ON eventos.id_inv = invitados.invitado_id;";



                  $resultado = $conn->query($sql);


                }catch(Exception $e){

                  echo $e->get->Message();

                }



              while($evento = $resultado->fetch_assoc()):
              ?>


                  <tr>
                    <td><?php echo $evento["nombre_evento"];?></td>
                    <td><?php echo $evento["hora_evento"];?></td>
                    <td><?php echo $evento["fecha_evento"];?></td>
                    <td><?php echo $evento["cat_evento"];?></td>
                    <td><?php echo $evento["nombre_invitado"]; echo $evento["apellido_invitado"];?></td>
                    <td>
                    <a href="editar-evento.php?id=<?php echo $evento["evento_id"];?>" class="btn bg-orange btn-flat margin">
                    <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="#"  data-id="<?php echo $evento["evento_id"];?>" data-tipo="evento" class="btn bg-maroon btn-flat margin borrar-registro">
                    <i class="fas fa-trash-alt"></i>
                  </a>

                    </td>
                  </tr>

                  <?php endwhile; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


<!-- CONTENT -->
</div>
  <!-- /.content-wrapper -->


 <!-- FOOTER -->
 <?php include_once "templates/footer.php"; ?>
 <!-- FOOTER -->
