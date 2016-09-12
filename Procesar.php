<?php
session_start();
require_once 'funciones.php';
//require_once '../index.php';
// if(isset($control)==false){  
//         echo '<h1> No tiene permiso de ingreso en esta pagina.</h1>';
//         die();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Valida que el campo nombre no esté vacío.
    if (!validarCampo($_POST['nombre'])) {
        $errores[] = 'El campo nombre esta vacio.';
    }
    if (!validarCampo($_POST['apellido'])) {
        $errores[] = 'El campo apellido esta vacio.';
    }

    if (!checkdate($_POST['mesNacimiento'], $_POST['diaNacimiento'], $_POST['anioNacimiento'])) {
        $errores[] = 'La fecha de Nacimiento es incorrecto.';
    }
}

$opciones_Documento = array(
    'opciones' => array(
        //Definimos el rango de documento entre 1.000.000 a 99.999.999.
        'min_range' => 1000000,
        'max_range' => 99999999
    )
);

if (!validarEntero($_POST['documento'], $opciones_Documento)) {
    $errores[] = 'El documento debe ser correcto.';
}


if (!empty($errores)) {
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
    header("Location: index.php");
}
else {
    require __DIR__ . '/confirmacion.php';
}

