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
            <h1>Crear Evento.</h1>
            <small>LLena el formulario para crear un Evento</small>
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
          <h3 class="card-title">Crear Evento</h3>


        </div>

        <!-- FORMULARIO -->

        <div class="card-body">
            <!-- /.card -->
            <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Nuevo Evento</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->


                  <form class="form-horizontal" name="guardar-registro" id="guardar-registro" method="POST" action="modelo-evento.php">
                      <div class="card-body">

                  <div class="form-group row">
                    <label for="titulo_evento" class="col-sm-2 col-form-label">Título Evento: </label>
                    <div class="col-sm-10">
                      <input type="text"  class="form-control" id="titulo_evento"  name="titulo_evento" placeholder="Título Evento">
                    </div>
                  </div>


                    <!-- CATEGORIA -->



                  <div class="form-group row">
                    <label for="categoria_evento" class="col-sm-2 col-form-label">Categorìa Evento: </label>
                    <div class="col-sm-10">

                      <select name="categoria_evento" class="form-control select2">

                        <?php

                            $resultado = null;
                            try {
                                $sql = "SELECT * FROM categoria_evento";

                                $resultado = $conn->query($sql);


                            } catch (\Exception $e) {
                                echo $e->getMessage();
                            }

                            while($cat_evento = $resultado->fetch_assoc()):
                        ?>


                                    <option value="<?php echo $cat_evento["id_categoria"]; ?>"> <?php echo $cat_evento["cat_evento"];?></option>

                                <?php endwhile;?>
                      </select>


                    </div>
                  </div>



                  <!-- CATEGORIA -->

                  <!-- Invitados -->

                   <div class="form-group row">
                                 <label for="categoria_evento" class="col-sm-2 col-form-label">Invitado o Exponente: </label>
                                      <div class="col-sm-10">
                                       <select name="invitado_evento" class="form-control select2">
                                <option value="0">--Seleccione--</option>
                                     <?php

                                        $resultado = null;
                                        try {
                                          $sql = "SELECT invitado_id,nombre_invitado,apellido_invitado FROM invitados";

                                           $resultado = $conn->query($sql);


                                          } catch (\Exception $e) {
                                          echo $e->getMessage();
                                                                                            }

                                          while($invitado = $resultado->fetch_assoc()):
                                         ?>


                                            <option value="<?php echo $invitado["invitado_id"]; ?>"> <?php echo $invitado["nombre_invitado"]; echo " "; echo $invitado["apellido_invitado"];?></option>

                                            <?php endwhile;?>
                                                                                    </select>


                                </div>
                              </div>

                                    <!-- Invitados -->

                                    <!-- Date dd/mm/yyyy -->
                 <div class="form-group">
                            <label>Fecha Evento:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input type="text" class="form-control"  name="fecha_evento" id="datemask"  data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                            </div>
                            <!-- /.input group -->
                            </div>
                <!-- /.form group -->

                  <div class="form-group row">
                    <label for="titulo_evento" class="col-sm-2 col-form-label">Hora Evento: </label>
                    <div class="col-sm-10">
                      <input type="time"  class="form-control" id="titulo_evento"  name="hora_evento" placeholder="Título Evento">
                    </div>
                  </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <input type="hidden" name="registro" value="nuevo">

                  <button type="submit"  class="btn btn-info" id="crear-registro">Añadir</button>
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