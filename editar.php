<?php
 session_start();
require_once 'base_datos/conexion.php';
      include_once 'base_datos/conexion.php';
        $Nacionalidad = Nacionalidad();
        $errores = array();
$id=$_GET['id'];
$_SESSION['id']=$id;
$persona= buscarPersonas($id);

//$originalDate = $cliente->fecha_nacimiento;
//$cliente->fecha_nacimiento = date("d-m-Y", strtotime($originalDate));

//$nacionalidades=  listadoNacionalidades();

//echo ((isset($cliente->nacionalidad) && $cliente->nacionalidad =='Argentino/a') ? "selected":'');
//print_r($persona);
include_once 'editar_form.php';
 