
<!DOCTYPE>
<html>
    <head>
        <title>Formulario</title>
        <?php
        require 'header.php';
        require_once 'barra.php';
        //     include_once 'index.php';
        ?>
    </head> 
    <body >


        <div class="container">

            <form method="post" action= "Procesar.php">
                <fieldset> 
                    <br><br><br><br>
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $persona['nombre'] ?>" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group"  >
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese apellido" required="required" value="<?php echo $persona['apellido'] ?>"onkeypress="return soloLetras(event)">
                    </div>

                    <div class="form-group">
                        <label for="">Numero de Documento:</label>
                        <input type="number" class="form-control" name="documento" placeholder="Ingrese documento" value="<?php echo $persona['documento'] ?>"onkeypress="return soloNumeros(event)">
                    </div> 
                    <div>

                        <label for="">Fecha</label><br>
                        <select id="dia" name="diaNacimiento" class="dia">
                            <option selected="selected" value="<?php echo $persona['dia'] ?>">Día</option>
                            <?php for ($i = 1; $i <= 31; $i++)://Muestra los 31 dias del mes-  fecha de nacimiento ?>

                                <?php echo "<option value=" . $i . ">" . $i . "</option>" ?>
                            <?php endfor; ?>
                        </select>


                        <select id="mes" name="mesNacimiento" class="mes">
                            <option selected="selected" value="<?php echo $persona['mes'] ?>">Mes </option>
                            <?php foreach ($Meses as $clave => $mes)://muestra los meses- fecha de nacimiento?>
                                <?php echo "<option value=" . $clave . ">" . $mes . "</option>" ?>
                            <?php endforeach; ?>
                        </select>

                        <select id="anio" name="anioNacimiento" class="anio">
                            <option selected="selected" value="<?php echo $persona['anio'] ?>">Año </option>
                            <?php for ($j = 2000; $j >= 1930; $j--)://Muestra los años- fecha nacimiento?>
                                <?php echo "<option value=" . $j . ">" . $j . "</option>" ?>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <br><label>Nacionalidad:</label><br>
                        <select name="nacionalidad">				
                            <?php foreach ($Nacionalidad as $pais): ?>
                                <?php echo "<option value= ". $pais['id'] ." >" . $pais['descripcion'] . " " . $pais['iso'] . "</option>" ?>
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