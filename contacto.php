<!--
    Autor = Celia Alonso Reguero
    Fecha = 16/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Contacto de Piscolabis

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
if (!isset($_SESSION["usuario"])) {
    $user = '<a href="registro.php" class="btn boton-header right">Regístrate</a> <a href="acceso.php" class="btn boton-header right">Accede a tu cuenta</a>';
} else {
    $user = '<a href="mis_reservas.php" class="right noBoton">Mis reservas</a><a href="" class="right noBoton" onclick="desloguearse()">Salir</a>';
}
?>
<html>
    <head>
        <title>PISCOLABIS | Contacto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/cloud_s.png" type="image/gif">
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/secundarias.css"/>
        <link rel="stylesheet" type="text/css" href="css/responsive.css"/>
    </head>
    <body>
        <div id="wrapper">
            <!-- ENCABEZADO DE PÁGINA -->
            <header>
                <div class="container header">
                    <div class="row">
                        <div class="col-md-7 col-xs-12">
                            <p>
                                <img src="images/cloud_s.png" alt="Piscolabis"/>
                                Piscolabis
                            </p>
                        </div>
                        <div class="col-md-5 col-xs-12 right">
                            <div id="user" class="col-xs-12">
                                <?php echo $user ?>     
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- MENÚ DE NAVEGACIÓN PRINCIPAL -->
            <div id="menu">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Inicio</a></li>
                                <li><a href="reservar.php">Reservar</a></li>
                                <li><a href="#" class="active">Contacto</a></li>
                            </ul>
                        </div>
                </nav>
            </div>
            <!-- CONTENIDO DE LA PÁGINA WEB -->
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 migasPan">
                            <a href="index.php">Inicio</a> > <a href="#" class="estoy">Contacto</a>
                        </div>
                    </div>
                    <div class="container formulario">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h1>¿Qué quieres comunicarnos?</h1>
                                    </div>
                                </div>
                                <form id="formulario_contacto" class="form-horizontal" role="form"> 
                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="nombre" class="control-label">Nombre</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="nombre" id="nombre" class="form-control" oninput="habilitarEnviar()" placeholder="Nombre" required="">
                                            <span id="nombre0" class="form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="apellido1" class="control-label">Primer apellido</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="apellido1" id="apellido1" class="form-control" oninput="habilitarEnviar()" placeholder="Primer apellido" required="">
                                            <span id="apellido10" class="form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div id="busqueda" class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="apellido2" class="control-label">Segundo apellido</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="apellido2" id="apellido2" class="form-control" oninput="habilitarEnviar()" placeholder="Segundo apellido" required="">
                                            <span id="apellido20" class="form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="email" class="control-label">Email de contacto</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <input type="text" name="email" id="email" class="form-control" oninput="habilitarEnviar()" placeholder="Email" required="">
                                            <span id="email0" class="form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-lg-12">
                                            <label for="mensaje" class="control-label">Mensaje</label>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="mensaje" id="mensaje" class="form-control" oninput="habilitarEnviar()" placeholder="Introduce el mensaje que nos quieres hacer llegar" required="" rows="5"></textarea>
                                            <span id="mensaje0" class="form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="row form-group botonFormulario">
                                        <div class="col-lg-12">
                                            <button type="button" id="enviar" class="btn" disabled="">Enviar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 id="resultado" class="errorH"></h1>
                        </div>
                    </div>
                </div>
            </main>
            <!-- PIE DE PÁGINA -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 enlaces">
                            <p><a href="privacidad.php">Política de privacidad</a> | <a href="cookies.php">Política de cookies</a> | <a href="mapa_web.php">Mapa web</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright © 2016 Piscolabis - GPL</p>
                            <p class="autor">Autora Celia Alonso Reguero</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- SCRIPTS -->
        <script src="lib/jquery/jquery.min.js"></script>
        <script src="lib/bootstrap/bootstrap.min.js"></script>
        <script src="lib/jquery/jquery.validate.js"></script>
        <script src="js/contacto.js"></script>
        <script src="js/desloguear.js"></script>
    </body>
</html>