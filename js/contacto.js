/* 
 Created on : 27/04/2016
 Author     : Celia Alonso Reguero
 */

/* Función que habilita el botón 'Enviar' */
function habilitarEnviar() {

    var arrayCampos = new Array();
    arrayCampos.push(document.getElementById("nombre").value.length);
    arrayCampos.push(document.getElementById("apellido1").value.length);
    arrayCampos.push(document.getElementById("apellido2").value.length);
    arrayCampos.push(document.getElementById("email").value.length);
    arrayCampos.push(document.getElementById("mensaje").value.length);
    var camposRellenados = true;
    for (var i = 0; i < arrayCampos.length; i++)
        if (arrayCampos[i] <= 0) {
            camposRellenados = false;
            break;
        }

    if (camposRellenados)
        document.getElementById("enviar").removeAttribute('disabled');
    else
        document.getElementById("enviar").setAttribute('disabled', 'disabled');
}

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
$('#formulario_contacto').validate({
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
        email: {
            required: true,
            regex: /^(\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w*)*)/
        },
        mensaje: {
            required: true,
            regex: /^[a-z\d_]{1,750}$/i
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
        email: {
            required: "El email es un campo requerido.",
            regex: "El formato del email es ejemplo@ejemplo.ej"
        },
        mensaje: {
            required: "El mensaje es un campo requerido.",
            regex: "El mensaje no puede contener más de 500 caracteres."
        }
    }
});