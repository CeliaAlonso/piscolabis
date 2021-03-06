<!--
    Autor = Celia Alonso Reguero
    Fecha = 16/05/2016
    Licencia = GPL v3
    Versión = 1.0
    Descripción = Política de privacidad de Piscolabis

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
        <title>PISCOLABIS | Política de privacidad</title>
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
                                <li><a href="contacto.php">Contacto</a></li>
                            </ul>
                        </div>
                </nav>
            </div>
            <!-- CONTENIDO DE LA PÁGINA WEB -->
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 migasPan">
                            <a href="index.php">Inicio</a> > <a href="#" class="estoy">Política de privacidad</a>
                        </div>
                    </div>
                </div>
                <div class="container contenido">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Política de privacidad</h1>
                        </div>
                        <div class="col-lg-12">
                            <h2><strong>1. Quiénes somos</strong></h2>
                            <p>Piscolabis, con domicilio social en Marqués de la Valdavia nº115, 28100 (Madrid), pudiendo contactarse con la empresa, para cualquier cuestión relacionada con esta <em>website</em>, en el teléfono 91 663 60 31 y/o en el correo electrónico: piscolabis@restaurante.es</p>
                            <h2><strong>2. Qué es la web site</strong></h2>
                            <p>El sitio <a href="index.php">http://www.piscolabis.esy.es/</a> en el cual te encuentras es el espacio interactivo creado por Piscolabis para ofrecer mayor información sobre sus productos y servicios.</p>
                            <h2><strong>3. Propiedad de la web y restricciones de uso</strong></h2>
                            <p>Estas Web son propiedad de Piscolabis Todos los nombres de dominio y demás derechos de propiedad intelectual son propiedad de Piscolabis, de tal forma que ningún contenido del mismo podrá ser cedido, copiado, reproducido, publicado, cargado, enviado, transmitido, distribuido o explotado de ninguna manera, excepción hecha de la utilización de las Web y de sus contenidos conforme a la finalidad del mismo, pudiendo realizar descargas y copias estrictamente privadas sin poder realizar ningún uso diferente al estipulado en estas condiciones. Contravenir lo anterior supondrá una violación de los derechos de autor y demás derechos propiedad de Piscolabis La modificación y el uso de los contenidos para fines distintos de los aquí permitidos es una violación de los derechos de autor y demás derechos de propiedad de Piscolabis A los efectos de las presentes condiciones de uso, se prohíbe el uso de los contenidos aquí referidos en cualquier otro Web o red informática.</p>
                            <h2><strong>4. Duración</strong></h2>
                            <p>Las presentes condiciones de uso regirán en tanto en cuanto se mantengan inalterables en el website, reservándose Piscolabis, el derecho a su alteración, modificación o supresión en cualquier momento, debiendo figurar esos cambios en la propia página Web.</p>
                            <h2><strong>5. Política de protección de datos</strong></h2>
                            <p>La página Web <a href="index.php">http://www.piscolabis.esy.es/</a> tiene como propósito principal informar de los servicios y actividades de la empresa que asume las obligaciones legales en materia de protección de datos de carácter personal, especialmente en lo referido a:</p>
                            <ul>
                                <li>La existencia de un fichero o tratamiento de datos de carácter personal.</li>
                                <li>La finalidad de la recogida de datos.</li>
                                <li>Los destinatarios de la información.</li>
                                <li>El carácter facultativo u obligatorio de las preguntas que hagamos.</li>
                                <li>Las consecuencias de la obtención de los datos o de la negativa a suministrarlos.</li>
                                <li>La posibilidad de ejercitar los derechos de acceso, rectificación, cancelación y oposición.</li>
                                <li>La identidad y dirección del responsable del tratamiento o en su caso de su representante.</li>
                            </ul>
                            <p>Es deseo de <a href="index.php">http://www.piscolabis.esy.es/</a> es que el usuario cuente con la información adecuada para decidir de forma expresa, libre y voluntaria si desea facilitar sus datos en la forma que se requiere. En este sentido se informa al usuario que sus datos serán incorporados a un fichero automatizado, cuyo titular y responsable es Piscolabis, con domicilio en Muntaner, 171, llevándose a cabo un tratamiento automatizado de los mismos cuya finalidad es:</p>
                            <ul>
                                <li>Conocer a efectos estadísticos la participación de los usuarios.</li>
                                <li>Informar al usuario de la existencia de productos y servicios de Piscolabis, y/o empresas pertenecientes al mismo grupo y/o terceras empresas colaboradoras.</li>
                            </ul>
                            <p>Salvo que se señale lo contrario en cada caso, los datos que se recogen en los formularios son necesarios y obligatorios para poder acceder a los servicios del website o apartado de la Web a que responde. <a href="index.php">Http://www.piscolabis.esy.es/</a> no podrá registrar a los que no faciliten los datos de carácter obligatorio.</p>
                            <p>El usuario debe rellenar los formularios con datos verdaderos, exactos y completos, respondiendo de los daños y perjuicios que puedan ocasionar en caso de cumplimentación defectuosa, con datos falsos, inexactos, incompletos o no actualizados.</p>
                            <p>Piscolabis, tiene el compromiso de adoptar los niveles de seguridad de protección de datos personales exigidos en la legislación vigente, instalando al efecto las medidas técnicas y organizativas necesarias para evitar la pérdida, mal uso, alteración, acceso no autorizado y demás riesgos posibles.</p>
                            <p>Piscolabis, se obliga asimismo a cumplir con la obligación de secreto respecto de los datos contenidos en el fichero automatizado establecidos en la legislación vigente.</p>
                            <p>El usuario o persona que lo represente, así como padres o tutores, podrán ejercitar en cualquier momento el derecho de acceso, rectificación, cancelación, y, en su caso, oposición de acuerdo a lo establecido en la Ley Orgánica de Protección de Datos y demás normativas aplicables al efecto, dirigiendo una comunicación escrita a Piscolabis, en las direcciones antes señaladas en la que se acredite la identidad del usuario; por medio del propio website, mediante comunicación a la dirección del buzón: piscolabis@restaurante.es</p>
                            <p>Piscolabis, informa que es responsable y titular del fichero, sin perjuicio de que pueda encargar a un tercero la gestión del tratamiento de los mismos, a lo cual los usuarios prestan su consentimiento expreso.</p>
                            <p>Respecto al uso de Cookies, <a href="index.php">http://www.piscolabis.esy.es/</a> informa al usuario que cuando navega por las diferentes pantallas y páginas de este sitio Web se utilizan cookies, que tienen como objeto reconocer a los usuarios que se hayan registrado y ofrecer un servicio personalizado, además de facilitar información sobre la fecha u hora de la visita, medir algunos parámetros del tráfico dentro del propio sitio Web y estimar el número de visitas realizadas permitiendo informar, enfocar y reajustar los servicios que ofrece en la forma más efectiva. Los cookies utilizados son almacenados en el disco duro del usuario pero no permiten leer los datos contenidos en él, ni leer los archivos cookies creados por otros proveedores.</p>
                            <p>Los cookies utilizados no son invasivos ni nocivos, pudiendo desactivarse mediante la opción correspondiente que figura en el navegador.</p>
                            <p>Nuestra preocupación prioritaria es la seguridad del almacenamiento de los datos personalmente identificadores del usuario. Ponemos un gran cuidado al transmitir los datos desde el ordenador del usuario a nuestros servidores.</p>
                            <p>Sólo los empleados que necesitan acceder a los datos de los usuarios para realizar su trabajo tienen acceso a los mismos. Cualquier empleado que viole nuestras políticas de protección de datos y/o de seguridad estará sujeto a acciones disciplinarias, incluyendo un posible despido así como la interposición de acciones civiles y/o penales.</p>
                            <h2><strong>6. Reserva en la página web</strong></h2>
                            <p>De conformidad con lo dispuesto en la Ley Orgánica 15/1999 de 13 de diciembre, le informamos que los datos de carácter personal que nos ha facilitado están recogidos en un fichero denominado “CLIENTES”, del que es responsable Piscolabis Este fichero tiene como finalidad la gestión de los clientes que acuden al restaurante. Dicho fichero ha sido notificado a la Agencia Española de Protección de Datos y cuenta con las medidas de seguridad necesarias para garantizar la total seguridad de los datos.</p>
                            <p>Le recordamos la posibilidad de acceder a los datos facilitados, así como de solicitar, en su caso, su rectificación, oposición o cancelación, en los términos establecidos por la Ley indicada, mediante una comunicación escrita al Responsable de Seguridad de www.piscolabis.esy.es/, indicando el nombre del fichero a través del e-mail: piscolabis@restaurante.es</p>
                            <h2><strong>7. Contacto</strong></h2>
                            <p>De conformidad con lo dispuesto en la Ley Orgánica 15/1999 de 13 de diciembre, le informamos que los datos de carácter personal que nos ha facilitado están recogidos en un fichero denominado “BUZÓN DE SUGERENCIAS”, del que es responsable Piscolabis Este fichero tiene como finalidad la gestión de sugerencias recibidas a través de la página web. Dicho fichero, ha sido notificado a la Agencia Española de Protección de Datos y cuenta con las medidas de seguridad necesarias para garantizar la total seguridad de los datos.</p>
                            <p>Le recordamos la posibilidad de acceder a los datos facilitados, así como de solicitar, en su caso, su rectificación, oposición o cancelación, en los términos establecidos por la Ley indicada, mediante una comunicación escrita al Responsable de Seguridad de Piscolabis indicando el nombre del fichero a través del e-mail: piscolabis@restaurante.es</p>
                            <h2><strong>8. Exclusión de responsabilidad en el servicio</strong></h2>
                            <p>Piscolabis, no será responsable de posibles daños o perjuicios que se pudieran derivar de interferencias, omisiones, interrupciones, virus informáticos, averías telefónicas o desconexiones en el funcionamiento operativo de este sistema electrónico, motivadas por causas ajenas a <a href="index.php">http://www.piscolabis.esy.es/</a>; igualmente, tampoco será responsable de los retrasos o bloqueos que se produzcan en el uso del presente sistema electrónico, causados por deficiencias o sobrecargas de líneas de transmisión, en el sistema de Internet o en otros sistemas electrónicos, así como de los daños que puedan ser causados por terceras personas mediante intromisiones ilegítimas fuera del control de <a href="index.php">http://www.piscolabis.esy.es/</a>.</p>
                            <p>Piscolabis, se reserva el derecho de suspender el acceso a su Web Site, sin previo aviso, de forma puntual y/o temporal, por razones técnicas o de cualquier otra índole, pudiendo, asimismo, modificar unilateralmente tanto las condiciones de acceso, como la totalidad o parte de los contenidos en ella incluidos.</p>
                            <h2><strong>9. Generales</strong></h2>
                            <p>Para toda cuestión litigiosa o de incumbencia a la Web de <a href="index.php">http://www.piscolabis.esy.es/</a>, será de aplicación sola y exclusivamente la legislación española, siendo competentes para la resolución de todos los conflictos derivados o relacionados con el uso de esta página Web, los Juzgados y Tribunales de Madrid (España).
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