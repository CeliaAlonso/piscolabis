<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Sql_reservas, se encarga de generar las setencias SQL para 
    generar las consultas a la BBDD

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

class Sql_reservas {

    private $_colWhere = array();
    private $_colSelect = array();
    private $_colFrom = array();
    private $_colValue = array();
    private $_ejecutar = array();
    private $_funcion = 'insert';

    public function addTable($table) {
        $this->_colFrom[] = $table;
    }

    public function addWhere($where) {
        $this->_colWhere[] = $where;
    }

    public function setFuncion($funcion) {
        $this->_funcion = $funcion;
    }

    public function addSelect($columna) {
        $this->_colSelect[] = $columna;
    }

    public function addValue($valor) {
        $this->_colValue[] = $valor;
    }

    public function addEjecutar($clave, $valor) {
        $this->_ejecutar[$clave] = $valor;
    }

    public function generarEjecucion() {
        return $this->_ejecutar;
    }

    private function _generar() {
        $select = implode(',', array_unique($this->_colSelect));
        $from = implode(',', array_unique($this->_colFrom));
        $where = implode(' AND ', array_unique($this->_colWhere));
        $values = implode(',', array_unique($this->_colValue));
        $funcion = $this->_funcion;
        $sql = $funcion . ' ';
        if ($funcion == 'insert') {
            $sql.='INTO ' . $from . '(' . $select . ') values (' . $values . ')';
        } elseif ($funcion == 'update') {
            $sql.= $from . ' SET ' . $select;
            if (!empty($this->_colWhere)) {
                $sql.=' WHERE ' . $where;
            }
        } else {
            $sql = $funcion . ' ' . $select . ' FROM ' . $from;
            if (!empty($this->_colWhere)) {
                $sql.=' WHERE ' . $where;
            }
        } return $sql;
    }

// la función __toString es necesaria para que un objeto sql pueda tratarse como cadena de caracteres
// cuando se pasa como argumento a la función prepare()
    public function __toString() {
        return $this->_generar();
    }

}
?>