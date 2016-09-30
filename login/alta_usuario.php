<!DOCTYPE>
<html>
    <head>
        <title>Formulario</title>
        <?php
        require 'header.php';
        require_once 'barra.php';
        include_once 'base_datos/conexion.php';
        //     include_once 'index.php';

       
        $Nacionalidad = Nacionalidad();

        $errores = array();
        ?>
    </head> 
    <body >


        <div class="container">

            <form method="post" action= "variables.php">
                <fieldset> 
                    <br><br><br><br>
                             <div class="form-group">
                        <label for="nombre_usuario">Nombre Usuario:</label>
                        <input type="text" name="nombre_usuario" class="form-control" id="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $_SESSION['nombre']?>" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group"  >
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese apellido" value="<?php echo $_SESSION['apellido']?>"required="required" onkeypress="return soloLetras(event)">
                    </div>

                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $_SESSION['nombre']?>" onkeypress="return soloLetras(event)">
                    </div>
                   
                    <div class="form-group">
                        <label for="">Numero de Documento:</label>
                        <input type="number" class="form-control" name="documento" placeholder="Ingrese documento" value="<?php echo $_SESSION['documento']?>"onkeypress="return soloNumeros(event)">
                    </div> 
                    <div>

                        <label for="">Fecha de nacimiento</label><br>
                        <input type="Date" name="fecha_nac" class="form-control" id="fecha_nac" placeholder="Ingrese fecha_nac" required="required">

                    </div>
                    <br>
                 
                          <div class="form-group">
                <label>Contraseña:</label><br>
                <input type="password" name="password" size="8" maxlength="50" class="form-control" id="password" required>
                <br><br>
            </div>      <div class="form-group">
                <label>Repetir Contraseña:</label><br>
                <input type="password" name="password" size="8" maxlength="50" class="form-control" id="password" required>
                <br><br>
            </div>
                   

                    <input type="submit" value= "Enviar" class="btn btn-default"/>
                </fieldset> 
            </form>
        </div>

    </body>
</html>
