 <html>
    <head>
        <title>Iniciar Sesion</title>
    </head>
    <body>
        <div class="floating-form">    
<form method="post" action= "index.php">
  <div class="form-group">
    <label for="myusername">Usuario:</label>
    <input type="myusername" class="form-control" id="myusername">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
        </div>
    </body>

<?php $_SESSION['myusername'] = isset($_POST['myusername']) ? $_POST['myusername'] : null;
 $_SESSION['pwd'] = isset($_POST['pwd']) ? $_POST['pwd'] : null;?>
 </html>