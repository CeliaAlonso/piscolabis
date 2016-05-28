<!--
    Autor = Celia Alonso Reguero
    Fecha = 24/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Cuenta

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
require_once '../modelo/cuenta/MySQL_cuenta.php';
require_once '../modelo/cuenta/Sql_cuenta.php';

class Cuenta {

    private $_nombre, $_apellido1, $_apellido2, $_fecha_nacimiento, $_email, $_telefono, $_nombre_usuario, $_contrasenia;

    public function __construct($nombre, $apellido1, $apellido2, $fecha_nacimiento, $email, $telefono, $nombre_usuario, $contrasenia) {
        $this->_nombre = $nombre;
        $this->_apellido1 = $apellido1;
        $this->_apellido2 = $apellido2;
        $this->_fecha_nacimiento = $fecha_nacimiento;
        $this->_email = $email;
        $this->_telefono = $telefono;
        $this->_nombre_usuario = $nombre_usuario;
        $this->_contrasenia = $contrasenia;
    }

    public function getNombre() {
        return $this->_nombre;
    }

    public function getApellido1() {
        return $this->_apellido1;
    }

    public function getApellido2() {
        return $this->_apellido2;
    }

    public function getFechaNacimiento() {
        return $this->_fecha_nacimiento;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getTelefono() {
        return $this->_telefono;
    }

    public function getNombreUsuario() {
        return $this->_nombre_usuario;
    }

    public function getContrasenia() {
        return $this->_contrasenia;
    }

    public function guardarUsuario(&$mensaje) {

        $bd = new MySQL_cuenta();
        $sql = $this->_crearUsuario();
        $sql->addEjecutar(":nombre", $this->_nombre);
        $sql->addEjecutar(":apellido1", $this->_apellido1);
        $sql->addEjecutar(":apellido2", $this->_apellido2);
        $sql->addEjecutar(":fecha_nacimiento", $this->_fecha_nacimiento);
        $sql->addEjecutar(":email", $this->_email);
        $sql->addEjecutar(":telefono", $this->_telefono);
        $sql->addEjecutar(":nombre_usuario", $this->_nombre_usuario);
        $sql->addEjecutar(":contrasenia", $this->_contrasenia);
        return (boolean) $bd->modificar($sql, $mensaje);
    }

    private function _crearUsuario() {
        $bd = new MySQL_cuenta();
        $sql = new Sql_cuenta();
        $base = $bd->getBase();
        $tb = $bd->getTabla();
        $tabla = $base . ".$tb";
        $sql->addTable($tabla);
        $sql->addSelect("nombre");
        $sql->addValue(":nombre");
        $sql->addSelect("apellido1");
        $sql->addValue(":apellido1");
        $sql->addSelect("apellido2");
        $sql->addValue(":apellido2");
        $sql->addSelect("fecha_nacimiento");
        $sql->addValue(":fecha_nacimiento");
        $sql->addSelect("email");
        $sql->addValue(":email");
        $sql->addSelect("telefono");
        $sql->addValue(":telefono");
        $sql->addSelect("nombre_usuario");
        $sql->addValue(":nombre_usuario");
        $sql->addSelect("contrasenia");
        $sql->addValue(":contrasenia");
        return $sql;
    }

    private function _UsuarioLoad() {
        $bd = new MySQL_cuenta();
        $sql = new Sql_cuenta();
        $sql->setFuncion("select");
        $base = $bd->getBase();
        $tb = $bd->getTabla();
        $tabla = $base . ".$tb";
        $sql->addTable($tabla);
        $sql->addSelect("*");
        $sql->addWhere("nombre_usuario = :nombre_usuario");
        $sql->addWhere("contrasenia = :contrasenia");
        return $sql;
    }

    public function loadUsuario(&$mensaje) {
        $bd = new MySQL_cuenta();
        $sql = $this->_UsuarioLoad();
        $sql->addEjecutar(":nombre_usuario", $this->_nombre_usuario);
        $sql->addEjecutar(":contrasenia", $this->_contrasenia);
        return $bd->ejecutar($sql, $mensaje);
    }
    
}
?>