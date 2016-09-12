<?php

require_once 'base_datos/conexion.php';

$id=$_GET['id'];

$persona= buscarPersonas($id);
//$originalDate = $cliente->fecha_nacimiento;
//$cliente->fecha_nacimiento = date("d-m-Y", strtotime($originalDate));

//$nacionalidades=  listadoNacionalidades();
//print_r($cliente);

//echo ((isset($cliente->nacionalidad) && $cliente->nacionalidad =='Argentino/a') ? "selected":'');
//print_r($persona);
include_once 'editar_form.php';
   