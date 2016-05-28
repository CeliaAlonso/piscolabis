<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Reservas

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
require_once '../modelo/reservas/MySQL_reservas.php';
require_once '../modelo/reservas/Sql_reservas.php';

class Reservas {

    private $_id, $_nombre, $_numero, $_id_fecha, $_id_usuario;

    public function __construct($nombreReserva, $numero, $id_fecha, $id_usuario) {
        $this->_nombre = $nombreReserva;
        $this->_numero = $numero;
        $this->_id_fecha = $id_fecha;
        $this->_id_usuario = $id_usuario;
    }

    public function getIdReserva() {
        return $this->_id;
    }

    public function getNombreReserva() {
        return $this->_nombre;
    }

    public function getNumeroComensales() {
        return $this->_numero;
    }

    public function getIdFechaReserva() {
        return $this->_id_fecha;
    }

    public function getIdUsuarioReserva() {
        return $this->_id_usuario;
    }

    public function setIdReserva($id) {
        $this->_id = $id;
    }

    public function setIdFechaReserva($id_fecha) {
        $this->_id_fecha = $id_fecha;
    }

    public function setIdUsuarioReserva($id_usuario) {
        $this->_id_usuario = $id_usuario;
    }

    public function guardarReserva(&$mensaje) {
        $bd = new MySQL_reservas();
        $sql = $this->_crearReserva();
        $sql->addEjecutar(":id_reserva", null);
        $sql->addEjecutar(":nombre", $this->_nombre);
        $sql->addEjecutar(":numero", $this->_numero);
        $sql->addEjecutar(":id_fecha", $this->_id_fecha);
        $sql->addEjecutar(":id_usuario", $this->_id_usuario);
        return (boolean) $bd->modificar($sql, $mensaje);
    }

    private function _crearReserva() { {
            $bd = new MySQL_reservas();
            $sql = new Sql_reservas();
            $base = $bd->getBase();
            $tb = $bd->getTabla();
            $tabla = $base . ".$tb";
            $sql->addTable($tabla);
            $sql->addSelect("id_reserva");
            $sql->addValue(":id");
            $sql->addSelect("nombre");
            $sql->addValue(":nombre");
            $sql->addSelect("numero");
            $sql->addValue(":numero");
            $sql->addSelect("id_fecha");
            $sql->addValue(":id_fecha");
            $sql->addSelect("id_usuario");
            $sql->addValue(":id_usuario");
            return $sql;
        }
    }

    public function loadReserva(&$mensaje) {
        $bd = new MySQL_reservas();
        $sql = $this->_reservaLoad();
        $sql->addEjecutar(":id_usuario", $this->_id_usuario);
        return $bd->ejecutar($sql, $mensaje);
    }

    private function _reservaLoad() {
        $bd = new MySQL_reservas();
        $sql = new Sql_reservas();
        $sql->setFuncion("select");
        $base = $bd->getBase();
        $tb = $bd->getTabla();
        $tabla = $base . ".$tb";
        $sql->addTable($tabla);
        $sql->addSelect("*");
        $sql->addWhere("id_usuario = :id_usuario");
        return $sql;
    }

}
?>