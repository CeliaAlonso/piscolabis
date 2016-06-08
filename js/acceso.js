/* 
 Created on : 02/05/2016
 Author     : Celia Alonso Reguero
 */

/* Función que añade el atributo 'regex' a la librería jquery.validate.js */
$.validator.addMethod(
        "regex",
        function (value, element, regexp) {
            var re = new RegExp(regexp);
            return this.optional(element) || re.test(value);
        },
        "Comprueba el valor de este campo"
        );

/* Función de validación de la librería jquery.validate.js */
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

/* Función: Acceder a la cuenta del usuario 
 * Esta función realiza una petición AJAX al archivo controlador.php en el que 
 * le envía el nombre del usuario y la contraseña.
 * La respuesta a la petición AJAX se realiza en la función 
 * respuestaLoguearse();
 */
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

/* Función: Respuesta a la función de acceder a la cuenta del usuario 
 * Esta función recibe unos datos mediante XML. En caso de que haya habido 
 * algún incidente se le mostrará al usuario el error y si no, se accederá a la 
 * cuenta y se le redireccionará a la página de Inicio de la web
 */
function respuestaLoguearse() {

    if (peticion_http.readyState == READY_STATE_COMPLETE &&
            peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var cuenta = doc_xml.getElementsByTagName("cuenta")[0];

        if (cuenta.firstChild.nodeName == "respuesta") {

            document.getElementById("resultado").innerHTML = cuenta.firstChild.firstChild.nodeValue;

        } else {

            window.location.href = "index.php";

        }

    }

}

/* Función: Crea el query que le mandará a las peticiones AJAX realizadas */
function crea_query_string() {

    var usuario = document.getElementById("usuario");
    var contrasenia = document.getElementById("contrasenia");

    return "accion=loguear&usuario=" + encodeURIComponent(usuario.value) + 
            "&contrasenia=" + encodeURIComponent(contrasenia.value);

}