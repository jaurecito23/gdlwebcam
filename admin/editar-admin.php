<?php include_once "funciones/sessiones.php"; ?>
<?php require_once "funciones/funciones.php";?>


<?php

  $id = intval($_GET["id"] ?? null);

  if(!filter_var($id,FILTER_VALIDATE_INT)){

      die("Error!");

  };

?>



<?php include_once "templates/header.php"; ?>


  <!-- BARRA -->
    <?php include_once "templates/barra.php"; ?>
    <!-- BARRA -->

  <!-- NAVEGACION -->
  <?php include_once "templates/navegacion.php"; ?>

  <!-- NAVEGACION -->



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar Administrador.</h1>
            <small>Modifica el formulario para editar el Administrador</small>
          </div>
          <div class="col-sm-6">

          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="row">
                  <div class="col-md-8">
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Administrador</h3>


        </div>

        <!-- FORMULARIO -->

        <div class="card-body">
            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Usuario Administrador</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                $sql = "SELECT * FROM admins WHERE id_admin = $id LIMIT 1;";
               $resultado = $conn->query($sql);

               $admin = $resultado->fetch_assoc();


              ?>

                  <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php">
                      <div class="card-body">

                  <div class="form-group row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario: </label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" value="<?php echo $admin["usuario"] ?>" id="usuario"  name="usuario" placeholder="Usuario">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="<?php echo $admin["nombre"] ?>"  id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="contraseña" class="col-sm-2 col-form-label">Contraseña</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="contraseña" name="password" placeholder="Contraseña">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Recuerdame</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                  <button type="submit"  class="btn btn-info">Guardar</button>
                  <button type="submit" class="btn btn-default float-right">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>


            </div>
            <!-- /.card -->
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->



            <!-- FORMULARIO -->

    </section>
    <!-- /.content -->

    </div>
              </div>



 <!-- FOOTER -->
 <?php include_once "templates/footer.php"; ?>
 <!-- FOOTER -->