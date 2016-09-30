<?php include_once '../header.php';?>
<html>
    <head>
        <title>Iniciar Sesion</title>
    </head>
    <body>
         
    <center>
       <div class="panel-footer"><hr />
        <form method="post" action= "variables.php">
                    
            <div class="form-group">
                <label>Nombre Usuario:</label><br>
                <input name= "username" type="text" class="form-control" id="username" required>
                <br><br>
            </div>
            <div class="form-group">
                <label>Contraseña:</label><br>
                <input type="password" name="password" size="8" maxlength="50" class="form-control" id="password" required>
                <br><br>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label><br>
            </div>
            <button type="submit" name="Submit" class="btn btn-default">Iniciar</button>
            <button type="submit" name="Submit" class="btn btn-default">Login</button>
        </form></div>
    </center>
        <hr />
    </body>
</html>
