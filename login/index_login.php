<html>
    <head>
        <title>Iniciar Sesion</title>
    </head>
    <body>
        <hr />
    <center>
        <br><br>
        <br><br>
        <form method="post" action= "variables.php">
            <div class="form-group">
                <label>Nombre Usuario:</label><br>
                <input name= "username" type="text" class="form-control" id="username" required>
                <br><br>
            </div>
            <div class="form-group">
                <label>Password:</label><br>
                <input type="password" name="password" size="8" maxlength="50" class="form-control" id="password" required>
                <br><br>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label><br>
            </div>
            <button type="submit" name="Submit" class="btn btn-default">Iniciar</button>
            <button type="submit" name="Submit" class="btn btn-default">Login</button>
        </form>
    </center>
        <hr />
    </body>
</html>