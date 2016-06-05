<!--
    Autor = Celia Alonso Reguero
    Fecha = 16/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Política de cookies de Piscolabis

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
        <title>PISCOLABIS | Política de cookies</title>
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
                                <li><a href="#">Contacto</a></li>
                            </ul>
                        </div>
                </nav>
            </div>
            <!-- CONTENIDO DE LA PÁGINA WEB -->
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 migasPan">
                            <a href="index.php">Inicio</a> > <a href="#" class="estoy">Política de cookies</a>
                        </div>
                    </div>
                </div>
                <div class="container contenido">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Política de cookies</h1>
                        </div>
                        <div class="col-lg-12">
                            <h2>¿Qué son las cookies?</h2>
                            <p>Las cookies son ficheros o porciones de información enviadas por un sitio web a través de un
                                servidor y almacenadas en el navegador del usuario. De ésta forma, el sitio web puede almacenar
                                información básica del usuario y sus preferencias y
                                hábitos con el fin de llevar a cabo determinadas acciones de marketing (como una campaña de
                                remarketing) o personalización de contenidos.</p>
                            <h2>¿Qué tipo de cookies existen?</h2>
                            <p>Ni todas las cookies son iguales, ni todos los “sites” utilizan las mismas cookies, ni todas
                                están reguladas de la misma forma. De hecho, sólo las publicitarias, las de afiliados y las de
                                análisis requieren del cumplimiento de la nueva normativa europea. <br>
                                <b>– Cookies técnicas:</b> Son aquellas que resultan imprescindibles para permitir al usuario la
                                navegación a través de una página web, como por ejemplo, las que permiten almacenar los datos de
                                un pedido online. <br>
                                <b>– Cookies de personalización:</b> Este tipo permite personalizar las funciones o contenidos
                                del sitio web en función de los datos obtenidos del navegador. Mediante estas cookies podemos
                                presentar un sitio web en el mismo idioma del navegador usado para visitar la web. <br>
                                <b>– Cookies de análisis:</b> Se utilizan con fines estadísticos únicamente. Un claro ejemplo
                                podría ser las cookies generadas por el script de seguimiento de Google Analytics. <br>
                                <b>– Cookies publicitarias y de publicidad comportamental:</b> Son todas aquellas que tienen
                                como objetivo mejorar la eficacia de los espacios publicitarios. Así, la red publicitaria de
                                Google o los adservers incluyen este tipo de tecnologías para dar el servicio deseado a sus
                                clientes. <br>
                                <b>– Cookies de afiliados:</b> Trackean las visitas de webs de afiliados</p>
                            <h2>¿Quién debe cumplir con ley de cookies?</h2>
                            <p>La ley de cookies es de aplicación a los prestadores de servicios de la sociedad de la
                                información (tanto empresas como particulares que que realizan actividades económicas a través
                                de Internet) establecidos en España y a los servicios prestados por ellos. De ésta forma, se
                                incluyen los siguientes servicios cuando constituyan una actividad económica o lucrativa para el
                                prestador: <br>
                                <b>a.</b> Comercio electrónico. <br>
                                <b>b.</b> Contratación en línea. <br>
                                <b>c.</b> Información y publicidad. <br>
                                <b>d.</b> Servicios de intermediación.</p>
                            <h2>¿Qué hay que hacer para cumplir con la nueva normativa de cookies?</h2>
                            <p>Como ya hemos mencionado antes, para cumplir con la ley de cookies es necesario recabar del
                                usuario el consentimiento previo e informado antes de la instalación de cookies en su navegador.
                                Muchos sites siguen informando del uso de cookies después de haber procedido a su instalación,
                                lo que actualmente va en contra de la ley y puede incurrir en un procedimiento sancionador con
                                multas que pueden ir de los 30.000€ a los 150.000€.
                                Por ello, es importante contar con un procedimiento, que se ejecute a través de un pop-up, una
                                landing page o visible en la cabecera o en el footer de tu web, en el que:
                                – Se informe de manera visible, accesible y sin necesidad de hacer scroll de uso y política de
                                cookies del site.
                                – Utilices una fórmula en la que recabes el consentimiento previo informado del usuario que
                                visita tu página antes de instalar cualquier archivo para recabar información.
                                – Expliques qué es una cookie, el tipo de cookies que está utilizando tu sitio web y la
                                finalidad de las mismas.
                                – Proveas a tus usuarios de instrucciones sobre cómo deshabilitar las cookies desde los
                                diferentes navegadores existentes.
                                – Ofrezcas referencias sobre lugares en los que conseguir más información.</p>
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
        <script src="js/registro.js"></script>
        <script src="js/desloguear.js"></script>
    </body>
</html>
