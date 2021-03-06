<?php include_once "funciones/sessiones.php"; ?>
<?php require_once "funciones/funciones.php";?>


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
            <h1>Crear Administrador.</h1>
            <small>LLena el formulario para crear un Administrador</small>
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
          <h3 class="card-title">Crear Administrador</h3>


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


                  <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-admin.php">
                      <div class="card-body">

                  <div class="form-group row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario: </label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" id="usuario"  name="usuario" placeholder="Usuario">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Contrase??a</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password" placeholder="Contrase??a">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="repetir_password" class="col-sm-2 col-form-label">Repetir Contrase??a</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="repetir_password" name="repetir_password" placeholder="Contrase??a">
                    </div>
                    <span id="resultado_password" class="helo-block"></span>
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
                    <input type="hidden" name="registro" value="nuevo">

                  <button type="submit"  class="btn btn-info" id="crear-registro-admin">A??adir</button>
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