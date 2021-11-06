
<?php

require_once "funciones/funciones.php";

if(isset($_POST["registro"])){

    $usuario = $_POST["usuario"] ?? null;
    $nombre = $_POST["nombre"]?? null;
    $password = $_POST["password"]?? null;


if($_POST["registro"] == "nuevo"){


    $opciones = array(
        "cost"=>12
    );

        $password_hashed = password_hash($password, PASSWORD_BCRYPT,$opciones);


    try{



        $stmt = $conn->prepare("INSERT INTO admins (usuario,nombre,password,editado,nivel) VALUES(?,?,?,NOW(),0);");

        $stmt->bind_param("sss",$usuario,$nombre,$password_hashed);
        $stmt->execute();
        $id_registro = $stmt->insert_id;

        $respuesta = null;
        if($stmt->affected_rows !== -1){

            $respuesta = array(

                "respuesta"=>"exito",
                "id_admin"=>$id_registro

            );



        }else{

            $respuesta = array(

                "respuesta"=>"error",

            );




        }

        $stmt->close();
        $conn->close();

    }catch(Exception $e){

        echo "Error". $e->getMessage();

    }

    die(json_encode($respuesta));

}


// ELiminar
if($_POST["registro"] == "eliminar"){

     $respuesta = [];
     $id_borrar = $_POST["id"];

    try{

        $stmt = $conn->prepare("DELETE FROM admins WHERE id_admin  = ?;");

        $stmt->bind_param("i",$id_borrar);
        $stmt->execute();

        if($stmt->affected_rows){

            $respuesta = array(

                "resultado"=>"exitoso",
                "id_eliminado"=>$id_borrar

            );


        }else{
            $respuesta = array(

                "resultado"=>"error"

            );



        }



    }catch(Exception $e){

        $respuesta = array(

          $error = $e->getMessage()


        );

    }


    die(json_encode($respuesta));
    }

    if($_POST["registro"] == "actualizar"){

        $id_registro = $_POST["id_registro"];
        $respuesta = [];
        try{

            $stmt = null;

            if(empty($_POST["password"])){

                $stmt = $conn->prepare("UPDATE admins SET usuario = ? , nombre = ?, editado = NOW() WHERE id_admin = ?;");
                $stmt->bind_param("ssi",$usuario,$nombre,$id_registro);

            }else{


                $opciones = array(

                    "cost"=>12

                );
                $password_hashed = password_hash($password,PASSWORD_BCRYPT,$opciones);
                $stmt = $conn->prepare("UPDATE admins SET usuario = ? , nombre = ? , password = ? , editado = NOW()  WHERE id_admin = ?;");
                $stmt->bind_param("sssi",$usuario,$nombre,$password_hashed,$id_registro);

            }



           $stmt->execute();


           if($stmt->affected_rows > 0){

            $respuesta = array(

                    "respuesta"=>"exito",
                    "id_actualizado"=>$stmt->insert_id

            );

           }else{



            $respuesta = array(

                "respuesta"=>"error"

            );

           }

           $stmt->close();
           $conn->close();
        }catch(Exception $e){

           $respuesta = array(

            "error"=>$e->getMessage()

           );

        }

        die(json_encode($respuesta));

    }


}




?>