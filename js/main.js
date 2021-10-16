(function (){
    "use strict";
    var regalo = document.getElementById("regalo");
     // Campos Datos Usuario

     var nombre = document.getElementById("nombre");
     var apellido = document.getElementById("apellido");
     var email = document.getElementById("email");

     // Campos Pases
     var pase_dia = document.getElementById("pase_dia");
     var pase_dosdias = document.getElementById("pase_dosdias");
     var pase_completo = document.getElementById("pase_completo");

     //Botones y divs

     var calcular = document.getElementById("calcular");
     var errorDiv = document.getElementById("error");
     var suma = document.getElementById("suma-total");

     var botonRegistro = document.getElementById("btnRegistro");
     var lista_productos = document.getElementById("lista-productos");

     //Extras

     var etiquetas = document.getElementById("etiquetas");
     var camisas = document.getElementById("camisa_evento");

     // Deshabilitar el boton registro de submmit

     if(botonRegistro !== null){

         botonRegistro.disabled = true;

        }



    document.addEventListener("DOMContentLoaded",function(){

        let mapa = document.querySelector("#mapa");
        if(mapa !== null){

            var mymap = L.map('mapa').setView([-34.66526, -56.226026], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            //     mymap.on('click', function(ev) {
                //        crearCirculo(ev.latlng);
                //     });

                var marker = L.marker([-34.6652, -56.226026]).addTo(mymap);
                var circle = L.circle([-34.66526, -56.226026], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: .5,
                    radius: 500
                }).addTo(mymap);


            }

                // function crearCirculo(cordenadas) {

        //     var circle = L.circle([cordenadas.lat,cordenadas.lng], {
        //         color: 'red',
        //         fillColor: '#f03',
        //         fillOpacity: .5,
        //         radius: 500
        //     }).addTo(mymap);

        // }



// L.marker([-34.66526, -56.226026]).addTo(map)
//     .bindPopup('Aquí se dictan las<br> presentaciones')
//     .openPopup()
//     .bindTooltip('Un Tooltip')



if(pase_dia !== null){



    // Blur es el evento que se ejeuto cuando el elemento pierde el foco


    pase_dia.addEventListener("blur",mostrarDia)
    pase_dosdias.addEventListener("blur",mostrarDia)
    pase_completo.addEventListener("blur",mostrarDia)
    calcular.addEventListener("click",calcularMontos);
    nombre.addEventListener("blur",validarCampos);
    apellido.addEventListener("blur",validarCampos);
    email.addEventListener("blur",validarCampos);
    email.addEventListener("blur",validarEmail);

}
    });// DOMContentLoaded


    function validarEmail() {

        if(this.value.indexOf("@") > -1){

            this.style.border = "2px solid green";
            errorDiv.style.display = "none";

        }else{
            errorDiv.style.display = "block";
            errorDiv.innerHTML = "Este campo debe ser un correo";
            this.style.border = "1px solid red";
            errorDiv.style.border = "1px solid red";

        }

    }

    function validarCampos() {

        if(this.value === ""){

            errorDiv.style.display = "block";

            errorDiv.innerHTML = "Este campo es obligatorio";
            this.style.border = "1px solid red";
            errorDiv.style.border = "1px solid red";
        }else{

            this.style.border = "2px solid green";
            errorDiv.style.display = "none";
        }

    }

    function calcularMontos(e){

        e.preventDefault();
       if(regalo.value === ""){

        alert("Debes Elegir un regalo");
        regalo.focus();

       }else{

        var boletosDia = parseInt(pase_dia.value,10) || 0,
             boletos2Dias = parseInt(pase_dosdias.value,10) || 0,
            boletosCompleto = parseInt(pase_completo.value,10) || 0,
            cantCamisas = parseInt(camisas.value,10) || 0,
            cantEtiquetas = parseInt(etiquetas.value,10) || 0;


        var totalPagar = (boletosDia*30)+(boletos2Dias*45)+(boletosCompleto*50) + ((cantCamisas * 10) * .93 ) + (cantEtiquetas * 2);



        var  listadoProductos = []

            if(boletosDia >= 1){
                listadoProductos.push(boletosDia + ' Pases por día');
            }

            if(boletos2Dias >= 1){
                listadoProductos.push(boletos2Dias + ' Pases por dos días');
            }


            if(boletosCompleto >= 1){
                listadoProductos.push(boletosCompleto + ' Pases completos');
            }

            if(cantCamisas >= 1){
                listadoProductos.push(cantCamisas + ' Camisas ');
            }

            if(cantEtiquetas >= 1){
                listadoProductos.push(cantEtiquetas + ' Etiquetas ');
            }

            console.log(listadoProductos);

            var resultado = "";
             var cantProductos = listadoProductos.length;
             lista_productos.innerHTML = "";
             lista_productos.style.display = "block";

            for(var i = 0; i < cantProductos; i++){

                lista_productos.innerHTML += listadoProductos[i] + '</br>';

            }

            suma.innerHTML = "$ "+totalPagar.toFixed(2);

            botonRegistro.disabled = false;

            document.getElementById('total_pedido').value = totalPagar;

       }


    }


    function mostrarDia(e){


        var boletosDia = parseInt(pase_dia.value,10) || 0,
             boletos2Dias = parseInt(pase_dosdias.value,10) || 0,
            boletosCompleto = parseInt(pase_completo.value,10) || 0;

            var diasElegidos = [];


            if(boletosDia > 0){

                diasElegidos.push("viernes");

            }else{

                document.getElementById("viernes").style.display = "none"

            }
            if(boletos2Dias > 0){

                diasElegidos.push("viernes","sabados");
                document.getElementById("sabados").style.display = "none"

            }
            if(boletosCompleto > 0){

                diasElegidos.push("viernes","sabados","domingos");

            }else{

                document.getElementById("sabados").style.display = "none"
                document.getElementById("domingos").style.display = "none"

            }

            console.log(diasElegidos);



     for(var i = 0; i < diasElegidos.length; i++){

       document.getElementById(diasElegidos[i]).style.display = "block";

    }
    }

})()


