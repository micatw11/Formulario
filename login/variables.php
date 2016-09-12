<?php
    session_start();
         include_once '../base_datos/conexion.php'; 
	$username = $_POST['username'];
	$password = $_POST['password'];
        
        require '../base_datos/conexion.php';
        $resultado = login ($username);
        
        if ($password==$resultado['password']) { //password_verify
	  
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	 
	    echo "Bienvenido! " . $_SESSION['username'];
	    echo "<br><br><a href=../login/control_login.php>Panel de Control</a>";
	 
	 } else {
	   echo "Username o Password estan incorrectos.";
	 
	   echo "<br><a href='../login/index_login.php'>Volver a Intentarlo</a>";
	 }
