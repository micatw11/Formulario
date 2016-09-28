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

            <form method="post" action= "Procesar.php">
                <fieldset> 
                    <br><br><br><br> 
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

                        <label for="">Fecha</label><br>
                        <input type=" Date" name="fecha_nac" class="form-control" id="fecha_nac" placeholder="Ingrese fecha_nac" required="required">

                    </div> 
                    <br>
                    <div class="form-group">
                        <br><label>Nacionalidad:</label><br>
                        <select name="nacionalidad">				
                            <?php foreach ($Nacionalidad as $pais): ?>
                                <?php echo "<option value= " . $pais['id'] . " >" . $pais['descripcion'] . " " . $pais['iso'] . "</option>" ?>
<?php endforeach; ?>
                        </select>
                    </div>

                    <div class="checkbox">

                        <label>Estado:</label>  <br>
                        <input type="radio" name="activo" id="activo" value='0'> Activo
                    </div>

                    <input type="submit" value= "Enviar" class="btn btn-default"/>
                </fieldset> 
            </form>
        </div>

    </body>
</html>