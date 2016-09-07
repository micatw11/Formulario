<html>
    <head>
        <?php require_once '../header.php'; ?>
        <?php //require_once 'barra.php'; ?>
        <?php include_once 'conexion.php'; ?>
        <title>Listado de Personas</title> 
    </head>
    <body>  
        <?php
        $pdo = conectar();
        $personas = datos_bd($pdo);
        $total_resultados = count($personas);
        ?>

        <h2 class="sub-header">Listado de Personas</h2>
        
        <hr>
        <a href="../index.php" class="btn bg-info ">Alta</a>
        
        <div class="table-responsive">
            <table class="table table-striped  table-bordered table-hover">
                <thead>
                    <tr class="bg-info">
                        <th>Id</th>
                        <th>Apellido y Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                        <th>Activo</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($personas as $res){ ?>
                        <tr><td><?php echo $res['id'];?></td>
                            <td><?php echo $res['apellido'];?> , <?php echo $res['nombre'];?></td>
                            <td><?php echo $res['fecha_nac'];?></td>
                            <td><?php echo $res['edad'];?></td>
                            <td><?php echo $res['activo']==true?'Si':'No';?></td>
                            <td><a href="index.php" class="btn btn-warning">Modificar</a></td>
                            <td><a href="" class="btn btn-danger" style="border-collapse: collapse ">Borrar</a> </td></tr>
                    <?php } ?>          
                </tbody>
            </table>
        </div>

    </body>
</html>