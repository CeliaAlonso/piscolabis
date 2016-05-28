/* 
 Created on : 27/04/2016
 Author     : Celia Alonso Reguero
 */

/* Función que habilita el botón 'Buscar' */
function habilitarBuscar() {

    var arrayCampos = new Array();
    arrayCampos.push(document.getElementById("nombre_reserva").value.length);
    arrayCampos.push(document.getElementById("numero_comensales").value.length);
    arrayCampos.push(document.getElementById("fecha_reserva").value.length);
    arrayCampos.push(document.getElementById("hora_reserva").value.length);
    var camposRellenados = true;
    for (var i = 0; i < arrayCampos.length; i++)
        if (arrayCampos[i] <= 0) {
            camposRellenados = false;
            break;
        }

    if (camposRellenados)
        document.getElementById("buscar").removeAttribute('disabled');
    else
        document.getElementById("buscar").setAttribute('disabled', 'disabled');
}

/* FUNCION QUE AÑADE EL ATRIBUTO 'regex' A LA LIBRERIA jquery.validate.js */
$.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Comprueba el valor de este campo"
        );
/* FUNCION DE VALIDACIÓN DE LA LIBRERIA jquery.validate.js */
$('#formulario_reserva').validate({
    rules: {
        nombre_reserva: {
            required: true,
            regex: /^([a-zA-ZÁÉÍÓÚáéíóú ]{1,30})+$/
        },
        numero_comensales: {
            required: true,
            regex: /^([0-9]{1}|[10])+$/,
            min: 1,
            max: 10
        },
        fecha_reserva: {
            required: true,
            regex: /^((20)\d{2})\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/
        },
        hora_reserva: {
            required: true
        }
    },
    highlight: function (element) {
        var id_attr = "#" + $(element).attr("id") + "0";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element) {
        var id_attr = "#" + $(element).attr("id") + "0";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
        if (element.length)
            error.insertAfter(element);
        else
            error.insertAfter(element);
    },
    messages: {
        nombre_reserva: {
            required: "El nombre de la reserva es un campo requerido.",
            regex: "El nombre de la reserva sólo puede tener letras."
        },
        numero_comensales: {
            required: "El número de comensales es un campo requerido.",
            regex: "El número de comensales sólo puede ser un número del 1 al 10.",
            min: "El número de comensales tiene que ser mayor que 1.",
            max: "El número de comensales no puede ser mayor de 10."
        },
        fecha_reserva: {
            required: "La fecha de la reserva es un campo requerido.",
            regex: "El formato de la fecha de la reserva es dd/mm/aaaa."
        },
        hora_reserva: {
            required: "La hora de la reserva es un campo requerido."
        }
    }
});

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

/* CONEXIÓN AJAX Función que busca las fechas disponibles para reservar */
function buscarFechaDisponible() {
    peticion_http = new XMLHttpRequest();
    if (peticion_http) {
        peticion_http.onload = respuestaFechaDisponible;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var queryString = crea_query_string("buscar_horarios");
        peticion_http.send(queryString);
    }

}

/* CONEXIÓN AJAX Función que devuelve las fechas disponibles */
function respuestaFechaDisponible() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var respuesta = doc_xml.getElementsByTagName("horarios")[0];
        if (respuesta.firstChild.nodeName == "RESPUESTA") {
            document.getElementById("hora_reserva0").innerHTML = respuesta.firstChild.nodeValue;
        } else {
            var contenido = "";
            var horario = respuesta.getElementsByTagName("horario");
            for (var i = 0; i < horario.length; i++) {
                var hora = horario.getElementsByTagName('hora')[0].firstChild.nodeValue;
                contenido += "<option value='" + hora + "'>" + hora + "</option>";
            }

            document.getElementById("hora_reserva").innerHTML = contenido;
        }

    }

}

/* Función que crea los datos que van a ser enviados al servidor */
function crea_query_string(accion) {

    var nombre_reserva = document.getElementById("nombre_reserva");
    var numero_comensales = document.getElementById("numero_comensales");
    var fecha_reserva = document.getElementById("fecha_reserva");
    var hora_reserva = document.getElementById("hora_reserva");
    if (accion == "buscar_horarios") {
        return "accion" + accion + "&fecha=" + encodeURIComponent(fecha_reserva.value);
    } else if (accion == "hacer_reserva") {
        return "accion" + accion + "&nombre=" + encodeURIComponent(nombre_reserva.value) + "&numero=" + encodeURIComponent(numero_comensales.value) + "&fecha=" + encodeURIComponent(fecha_reserva.value) + "&hora=" + encodeURIComponent(hora_reserva.value);
    }
}

/* CONEXIÓN AJAX Función que confirma la reserva seleccionada */
function confirmarReserva() {

    peticion_http = new XMLHttpRequest();
    if (peticion_http) {

        peticion_http.onload(respuestaConfirmarReserva);
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var queryString = crea_query_string("hacer_reserva");
        peticion_http.send(queryString);
    }

}

/* CONEXIÓN AJAX Función que devuelve si ha sido confirmada la reserva */
function respuestaConfirmarReserva() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var respuesta = doc_xml.getElementsByTagName("respuesta")[0];
        
        location.reload(true);
        document.getElementById("resultado").innerHTML = respuesta.firstChild.nodeValue;

    }

}