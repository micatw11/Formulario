<?php

header('Content-Type: text/html; charset=utf-8');
//Guarda valores en variables despues que se complete el formulario
$Nacionalidad = array('Argentina', 'Bolivia', 'Chile', 'Colombia', 'Paraguay', 'Uruguay');
$Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
$datos['documento'] = filter_var($_POST['documento'], FILTER_VALIDATE_INT);
$datos['apellido'] = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
$datos['nombre'] = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
$datos['activo'] = filter_var($_POST['activo'], FILTER_SANITIZE_SPECIAL_CHARS);
$datos['fechaNacimiento'] = date($_POST['anioNacimiento'] . "/" . $_POST['mesNacimiento'] . "/" . $_POST['diaNacimiento']);
$datos['nacionalidad'] = isset($_POST['nacionalidad']) ? $_POST['nacionalidad'] : null;
//Este array guardará los errores de validación que surjan.
$errores = array();

require_once 'vista_form.php';
