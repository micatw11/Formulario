<html>
    <head>
        <?php include_once '../header.php'; ?>
        <?php //require_once 'barra.php'; ?>
        <?php include_once 'conexion.php'; ?>
        <title>Listado de Personas</title> 
        <?php include_once '../funciones.php'; ?>

    </head>
    <body>  
        <?php
        
        $personas = datos_bd('persona_cliente');
        $usuarios = datos_bd('persona_usuario');
        $Nacionalidad= Nacionalidad();
        $total_resultados = count($personas);
        ?>

        <h2 class="sub-header">Listado de Personas</h2>
        
        <hr>
        <a href="../vista_form.php" class="btn bg-info ">Alta</a>
        
        <div class="table-responsive">
            <table class="table table-striped  table-bordered table-hover">
                <thead>
                    <tr class="bg-info">
                        <th>Id</th>
                        <th>Apellido y Nombre</th>
                        <th>Documento</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                        <th>Nacionalidad</th>
                        <th>Estado</th>
                        <th colspan="3">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($personas as $res){  ?>
                        <tr><td><?php echo $res['id'];?></td>
                            <td><?php echo $res['apellido'];?> , <?php echo $res['nombre'];?></td>
                            <td><?php echo $res['documento'];?></td>
                            <td><?php echo $res['fecha_nac'];?></td>
                      
                            <td><?php echo $res['edad'];?></td>
                             <td>  <?php foreach ($Nacionalidad  as $nacion){ 
                          if ($nacion['id']== $res['nacionalidades_id']){?>
                            <?php echo ( $nacion['descripcion']); ?>
                      <?php }} ?> </td>
                            <td><?php echo $res['activo']==1?'Si':'No';?></td>
                            <td><a href="../editar.php?id=<?php echo $res['id']?>" class="btn btn-warning">Modificar</a></td>
                            <td><a href="javascript:;" onclick="aviso('../eliminar.php?id=<?php echo $res['id']?>'); return false;" class="btn btn-danger" style="border-collapse: collapse ">Borrar</a> </td></tr>
                    <?php } ?>          
                </tbody>
            </table>
        </div>

    </body>
</html>