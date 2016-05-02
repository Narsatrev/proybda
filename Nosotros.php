<?php 
session_start();
if($_SESSION['username']==""){
    header("Location: Login.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        
		<title>Bienvenido</title>
		<link rel="stylesheet" type="text/css" href="css/home.css" />
        <link rel="stylesheet" type="text/css" href="css/style_alerta_global.css"/>
        <link rel="stylesheet" type="text/css" href="css/login.css"/>    
        
         <script src="frameworks/jquery-2.1.4.js"></script>
        <script src="js/f_alerta.js"></script>
	</head>
	<body>
        <div id="barra_doc_up">Nosotros</div>
        <div id="barra_doc_down">©2016-2023 Soluciones Digitales y de Inteligencia de Negocios S.A. de C.V. Todos los derechos reservados.</div>
        <div id='esteSistema'>
            <h3>Este sistema fue creado para la materia de Bases de Datos Avanzadas del Tecnológico de Monterrey, Campus Ciudad de México por
            los alumnos de la carrera de Ingeniería en Tecnologías Computacionales:</h3>
            <div id="contImagenes">
                <div id="dav" class="cont_re">
                    <img class="retrato" id="fotoD" src="img/d.png"/>
                    <h4>José David Manzanarez Velázquez</h4>
                    <h4>A01337545</h4>
                </div>
                <div id="dav" class="cont_re">
                    <img class="retrato" id="fotoC" src="img/c.png"/>
                    <h4>Carla Flores Subias</h4>
                    <h4>A01331363</h4>
                </div>
                <div id="ben" class="cont_re">
                    <img class="retrato" id="fotoB" src="img/b.png"/>
                    <h4>Benjamín Gil Mendoza</h4>
                    <h4>A01331289</h4>
                </div>
            </div>
        </div>
    </body>
</html>