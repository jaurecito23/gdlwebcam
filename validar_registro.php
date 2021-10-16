<?php include_once "includes/templates/header.php"; ?>


<?php if(isset($_POST["submit"])){

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$regalo = $_POST["regalo"];
$total = $_POST["total_pedido"];
$fecha = date("Y-m-d H:i:s");


// Pedidos

$boletos = $_POST["boletos"];
$camisas = $_POST["pedido_camisas"];
$etiquetas = $_POST["pedido_etiquetas"];
include_once "includes/funciones/funciones.php";

 $pedido = productos_json($boletos,$camisas,$etiquetas);



// Eventos

 $eventos = $_POST["registro"];

   $registro = eventos_json($eventos);

// Inserciones a base de datos


            try{
                require_once("includes/funciones/db_conexion.php");



                $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pases_articulos,regalo,talleres_registrados,total_pagado) VALUES (? , ? , ? , ? , ?, ? , ? , ?);");

                $stmt->bind_param("sssssiss",$nombre,$apellido,$email,$fecha,$pedido,$regalo,$registro,$total);

                $stmt->execute();
                $stmt->close();
                $conn->close();

                header("Location: validar_registro.php?exitoso=1");

                }catch(Exception $e){

                $error = $e->getMessage();
                return $error;

                }




    }



?>


<section class="seccion contenedor">


<h2>Resumen de Usuarios</h2>

    <?php if(isset($_GET["exitoso"])):

        if($_GET["exitoso"] == 1){

            echo "<h3> Registro Exitoso </h3>";

        }else{

            echo "<h3> No se realizo el registro </h3>";

        }

        endif;
        ?>

      <?php ?>
</section>

<?php include_once "includes/templates/footer.php";?>
