/* 
 Created on : 02/05/2016
 Author     : Celia Alonso Reguero
 */

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

/* Función: Ver las reservas
 * Esta función realiza una petición AJAX al archivo controlador.php
 * La respuesta a la petición AJAX se realiza en la función 
 * respuestaVerReservas();
 */
function ver_reservas() {

    peticion_http = new XMLHttpRequest();
    if (peticion_http) {

        peticion_http.onload = respuestaVerReservas;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_http.send("accion=ver_reserva");
    }

}

/* Función: Respuesta a la función de ver las reservas 
 * Esta función recibe unos datos mediante XML. En el caso de que el usuario no
 * tenga ninguna reserva hecha, mostrará un mensaje indicándoselo. En caso 
 * contrario, creará una tabla con los datos de todas las reservas que el 
 * usuario haya realizado
 */
function respuestaVerReservas() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        var doc_xml = peticion_http.responseXML;
        var respuesta = doc_xml.getElementsByTagName("reservas")[0];
        if (respuesta.firstChild.nodeName == "RESPUESTA") {

            document.getElementById("reservas").innerHTML = "<h1>" + respuesta.firstChild.firstChild.nodeValue + "</h1>";
        } else {
            var reserva = respuesta.getElementsByTagName("reserva");
            var tabla = "";
            if (reserva.length == 0) {
                tabla = "<p class='centrar'>No ha realizado ninguna reserva</p>";
            } else {
                tabla = "<div class='col-lg-12 table-responsive'><table class='table table-bordered'> <thead> <tr> <th>Identificador</th> <th>Nombre de la reserva</th> <th>Número de comensales</th> <th>Fecha</th> <th>Hora</th> </tr> </thead> <tbody>";
                var contenido = "";
                for (var i = 0; i < reserva.length; i++) {
                    var id = reserva[i].getElementsByTagName('id')[0].firstChild.nodeValue;
                    var nombre = reserva[i].getElementsByTagName('nombre')[0].firstChild.nodeValue;
                    var numero = reserva[i].getElementsByTagName('numero')[0].firstChild.nodeValue;
                    var fecha = reserva[i].getElementsByTagName('fecha')[0].firstChild.nodeValue;
                    var hora = reserva[i].getElementsByTagName('hora')[0].firstChild.nodeValue;
                    contenido += "<tr> <td>" + id + "</td> <td>" + nombre + "</td> <td>" + numero + "</td> <td>" + fecha + "</td> <td>" + hora + "</td> </tr>";
                }
                tabla += contenido + "</tbody> </table> </div>";
            }
            document.getElementById("reservas").innerHTML = tabla;

        }

    }

}

window.onload = ver_reservas;