<?php
    session_start();
         include_once '../base_datos/conexion.php'; 
	$username = $_POST['user'];
	$password = $_POST['password'];
        
        require '../base_datos/conexion.php';
       // $resultado = login ($username);
        $_SESSION['loggedin'] = true;
        if ($password==$resultado['password']) { //password_verify
	  
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	 
	    echo "Bienvenido! " . $_SESSION['username'];
	   echo "<br><br><a href=../login/control_login.php>Panel de Control</a>";
	   include_once '../base_datos/listado.php';
	 } else {
	   echo "Username o Password estan incorrectos.";
	 
	   echo "<br><a href='../login/index_login.php'>Volver a Intentarlo</a>";
	 }
