/* 
 Created on : 02/05/2016
 Author     : Celia Alonso Reguero
 */

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
$('#formulario_acceso').validate({
    rules: {
        usuario: {
            required: true
        },
        contrasenia: {
            required: true
        }
    },
    highlight: function (element) {
        var id_attr = "#" + $(element).attr("id") + "0";
        $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        $(id_attr).removeClass('glyphicon-ok').addClass('glyphicon-remove');
    },
    unhighlight: function (element) {
        var id_attr = "#" + $(element).attr("id") + "0";
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        $(id_attr).removeClass('glyphicon-remove').addClass('glyphicon-ok');
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
        usuario: {
            required: "El usuario es un campo requerido."
        },
        contrasenia: {
            required: "La contraseña es un campo requerido."
        }
    }
});

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

function loguearse() {

    peticion_http = new XMLHttpRequest();

    if (peticion_http) {

        peticion_http.onload = respuestaLoguearse;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var queryString = crea_query_string();
        peticion_http.send(queryString);

    }

}

function respuestaLoguearse() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var cuenta = doc_xml.getElementsByTagName("cuenta")[0];

        if (cuenta.firstChild.nodeName == "RESPUESTA") {

            document.getElementById("resultado").innerHTML = cuenta.firstChild.firstChild.nodeValue;

        } else {

            window.location.href = "index.php";

        }

    }

}

function crea_query_string() {

    var usuario = document.getElementById("usuario");
    var contrasenia = document.getElementById("contrasenia");

    return "accion=loguear&usuario=" + encodeURIComponent(usuario.value) + "&contrasenia=" + encodeURIComponent(contrasenia.value);

}