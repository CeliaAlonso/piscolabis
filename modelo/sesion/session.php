<!--
    Autor = Celia Alonso Reguero
    Fecha = 30/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Sesión

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

class Session {

    public function startSession($id) {
        if ($this->isOpen())
            return;
        $_SESSION["usuario"] = $id;
    }

    public function closeSession() {
        if (!$this->isOpen())
            return;
        // si no eliminamos la cookie de sesion, la aplicación seguirá funcionando con el mismo valor en la cookie PHPSESSID
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), "", time() - 3600, "/");
        }
        session_unset();
        session_destroy();
    }

    public function isOpen() {
        return isset($_SESSION["usuario"]);
    }

}
?>