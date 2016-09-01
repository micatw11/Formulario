<?php
require_once  'funciones.php';
require_once 'index.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Valida que el campo nombre no esté vacío.
    if (!validarCampo($datos['nombre'])) {
        $errores[] = 'El campo nombre esta vacio.';
    }
    if (!validarCampo($datos['apellido'])) {
        $errores[] = 'El campo apellido esta vacio.';
    }
  
    if (!checkdate($_POST['mesNacimiento'], $_POST['diaNacimiento'], $_POST['anioNacimiento'])) {
        $errores[] = 'La fecha de Nacimiento es incorrecto.';
    } else
        $fechaNacimiento = date($_POST['mesNacimiento'] . "/" . $_POST['diaNacimiento'] . "/" . $_POST['anioNacimiento']);
}
if (!empty($errores) || (empty($datos))) {
    if ($errores):
        ?>
        <div class="alert">
            El formulario no pudo ser Procesado.
        </div>
        <ul style="color: red;"> ERROR AL CARGAR LOS DATOS
            <?php foreach ($errores as $error): ?>
                <li> <?php echo $error ?> </li>
            <?php endforeach; ?>
        </ul>
        <?php

    endif;
}


else {
    require 'confirmacion.php';
}

