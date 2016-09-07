<?php
session_start();
require_once 'funciones.php';
require_once 'index.php';
// if(isset($control)==false){  
//         echo '<h1> No tiene permiso de ingreso en esta pagina.</h1>';
//         die();
// }

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //Valida que el campo nombre no esté vacío.
    if (!validarCampo($_SESSION['nombre'])) {
        $errores[] = 'El campo nombre esta vacio.';
    }
    if (!validarCampo($_SESSION['apellido'])) {
        $errores[] = 'El campo apellido esta vacio.';
    }

    if (!checkdate($_POST['mesNacimiento'], $_POST['diaNacimiento'], $_POST['anioNacimiento'])) {
        $errores[] = 'La fecha de Nacimiento es incorrecto.';
    } else
        $_SESSION['fechaNacimiento'] = date($_POST['mesNacimiento'] . "/" . $_POST['diaNacimiento'] . "/" . $_POST['anioNacimiento']);
    $_SESSION['edad'] = Calcular_edad($_POST['mesNacimiento'], $_POST['diaNacimiento'], $_POST['anioNacimiento']);
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
  
}
else {
        
        include_once 'confirmacion.php';
}

