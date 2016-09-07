<?php
session_start();
    /*** begin the session ***/
//    if(empty($_SESSION))
//    {
//    header('Location:index.html');
//}else{	


if (!array_key_exists ('contador', $_SESSION)){
    $_SESSION['contador'] = 0;
} 
   $_SESSION['contador'] = $_SESSION['contador'] +1;
    
header('Content-Type: text/html; charset=utf-8');
//Guarda valores en variables despues que se complete el formulario
$Nacionalidad = array('Argentina', 'Bolivia', 'Chile', 'Colombia', 'Paraguay', 'Uruguay');
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

$_SESSION['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$_SESSION['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$_SESSION['activo'] = filter_var($_POST['activo'], FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['nacionalidad'] = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;

//Este array guardará los errores de validación que surjan.
$errores = array();

require_once 'vista_form.php';
echo '<p> has visitado la pagina '.$_SESSION['contador'].' veces</p>';

