<html>
    <head>
        <?php require '../header.php'; ?>
       
        <?php include_once './conexion.php'; ?>
        <title>Listado de Personas</title> 
    </head>
    <body>  
        <?php
        $pdo= conectar();
	$personas= datos_bd($pdo);
        $total_resultados= count($personas);
	?>
        
        <h2 class="sub-header">Listado de Personas</h2>
        <hr>
        <div class="table-responsive">
            <table class="table table-striped  table-bordered table-hover">
                <thead>
                    <tr class="bg-info">
                        <th>Id</th>
                        <th>Apellido y Nombre</th>
                        <th>Fecha Nacimiento</th>
                        <th>Activo</th>
                        <th colspan="3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($personas as $res) {
                            echo  '<tr><td>'.$res['id'].'</td>';
                            echo '<td>'.$res['apellido'].','.$res['nombre'].'</td>';
                            echo  '<td>'.$res['fecha_nac'].'</td>';
                            echo  '<td>'.$res['activo'].'</td>';
                            echo '<td><a href="" class="btn btn-primary" style="   margin: auto">Read</a></td>'; 
                            echo '<td><a href="" class="btn btn-warning">Update</a></td>';
                            echo  '<td><a href="" class="btn btn-danger" style="border-collapse: collapse ">Borrar</a> </td></tr>';
                    }
//           ?>

                       

                </tbody>

            </table>
        </div>

    </body>
</html>