<!--
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/*
* Autor= Celia
* Fecha= 15-feb-2016
* Licencia= default
* Version= Expression version is undefined on line 10, column 14 in Templates/Scripting/EmptyPHP.php.
* Descripcion=
* /
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