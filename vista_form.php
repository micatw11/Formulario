<!DOCTYPE>
<html>
    <head>
        <title>Formulario</title>
        <?php
        require 'header.php';
        require_once 'barra.php';
        require_once 'index.php';
        ?>
    </head> 
    <body >


        <div class="container">

            <form method="post" action= "Procesar.php">
                <fieldset> 
                    <br><br><br><br>
                    <div class="form-group">
                        <label for="nombre">Nombres:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Ingrese nombre" required="required" value="<?php echo $_SESSION[nombre] ?>" onkeypress="return soloLetras(event)">
                    </div>
                    <div class="form-group"  >
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Ingrese apellido" required="required" value="<?php echo $_SESSION[apellido] ?>"onkeypress="return soloLetras(event)">
                    </div>


                    <div>

                        <label for="">Fecha</label><br>
                        <select id="dia" name="diaNacimiento" class="dia">
                            <option selected="selected" value="">Día</option>
                            <?php for ($i = 1; $i <= 31; $i++)://Muestra los 31 dias del mes-  fecha de nacimiento ?>

                                <?php echo "<option value=" . $i . ">" . $i . "</option>" ?>
                            <?php endfor; ?>
                        </select>


                        <select id="mes" name="mesNacimiento" class="mes">
                            <option selected="selected" value="">Mes </option>
                            <?php foreach ($Meses as $clave => $mes)://muestra los meses- fecha de nacimiento?>
                                <?php echo "<option value=" . $clave . ">" . $mes . "</option>" ?>
                            <?php endforeach; ?>
                        </select>

                        <select id="anio" name="anioNacimiento" class="anio">
                            <option selected="selected" value="">Año </option>
                            <?php for ($j = 2015; $j >= 1930; $j--)://Muestra los años- fecha nacimiento?>
                                <?php echo "<option value=" . $j . ">" . $j . "</option>" ?>
                            <?php endfor; ?>
                        </select>

                        <br>
                        <div class="form-group">
                            <br><label>Nacionalidad:</label><br>
                            <select name="nacionalidad">				
                                <?php foreach ($Nacionalidad as $pais): ?>
                                    <?php echo "<option value=" . $pais . ">" . $pais . "</option>" ?>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="checkbox">

                            <label>Activo:</label>  
                            <input type="radio" name="activo" id="activo" value='1'>
                        </div>

                        <input type="submit" value= "Enviar" class="btn btn-default"/>
                </fieldset> 
            </form>
        </div>

    </body>
</html>