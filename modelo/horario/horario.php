<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Horario

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
require_once '../modelo/horario/MySQL_horario.php';
require_once '../modelo/horario/Sql_horario.php';

class Horario {

    private $_id_horario, $_fecha, $_hora;

    public function __construct($id_horario, $fecha, $hora) {
        $this->_id_horario = $id_horario;
        $this->_fecha = $fecha;
        $this->_hora = $hora;
    }

    public function getIdHorario() {
        return $this->_id_horario;
    }

    public function getFecha() {
        return $this->_fecha;
    }

    public function getHora() {
        return $this->_hora;
    }

    private function _horarioDisponibleLoad() {
        $bd = new MySQL_horario();
        $sql = new Sql_horario();
        $sql->setFuncion("select"); 
        $base = $bd->getBase();
        $tb = $bd->getTabla();
        $tabla = $base . ".$tb";
        $sql->addTable($tabla);
        $sql->addSelect("*");
        $sql->addWhere("disponible = TRUE");
        $sql->addWhere("fecha = :fecha");
        return $sql;
    }

    public function loadHorarioDisponible(&$mensaje) {
        $bd = new MySQL_horario();
        $sql = $this->_horarioDisponibleLoad();
        $sql->addEjecutar(":fecha", $this->_fecha);
        return $bd->ejecutar($sql, $mensaje);
    }

    private function _horarioReservadoLoad() {
        $bd = new MySQL_horario();
        $sql = new Sql_horario();
        $sql->setFuncion("update"); 
        $base = $bd->getBase();
        $tb = $bd->getTabla();
        $tabla = $base . ".$tb";
        $sql->addTable($tabla);
        $sql->addSelect("disponible = FALSE");
        $sql->addWhere("id_fecha = :id_fecha");
        return $sql;
    }

    public function loadHorarioReservado(&$mensaje) {
        $bd = new MySQL_horario();
        $sql = $this->_horarioReservadoLoad();
        $sql->addEjecutar(":id_fecha", $this->_id_horario);
        return $bd->ejecutar($sql, $mensaje);
    }
    
}
?>