<html>
    <body>

        <?php
       
        session_start();
       // require_once 'index.php';
       require_once 'base_datos/conexion.php';
       require_once 'funciones.php';
      
        ?>

        <h2>La operacion fue exitosa!</h2>
        <h4>Bienvenido/a </h4>
        id:  <?php echo $_SESSION['id']; ?> <br>
        Nombre:  <?php echo $_SESSION['nombre']; ?> <br>
        Apellido: <?php echo $_SESSION['apellido']; ?><br>
        documento: <?php echo $_SESSION['documento']; ?><br>
        lugar de nacimiento: <?php echo $_SESSION['nacionalidad']; ?><br>
        fecha nacimiento: <?php echo $_SESSION['fechaNacimiento']; ?><br>
         edad: <?php echo $_SESSION['edad']; 
       
     if ($_SESSION['id']==NULL){
        ingresar_variables();
     }else{
         
           $fecha_nacimiento = date("Y-m-d", $_SESSION['fecha']);
          $_SESSION['fechaNacimiento']=$fecha_nacimiento; ?>
          fecha nacimiento: <?php echo $_SESSION['fechaNacimiento']; 
              list($anio, $mes, $dia) = explode("/",$_SESSION['fechaNacimiento']);  
             $_SESSION['edad'] = Calcular_edad ( $dia,$mes,$anio);?><br>
            edad: <?php echo $_SESSION['edad']; 
         update($_SESSION['id']);
         
     }
         
     header('Location: base_datos/listado.php');
     
       ?>
        
        
    </body> 
</html>