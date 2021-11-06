$(document).ready(function () {

    $("#guardar-registro").on("submit",function (e) {

        e.preventDefault();

       var datos = $(this).serializeArray();

       $.ajax({

        type: $(this).attr("method"),
        data: datos,
        url: $(this).attr("action"),
        dataType: "json",
        success: function (data) {

            var resultado = data;

            if(resultado.respuesta == "exito"){
              console.log(data)

                Swal.fire(
                    'Excelente',
                    'Se ha guardado correctamente',
                    'success'
                  )

                }else{
                  console.log(data)
                    Swal.fire(
                        'Error',
                        'Oops , ese usuario ya existe',
                        'error'
                      )

            }

        },
        error: function(error){

          console.log(error.responseText);

        }


       });



    });


    // Eliminar un registro

    $(".borrar-registro").on("click",function (e) {

      e.preventDefault();

      var id = $(this).attr("data-id");
      var tipo = $(this).attr("data-tipo");

      Swal.fire({
        title: '¿Estás Seguro?',
        text: "¡No se puede recuperar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si , eliminar',
        cancelButtonText: "Cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
      $.ajax({

        type: "post",
        data: {

          "id":id,
          "registro": "eliminar"

        },
        dataType: "json",

        url: 'modelo-'+tipo+'.php',

        success: function (data) {

          console.log(data);

          if(data.resultado == "exitoso"){

            jQuery('[data-id="'+data.id_eliminado+'"]').parents("tr").remove();
            Swal.fire(
              '¡Listo!',
              'Eliminado correctamente',
              'success'
            );
          }else{

            Swal.fire(
              '¡Error!',
              'No se pudo eliminar',
              'success'
            );

          }


        },

        error: function(error){

          console.log(error.responseText);

        }

      });

        }
      })


    });



});