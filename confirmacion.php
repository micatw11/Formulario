<html>
    <body>

        <?php
       
        session_start();
       // require_once 'index.php';
        require_once './base_datos/conexion.php';
        ?>

        <h2>La operacion fue exitosa!</h2>
        <h4>Bienvenido/a </h4>
        Nombre:  <?php echo $_SESSION['nombre']; ?> <br>
        Apellido: <?php echo $_SESSION['apellido']; ?><br>
        lugar de nacimiento: <?php echo $_SESSION['nacionalidad']; ?><br>
        fecha nacimiento: <?php echo $_SESSION['fechaNacimiento']; 
       
         $pdo = conectar();
        $pdo = ingresar_variables($pdo, $_SESSION);
       
       ?>
        <a href="./base_datos/listado.php" class="btn btn-primary" style="margin: auto">Ver listado completo </a>  ";
        
    </body> 
</html>