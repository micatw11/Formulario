<?php

session_start();
/* * * begin the session ** */
//    if(empty($_SESSION))
//    {
//    header('Location:index.html');
//}else{	

    //el usuario NO esta logueado?
    if(!array_key_exists('logueado', $_SESSION ) || $_SESSION['logueado'] != true ){
        header('Location: login/index_login.php');
        die();
    }
    include_once 'base_datos/conexion.php';
if (!array_key_exists('contador', $_SESSION)) {
    $_SESSION['contador'] = 0;
}
$_SESSION['contador'] = $_SESSION['contador'] + 1;



header('Location: base_datos/listado.php');
echo '<p> has visitado la pagina ' . $_SESSION['contador'] . ' veces</p>';

