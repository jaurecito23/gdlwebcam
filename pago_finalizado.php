<?php include_once "includes/templates/header.php";

use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require "includes/paypal.php";


?>

<section class="seccion contenedor">

<h2>Resumen de Usuarios</h2>

<?php

function debuguear($var){

  echo "<pre>";
  var_dump($var);
  echo "</pre>";

}



$paymentId = $_GET["paymentId"] ?? null;
$id_pago = (int) $_GET["id_pago"] ?? null;


$pago = Payment::get($paymentId,$apiContext);
$execution = new PaymentExecution();
$execution->setPayerId($_GET["PayerID"]);

// Tiene la informacion de la transaccion
$resultado = $pago->execute($execution,$apiContext);

$respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;





  if($respuesta == "completed"){

    echo "<div class='resultado correcto'>";
    echo "El pago se realizó correctamente <br/>";
    echo "el ID es {$paymentId}";
    echo "</div>";

    require_once("includes/funciones/db_conexion.php");
    $stmt = $conn->prepare("UPDATE registrados SET pagado = ? WHERE id = ?;");
    $pagado = 1;
    $stmt->bind_param("ii",$pagado,$id_pago);
    $stmt->execute();
    $stmt->close();
    $conn->close();

  }else{

    echo "<div class='resultado error'>";
    echo "El pago no se realizó<br/>";
    echo "</div>";

  }


?>


</section>

<?php include_once "includes/templates/footer.php";?>
