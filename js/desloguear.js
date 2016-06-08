/* 
 Created on : 30/05/2016
 Author     : Celia Alonso Reguero
 */

var peticion_http = null;
var READY_STATE_COMPLETE = 4;
var STATUS_RIGHT = 200;

/* Función: Salir de la cuenta del usuario 
 * Esta función realiza una petición AJAX al archivo controlador.php
 * La respuesta a la petición AJAX se realiza en la función 
 * respuestaDesloguearse();
 */
function desloguearse() {

    peticion_http = new XMLHttpRequest();

    if (peticion_http) {

        peticion_http.onload = respuestaDesloguearse;
        peticion_http.open("POST", "../controlador/controlador.php", true);
        peticion_http.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        peticion_http.send("accion=desloguear");

    }

}

/* Función: Respuesta a la función de salir de la cuenta del usuario 
 * Si todo ha ido correctamente, se habrá destruido la sesión, por lo que 
 * redirige al usuario a la página de Inicio de la web
 */
function respuestaDesloguearse() {

    if (peticion_http.readyState == READY_STATE_COMPLETE && peticion_http.status == STATUS_RIGHT) {

        window.location.href = "index.php";

    }

}