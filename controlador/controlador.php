<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = controlador

    Copyright (C) 2016  Celia Alonso Reguero

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
-->

<?php
session_start();
require_once '../modelo/reservas/reservas.php';
require_once '../modelo/cuenta/cuenta.php';
require_once '../modelo/horario/horario.php';
require_once '../modelo/sesion/session.php';

class Controlador {

    private $_camposObligatorios;

    public function run() {

        $accion = $_POST["accion"];
        switch ($accion) {
            case "registrar":
                $xml = $this->_insertarUsuario();
                header('Content-Type: text/xml; charset=utf-8');
                echo $xml;
                break;
            case "loguear":
                $xml = $this->_loguearse();
                header('Content-Type: text/xml; charset=utf-8');
                echo $xml;
                break;
            case "desloguear":
                $xml = $this->_desloguearse();
                header('Content-Type: text/xml; charset=utf-8');
                echo $xml;
                break;
            case "buscar_horarios":
                $xml = $this->_listarHorarios();
                header('Content-Type: text/xml');
                echo $xml;
                break;
            case "ver_reserva":
                $xml = $this->_listarReservas();
                header('Content-Type: text/xml');
                echo $xml;
                break;
            case "hacer_reserva":
                $xml = $this->_hacerReservas();
                header('Content-Type: text/xml');
                echo $xml;
                break;
        }
    }

    private function _listarHorarios() {
        $mensaje = '';
        $fecha = $_POST["fecha"];

        $horario = new Horario("", $fecha, "");
        if ($datos = $horario->loadHorarioDisponible($mensaje)) {
            $horarios = "<horarios>";
            for ($i = 0; $i < count($datos); $i++) {
                $horarios .= "<horario><id>" . $datos[$i]["id_fecha"] . "</id><fecha>" . $datos[$i]["fecha"] . "</fecha><hora>" . $datos[$i]["hora"] . "</hora></horario>";
            }
            $horarios .="</horarios>";
            return $horarios;
        } else {
            if ($mensaje) {
                return $mensaje;
            } else {
                return "<horarios><respuesta>No se ha encontrado nigún dato</respuesta></horarios>";
            }
        }
    }

    private function _listarReservas() {
        $mensaje = '';
        $usuario = $_SESSION["usuario"];

        $reserva = new Reservas("", "", "", $usuario);

        if ($datos = $reserva->loadReserva($mensaje)) {
            $reservas = "<reservas>";
            for ($i = 0; $i < count($datos); $i++) {
                $horario = new Horario($datos[$i]["id_fecha"], "", "");
                $datosHorario = $horario->loadResolverHorarioId($mensaje);
                $reservas .= "<reserva><id>" . $datos[$i]["id_reserva"] . "</id><nombre>" . $datos[$i]["nombre"] . "</nombre><numero>" . $datos[$i]["numero"] . "</numero><fecha>" . $datosHorario[0]["fecha"] . "</fecha><hora>" . $datosHorario[0]["hora"] . "</hora></reserva>";
            }
            $reservas .="</reservas>";
            return $reservas;
        } else {
            if ($mensaje) {
                return $mensaje;
            } else {
                return "<reservas><respuesta>No se ha encontrado nigún dato</respuesta></reservas>";
            }
        }
    }

    private function _hacerReservas() {
        $mensaje = '';
        $this->_camposObligatorios = array(["nombre_reserva", "string"], ["numero_comensales", "numero"], ["fecha_final", "fecha"]);

        $nombre = $_POST["nombre"];
        $numero = $_POST["numero"];
        $fecha = $_POST["fecha"];
        $usuario = $_SESSION["usuario"];

        if ($this->_campoValido()) {
            $reserva = new Reservas($nombre, $numero, $fecha, $usuario);
            $horario = new Horario($fecha, "", "");
            if ($reserva->guardarReserva($mensaje) && $horario->loadHorarioReservado($mensaje)) {
                $reservas = "<reservas><respuesta>Se ha realizado su reserva correctamente.</respuesta></reservas>";
                return $reservas;
            }
        } else {
            if ($mensaje) {
                return $mensaje;
            } else {
                return "<reservas><respuesta>No se ha encontrado nigún dato</respuesta></reservas>";
            }
        }
    }

