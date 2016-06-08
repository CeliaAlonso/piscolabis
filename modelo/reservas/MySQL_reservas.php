<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = MySQL_reservas, se encarga de conectar con la BBDD

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

class MySQL_reservas {

    const DB_DSN = "mysql:host=localhost"; // Nombre de host MYSQL
    const DB = "u476894591_pisco"; // Nombre de LA BASE DE DATOS
    const USUARIO = "u476894591_admin"; // Nombre de usuario de MySQL
    const PASSWORD = "piscolabis"; // Contraseña de usuario de MySQL
    const TABLA = "reservas"; // Nombre de la tabla

    private $_mensaje;
    private $_conexion;

    public function getBase() {
        return self::DB;
    }

    public function getTabla() {
        return self::TABLA;
    }

    private function _conectar() {
        $this->_conexion = new PDO(self::DB_DSN, self::USUARIO, self::PASSWORD);
        $this->_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->_conexion->exec("SET NAMES 'utf8'");
    }

    private function _desconectar() {
        $this->_conexion = NULL;
    }

    private function _modificarDatos(Sql_reservas $sql, &$mensaje) {
        $ejecucion = $sql->generarEjecucion();
        try {
            $this->_conectar();
            $resultado = $this->_conexion->prepare($sql);
            $resultado->execute($ejecucion);
            $this->_desconectar();
            if ($resultado->rowCount()) {
                return true;
            }
        } catch (PDOException $e) {
            $mensaje = "No se ha podido realizar la consulta: " . $e->getMessage();
            return false;
        }
    }

    public function modificar(Sql_reservas $sql, &$mensaje) {
        $datos = $this->_modificarDatos($sql, $mensaje);
        return $datos;
    }

    private function _traerDatos(Sql_reservas $sql, &$mensaje) {
        $ejecucion = $sql->generarEjecucion();
        $datos = array();
        try {
            $this->_conectar();
// aunque $sql es un objeto, el método __toString de la clase Sql devuelve una cadena
            $resultado = $this->_conexion->prepare($sql);
            $resultado->execute($ejecucion);
            $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);
            $this->_desconectar();
        } catch (PDOException $e) {
            $mensaje = "No se ha podido realizar la consulta: " . $e->getMessage();
        }
        return $datos;
    }

    public function ejecutar(Sql_reservas $sql, &$mensaje) {
        $datos = $this->_traerDatos($sql, $mensaje);
        return $datos;
    }

}
?>