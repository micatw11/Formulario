<?php

require_once 'base_datos/conexion.php';

$id=$_GET['id'];


$persona= borrar($id);

echo ' <ul style="color: red;"> El registro se elimino correctamente';

header('Location: base_datos/listado.php');