    private function _insertarUsuario() {
        $mensaje = '';
        $this->_camposObligatorios = array(["nombre", "string"], ["apellido1", "string"], ["apellido2", "string"], ["nacimiento", "fecha"], ["email", "email"], ["telefono", "telefono"], ["usuario", "letrasNum"], ["contrasenia", "contrasenia"]);

        $nombre = $_POST["nombre"];
        $apellido1 = $_POST["apellido1"];
        $apellido2 = $_POST["apellido2"];
        $nacimiento = $_POST["nacimiento"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];

        if ($this->_campoValido()) {

            $cuenta = new Cuenta($nombre, $apellido1, $apellido2, $nacimiento, $email, $telefono, $usuario, $contrasenia);

            if ($datos = $cuenta->guardarUsuario($mensaje)) {
                return "<cuenta><respuesta>Su cuenta de usuario ha sido creada correctamente.</respuesta></cuenta>";
            } else {
                if ($mensaje) {
                    return "<cuenta><respuesta>" . $mensaje . "</respuesta></cuenta>";
                } else {
                    return "<cuenta><respuesta>El registro no se ha podido realizar con éxito</respuesta></cuenta>";
                }
            }
        }
    }

    private function _loguearse() {
        $mensaje = '';
        $usuario = $_POST["usuario"];
        $contrasenia = $_POST["contrasenia"];
        $cuenta = new Cuenta('', '', '', '', '', '', $usuario, $contrasenia);

        if ($datos = $cuenta->loadUsuario($mensaje)) {
            $sesion = new Session();
            $sesion->startSession($datos[0]["id_usuario"]);
            return "<cuenta><correcto>Logueo correcto</correcto></cuenta>";
        } else {
            if ($mensaje) {
                return $mensaje;
            } else {
                return "<cuenta><respuesta>No se ha encontrado el usuario con el que intenta acceder.</respuesta></cuenta>";
            }
        }
    }

    private function _desloguearse() {
        $sesion = new Session();
        $sesion->closeSession();
    }

    private function _campoValido() {
        foreach ($this->_camposObligatorios as $arr) {
            if ($_POST[$arr[0]]) {
                switch ($arr[1]) {
                    case "string":
                        if (!$this->_esLetras($arr[0]))
                            return false;
                        break;
                    case "letrasNum":
                        if (!$this->_esLetrasNum($arr[0]))
                            return false;
                        break;
                    case "numero":
                        if (!$this->_esNumero($arr[0]))
                            return false;
                        break;
                    case "fecha":
                        if (!$this->_esFecha($arr[0]))
                            return false;
                        break;
                    case "hora":
                        if (!$this->_esHora($arr[0]))
                            return false;
                        break;
                    case "email":
                        if (!$this->_esEmail($arr[0]))
                            return false;
                        break;
                    case "telefono":
                        if (!$this->_esTelefono($arr[0]))
                            return false;
                        break;
                    case "contrasenia":
                        if (!$this->_esContrasenia($arr[0]))
                            return false;
                        break;
                }
            }
        }
        return true;
    }

    private function _esLetras($str) {
        return preg_match("/^[a-zA-ZÁÉÍÓÚáéíóú ]{1,30}$/", $_POST[$str]);
    }

    private function _esNumero($num) {
        return preg_match("/^[0-9]{1,30}$/", $_POST[$str]);
    }

    private function _esLetrasNum($str) {
        return preg_match("/^[a-z\d_]{4,15}$/i", $_POST[$str]);
    }

    private function _esFecha($fec) {
        return preg_match("/\d{4}\-\d{2}-\d{2}/", $_POST[$fec]);
    }

    private function _esHora($hora) {
        return preg_match("/\d{2}\:\d{2}:\d{2}/", $_POST[$hora]);
    }

    private function _esEmail($em) {
        return preg_match("/^(\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w*)*)/", $_POST[$em]);
    }

    private function _esTelefono($num) {
        return preg_match("/^([69])\d{8}$/", $_POST[$num]);
    }

    private function _esContrasenia($cont) {
        return preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,15}$/", $_POST[$cont]);
    }

}

$index = new Controlador();
$index->run();
?>