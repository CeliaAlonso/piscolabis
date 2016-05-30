/* 
 Created on : 30/05/2016
 Author     : Celia Alonso Reguero
 */

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

function desloguearse() {

    peticion_http = new XMLHttpRequest();

    if (peticion_http) {

        peticion_http.onload = respuestaDesloguearse;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_http.send("accion=desloguear");

    }

}

function respuestaDesloguearse() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        window.location.href = "index.php";

    }

}