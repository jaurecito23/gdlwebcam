<?php


function debuguear($var){

    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

require_once "includes/paypal.php";

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;



if(!isset($_POST["submit"])){

    exit("Hubo un Error");

}
?>


<?php include_once "includes/templates/header.php"; ?>



<?php

$ID_registro = 5;

if(isset($_POST["submit"])):

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$regalo = $_POST["regalo"];
$total = $_POST["total_pedido"];
$fecha = date("Y-m-d H:i:s");


// Pedidos

$boletos = $_POST["boletos"];
$numero_boletos = $boletos;
$camisas = $_POST["pedido_extra"]["camisas"]["cantidad"];
$precioCamisas = $_POST["pedido_extra"]["camisas"]["precio"];
$pedidoExtra = $_POST["pedido_extra"];

$etiquetas = $_POST["pedido_extra"]["etiquetas"]["cantidad"];
$precioEtiquetas = $_POST["pedido_extra"]["etiquetas"]["precio"];



include_once "includes/funciones/funciones.php";

 $pedido = productos_json($boletos,$camisas,$etiquetas);

  //Eventos

  $eventos = $_POST["registro"];

    $registro = eventos_json($eventos);

//      debuguear($numero_boletos);

//    exit;
//      endif;


// Inserciones a base de datos


            try{
                require_once("includes/funciones/db_conexion.php");



                $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado,apellido_registrado,email_registrado,fecha_registro,pases_articulos,regalo,talleres_registrados,total_pagado,pagado) VALUES (? , ? , ? , ? , ?, ? , ? , ?, ?);");


                $pagado = 0;
                $stmt->bind_param("sssssissi",$nombre,$apellido,$email,$fecha,$pedido,$regalo,$registro,$total,$pagado);
                $resultado = $stmt->execute();
                $ID_registro = $stmt->insert_id;


                $stmt->close();
                $conn->close();

             //   header("Location: validar_registro.php?exitoso=1");

                }catch(Exception $e){

                $error = $e->getMessage();
                return $error;

            }
        endif;





                $compra = new Payer();
                $compra->setPaymentMethod("paypal");

                $envio = 0;

                $articulo = new Item();



                $i = 0;
                $arregloPedido = array();

                foreach ($numero_boletos as $key => $value) {

                    if((int)$value["cantidad"] > 0){

                        ${"articulo$i"} = new Item();
                        ${"articulo$i"}->setName("Pase: ". $key);
                        ${"articulo$i"}->setCurrency("USD");
                        ${"articulo$i"}->setQuantity((int)$value["cantidad"]);
                        ${"articulo$i"}->setPrice((int)$value["precio"]);
                        $arregloPedido[] =  ${"articulo$i"};
                        $i++;
                    }

                }
                foreach ($pedidoExtra as $key => $value) {

                    $precio = null;

                    if((int)$value["cantidad"] > 0){

                        if($key == "camisas"){

                            $precio = (float) $value["precio"] * .93;

                        }else{

                            $precio = (int) $value["precio"];

                        }

                        ${"articulo$i"} = new Item();
                        ${"articulo$i"}->setName("Pase: ". $key);
                        ${"articulo$i"}->setCurrency("USD");
                        ${"articulo$i"}->setQuantity((int)$value["cantidad"]);
                        ${"articulo$i"}->setPrice($precio);
                        $arregloPedido[] =  ${"articulo$i"};

                        $i++;
                    }

                  }





$listaArticulos = new ItemList();


$listaArticulos->setItems($arregloPedido);





// //DETALLES

// $detalles = new Details();
// //Envio
// $detalles->setShipping($envio);
// $detalles->setSubtotal($precio);



$cantidad = new Amount();
$cantidad->setCurrency("USD");
$cantidad->setTotal($total);
//$cantidad->setDetails($detalles);


$transaccion = new Transaction();


$transaccion->setAmount($cantidad);
$transaccion->setItemList($listaArticulos)
            ->setDescription("Pago GDLWebCam")
            ->setInvoiceNumber($ID_registro);


            // echo $transaccion->getInvoiceNumber();



$redireccionar = new RedirectUrls();

$redireccionar->setReturnUrl(URL_SITIO."/pago_finalizado.php?id_pago={$ID_registro}");
$redireccionar->setCancelUrl(URL_SITIO."/pago_finalizado.php?id_pago={$ID_registro}");


$pago = new Payment();
$pago->setIntent("sale");
$pago->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));



     try {

        $pago->create($apiContext);

     } catch (Paypal\Exception\PayPalConnectionException $pce) {
         echo "<pre>";
         print_r(json_decode($pce->getData()));
         exit;
         echo "</pre>";
        }


      $aprobado = $pago->getApprovalLink();

      header("Location: {$aprobado}");






?>