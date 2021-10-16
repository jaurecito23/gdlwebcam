<?php


    $conn = new mysqli("localhost","root","root","gdlwebcamp");


    if($conn->connect_error){

        echo $conn->connect_error;
        exit;

    }


?>