<?php

session_start();
/* * * begin the session ** */
//    if(empty($_SESSION))
//    {
//    header('Location:index.html');
//}else{	
include_once 'base_datos/conexion.php';

if (!array_key_exists('contador', $_SESSION)) {
    $_SESSION['contador'] = 0;
}
$_SESSION['contador'] = $_SESSION['contador'] + 1;

header('Content-Type: text/html; charset=utf-8');
$Nacionalidad = Nacionalidad();
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
  $_SESSION['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $_SESSION['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $_SESSION['documento'] = filter_var($_POST['documento'], FILTER_SANITIZE_STRING);
    $_SESSION['estado'] = filter_var($_POST['estado'], FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['nacionalidad'] = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
    $_SESSION['fechaNacimiento'] = date($_POST['anioNacimiento'] . "/" . $_POST['mesNacimiento'] . "/" . $_POST['diaNacimiento']);
    
//Este array guardará los errores de validación que surjan.
$errores = array();

require __DIR__ . '/vista_form.php';
echo '<p> has visitado la pagina ' . $_SESSION['contador'] . ' veces</p>';

