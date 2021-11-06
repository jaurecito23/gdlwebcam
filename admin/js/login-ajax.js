$(document).ready(function () {

$("#login-admin").on("submit",function (e) {

    e.preventDefault();
   var datos = $(this).serializeArray();

   $.ajax({

    type: $(this).attr("method"),
    data: datos,
    url: $(this).attr("action"),
    dataType: "json",
    success: function (data) {


        var resultado = data;

        console.log(data);

        if(resultado.respuesta == "exitoso"){

            Swal.fire(
                'Login Correctos',
                'Bienvenid@ '+resultado.usuario+'',
                'success'
              );

              setTimeout(() => {

                window.location.href = "admin-area.php";

              }, 1000);

            }else{

                Swal.fire(
                    'Error',
                    'Tu usuario o password son incorrectos',
                    'error'
                  );

        }

    },
    error: function(error){

      console.log(error.responseText);

    }


   });

});



});