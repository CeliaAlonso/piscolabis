/* 
 Created on : 02/05/2016
 Author     : Celia Alonso Reguero
 */

function habilitarRegistro() {

    var arrayCampos = new Array();
    arrayCampos.push(document.getElementById("nombre").value.length);
    arrayCampos.push(document.getElementById("apellido1").value.length);
    arrayCampos.push(document.getElementById("apellido2").value.length);
    arrayCampos.push(document.getElementById("nacimiento").value.length);
    arrayCampos.push(document.getElementById("email").value.length);
    arrayCampos.push(document.getElementById("telefono").value.length);
    arrayCampos.push(document.getElementById("usuario").value.length);
    arrayCampos.push(document.getElementById("contrasenia").value.length);

    var camposRellenados = true;
    for (var i = 0; i < arrayCampos.length; i++)
        if (arrayCampos[i] <= 0) {
            camposRellenados = false;
            break;
        }

    if (camposRellenados)
        document.getElementById("registrarme").removeAttribute('disabled');
    else
        document.getElementById("registrarme").setAttribute('disabled', 'disabled');

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
$('#formulario_registro').validate({
    rules: {
        nombre: {
            required: true,
            regex: /^([a-zA-ZÁÉÍÓÚáéíóú ]{1,30})+$/
        },
        apellido1: {
            required: true,
            regex: /^([a-zA-ZÁÉÍÓÚáéíóú ]{1,30})+$/
        },
        apellido2: {
            required: true,
            regex: /^([a-zA-ZÁÉÍÓÚáéíóú ]{1,30})+$/
        },
        nacimiento: {
            required: true,
            regex: /^((19|20)\d{2})\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/
        },
        email: {
            required: true,
            regex: /^(\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w*)*)/
        },
        telefono: {
            required: true,
            regex: /^([69])\d{8}$/
        },
        usuario: {
            required: true,
            regex: /^[a-z\d_]{4,15}$/i
        },
        contrasenia: {
            required: true,
            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,15}$/
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
        nombre: {
            required: "El nombre es un campo requerido.",
            regex: "El nombre sólo puede tener letras."
        },
        apellido1: {
            required: "El primer apellido es un campo requerido.",
            regex: "El primer apellido sólo puede tener letras."
        },
        apellido2: {
            required: "El segundo apellido es un campo requerido.",
            regex: "El segundo apellido sólo puede tener letras."
        },
        nacimiento: {
            required: "La fecha de nacimiento es un campo requerido.",
            regex: "El formato de la fecha de nacimiento es dd/mm/aaaa"
        },
        email: {
            required: "El email es un campo requerido.",
            regex: "El formato del email es ejemplo@ejemplo.ej"
        },
        telefono: {
            required: "El teléfono es un campo requerido.",
            regex: "El teléfono tiene 9 números y empieza por 6 o 9."
        },
        usuario: {
            required: "El usuario es un campo requerido.",
            regex: "El usuario puede tener letras, números y ' _ ', y una longitud de 4 a 15 caracteres."
        },
        contrasenia: {
            required: "La contraseña es un campo requerido.",
            regex: "La contraseña debe contener como mínimo: 1 letra mayúscula, 1 letra minúscula, 1 número y tener mínimo una longitud de 5 caracteres"
        }
    }
});

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

function registro() {

    peticion_http = new XMLHttpRequest();

    if (peticion_http) {

        peticion_http.onload = respuestaRegistro;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var queryString = crea_query_string();
        peticion_http.send(queryString);

    }

}

function respuestaRegistro() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var respuesta = doc_xml.getElementsByTagName("respuesta")[0];
        
        location.reload(true);
        document.getElementById("resultado").innerHTML = respuesta.firstChild.nodeValue;
    }

}

function crea_query_string() {

    var nombre = document.getElementById("nombre");
    var apellido1 = document.getElementById("apellido1");
    var apellido2 = document.getElementById("apellido2");
    var nacimiento = document.getElementById("nacimiento");
    var email = document.getElementById("email");
    var telefono = document.getElementById("telefono");
    var usuario = document.getElementById("usuario");
    var contrasenia = document.getElementById("contrasenia1");

    return "accion=registrar&nombre=" + encodeURIComponent(nombre.value) + "&apellido1=" + encodeURIComponent(apellido1.value) + "&apellido2=" + encodeURIComponent(apellido2.value) + "&nacimiento=" + encodeURIComponent(nacimiento.value) + "&email=" + encodeURIComponent(email.value) + "&telefono=" + encodeURIComponent(telefono.value) + "&usuario=" + encodeURIComponent(usuario.value) + "&contrasenia=" + encodeURIComponent(contrasenia.value);

}