// EMPIEZA JQUERY

$(function(){


    //Animación de encabezado Principal
    $(".nombre-sitio").lettering();
    // Programa de conferencias
    $(".programa-evento .info-curso:first").show();

    // Le pone la clase activo al primer menu de opciones
    $(".menu-programa a:first").addClass("activo");


    //Evento a las opciones
    $(".menu-programa a").on("click",function (e) {

        e.preventDefault();
        var enlace = $(this).attr("href");


        //Lo oculta bajando la opacidad
        $(".programa-evento .info-curso").fadeOut(100);

        $(".menu-programa a").removeClass("activo");
        $(this).addClass("activo");

         //Lo muestr subiendo la opacidad
        $(enlace).fadeIn(1000);

        return false;

    })


    //Animcaciones para los eventos de numeros


    var resumenLista = jQuery(".resumen-evento");

    if(resumenLista.length > 0){

        $(".resumen-evento").waypoint(function(){
            $(".resumen-evento li:nth-child(1) p").animateNumber({"number": 6}, 1200);
            $(".resumen-evento li:nth-child(2) p").animateNumber({"number": 15}, 1300);
            $(".resumen-evento li:nth-child(3) p").animateNumber({"number":3}, 1000);
            $(".resumen-evento li:nth-child(4) p").animateNumber({"number": 9}, 1200);



        }, {offset: "50%"});

    }




    // Animaciones para el contador de tiempo

    $(".cuenta-regresiva").countdown('2021/10/23 10:00:00', function(e){
        $("#dias").html(e.strftime('%D'));
        $("#horas").html(e.strftime('%H'));
        $("#minutos").html(e.strftime('%M'));
        $("#segundos").html(e.strftime('%S'));
    });


    // CONTROL DE SCROLL

    //Menu Fijo


    var windowHeight  = $(window).innerHeight();
    var barraHeight  = $(".barra").innerHeight();


    $(window).scroll(function () {

        var scroll = $(window).scrollTop();

        if(scroll > windowHeight){
            $(".barra").addClass("fixed");

        }else{

            $(".barra").removeClass("fixed");

        }

    })



    //MENU RESPONSIVE

    $(".menu-movil").on("click",function(){

        $(".navegacion-principal").slideToggle();

    })


    //Agregar clase al menu

    $("body.conferencia .navegacion-principal a:contains('Conferencia')").addClass("activo");
    $("body.calendario .navegacion-principal a:contains('Calendario')").addClass("activo");
    $("body.invitados .navegacion-principal a:contains('Invitados')").addClass("activo");

    //COLORBOX EN INVITADOS

    $(".invitado-info").colorbox({inline:true,width:"50%"});

     $("#colorbox-mailchimp").hide();
    $(".boton_newsletter").colorbox({inline:true,width:"50%"});


});






