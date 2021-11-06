$(function () {
    $("#example1").DataTable({
      "paging": true,
      "pageLength": 10,
      "responsive": true,
       "lengthChange": false,
       "searching": true,
        "ordering": true,
        "autoWidth": false,
        "language":{

          paginate: {

            next: "Siguiente",
            previous: "Atras",
            last: "Último",
            first: "Primero"
          },

          info: "Mostrando _START_ a _END_ de _TOTAL_ resutados",
          emptyTable: "No hay Registros",
          infoEmpty: "0 Registros",
          search: "Buscar: ",

          buttons: {
            copy: "Copiar",
            print: "Imprimir",
            colvis: "Columnas Visibles"

          }

        },
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": true,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    //   "responsive": true,
    // });




  });

  $("#crear-registro-admin").attr("disabled",true)
  $("#repetir_password").on("input",function () {

    console.log("hla");
    var password_nuevo = $("#password").val();
    console.log(password_nuevo);

    if($(this).val() === password_nuevo){

      $("#resultado_password").addClass("correcto").removeClass("incorrecto");
      $(this).addClass("correcto").removeClass("incorrecto");
      $("#password").addClass("correcto").removeClass("incorrecto");
      $("#resultado_password").text("Correcto");
      $("#resultado_password").addClass("margin-auto")

      $("#crear-registro").attr("disabled",false)

    }else{

      $("#resultado_password").addClass("margin-auto")
      $("#resultado_password").addClass("incorrecto").removeClass("correcto");
      $(this).addClass("incorrecto").removeClass("correcto");
      $("#password").addClass("incorrecto").removeClass("correcto");;


      $("#resultado_password").text("No coinciden");

    }

  });