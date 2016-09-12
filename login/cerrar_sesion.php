<?php
session_start();
//recuperar la sesion actual 

// cerrar la sesion
session_unset();   //borrar datos de memoria  se borra todo de la memoria
//
session_destroy(); // borra datos fisicos 
//
session_abort();
//redireccion al index
header("Location: login_index.php");



