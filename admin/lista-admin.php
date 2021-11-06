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
                <h3 class="card-title">Tabla de Administradores</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>

              <?php
          require_once "funciones/funciones.php";
            $resultado = null;
                try{

                  $sql = "SELECT id_admin,usuario,nombre FROM admins;";
                  $resultado = $conn->query($sql);


                }catch(Exception $e){

                  echo $e->get->Message();

                }



              while($admin = $resultado->fetch_assoc()):
              ?>


                  <tr>
                    <td><?php echo $admin["usuario"];?></td>
                    <td><?php echo $admin["nombre"];?></td>
                    <td>
                    <a href="editar-admin.php?id=<?php echo $admin["id_admin"];?>" class="btn bg-orange btn-flat margin">
                    <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a href="#"  data-id="<?php echo $admin["id_admin"];?>" data-tipo="admin" class="btn bg-maroon btn-flat margin borrar-registro">
                    <i class="fas fa-trash-alt"></i>
                  </a>

                    </td>
                  </tr>

                  <?php endwhile; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>

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