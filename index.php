<!--
    Autor = Celia Alonso Reguero
    Fecha = 16/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Inicio de Piscolabis

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
        <title>PISCOLABIS | Inicio</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="images/cloud_s.png" type="image/gif">
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/general.css"/>
        <link rel="stylesheet" type="text/css" href="css/inicio.css"/>
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
                                <li><a href="#" class="active">Inicio</a></li>
                                <li><a href="reservar.php">Reservar</a></li>
                                <li><a href="contacto.php">Contacto</a></li>
                            </ul>
                        </div>
                </nav>
            </div>
            <!-- CONTENIDO DE LA PÁGINA WEB -->
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 imagenInicio">
                            <img class="img-responsive" src="images/restaurant.jpg">
                        </div>
                    </div>
                    <div class="row informacion">
                        <div class="col-sm-6 col-xs-12 izquierdaArriba">
                            <h2>¿Quiénes somos?</h2>
                            <p>Somos un grupo de restauración dedicado a la cocina creativa y a los nuevos sabores elaborados con productos frescos y naturales. Buscamos una mezcla entre lo tradicional y lo moderno sin dejar pasar los sabores de siempre.</p>
                        </div>
                        <div class="col-sm-6 col-xs-12 derechaArriba">
                            <h2>¿Qué ofrecemos?</h2>
                            <p>Te ofrecemos un restaurante fresco y acogedor, donde podrás gozar de una cocina creativa, basada en ingredientes frescos y de temporada con una máxima calidad y excelente servicio. <br> ¿Te lo vas a perder?</p>
                        </div>
                        <div class="col-sm-6 col-xs-12 izquierdaAbajo">
                            <h2>¿Dónde estamos?</h2>
                            <p>Puedes encontrarnos en C/Marqués de la Valdavia nº115, 28100 (Madrid)</p>
                            <p>Teléfono: 91 663 60 31</p>
                            <p>Email: piscolabis@restaurante.es</p>
                        </div>
                        <div class="col-sm-6 col-xs-12 derechaAbajo">
                            <h2>Horario</h2>
                            <p>De Lunes a Viernes</p>
                            <p>9:00 a 22:00</p>
                            <p>Sábados y Domingos</p>
                            <p>De 14:00 a 16:00 y de 20:00 a 22:00</p>
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
        <script src="js/desloguear.js"></script>
    </body>
</html>
