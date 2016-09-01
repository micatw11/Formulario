<html>
    <body>

        <?php
        require_once 'index.php';
        require './base_datos/conexion.php';
        ?>

        <h2>La operacion fue exitosa!</h2>
        <h4>Bienvenido/a </h4>
        Nombre:  <?php echo $datos['nombre']; ?> <br>
        Apellido: <?php echo $datos['apellido']; ?><br>
        lugar de nacimiento: <?php echo $datos['nacionalidad']; ?><br>
        e-mail: <?php echo $datos['fechaNacimiento']; ?>

        <?php
        $pdo = conectar();
        $pdo = ingresar_variables($pdo, $datos);

        $url = 'base_datos/listado.php';
        echo '  <a href="  " class="btn btn-primary" style="   margin: auto">Ver listado completo </a>  ';
        ?>
    </body> 
</html>