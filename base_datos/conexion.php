<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

   // require_once '../Procesar.php';
//include_once '../login/variables.php';

function conectar() {
    try {
        
        $pdo = new PDO('mysql:host=localhost;dbname=clientes', 'root', '1234');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        return $pdo;
    } catch (PDOException $e) {

        echo 'Error de conexion: ' . $e->getMessage();
    }
} 

function ingresar_variables() {
    try {
        $pdo = conectar();
         $sql =  "INSERT INTO usuarios ("
                . "nombre, "
                . "estado)"
                . "VALUES ('". $_SESSION['nombre'] . "','" . $_SESSION['estado'] . "')";
        $pdo->exec($sql);
        $sql2 = "INSERT INTO personas ("
                . "usuarios_id, "
                . "apellido, "
                . "nombre,"
                . "documento, "
                . "fecha_nac,"
                . "edad, "
                . "nacionalidad_id)"
                . "VALUES (LAST_INSERT_ID(),'" 
                . $_SESSION['apellido'] . "','" 
                . $_SESSION['nombre'] . "','" 
                 . $_SESSION['documento'] . "','"
                . $_SESSION['fechaNacimiento'] . "','" 
                . $_SESSION['edad'] . "','"
                .$_SESSION['nacionalidad']."')";
        $pdo->exec($sql2);
       
        $pdo->commit();
        return $pdo;
    } catch (PDOException $e) {

        echo 'Error de insercion de archivos: ' . $e->getMessage();
    }
}

function datos_bd($nom_tabla) {
    try {
        $pdo = conectar();
        $sql = "SELECT * FROM ".$nom_tabla;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchall(); //especificamos la salida como un array
        //podria ser PDO::FECH_OBJ con  $fila->apellido; var_dump($fila);$stmt->fetchall();
        return $results;
    } catch (PDOException $e) {

        echo 'Error de peticion de registros: ' . $e->getMessage();
    }
}

function datos_limitados($inicio, $TAMANO_PAGINA) {
    try {
        $pdo = conectar();
        $sql = "SELECT * FROM personas LIMIT " . $inicio . "," . $TAMANO_PAGINA;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros: ' . $e->getMessage();
    }
}

function login($username) {
    try {
        $pdo = conectar();
        $sql = "SELECT * FROM usuarios WHERE nombre = '$username'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchall(); 
        return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros de login: ' . $e->getMessage();
    }
}

function update($id){
        $pdo = conectar();
         $sql = $pdo->prepare('UPDATE `clientes`  '
                 . 'SET '
                 . 'nombre=:nombre, '
                 . 'apellido=:apellido,'
                 . 'fecha_nacimiento=:fecha_nacimiento,'
                 . 'nacionalidad_id=:nacionalidad_id,'
                 . 'activo=:activo '
                 . 'WHERE id = :id;');
         $consulta->bindParam(':nombre', $info['nombre']);
         $consulta->bindParam(':apellido', $info['apellido']);
         $consulta->bindParam(':fecha_nacimiento', $info['fecha_nacimiento']);
         $consulta->bindParam(':nacionalidad_id', $info['nacionalidad']);
         $consulta->bindParam(':activo', $info['activo']);
         $consulta->bindParam(':id', $id);
         $consulta->execute();
         
    
}


function buscarPersonas($id){
    try {
    $pdo = conectar();
    $sql = "SELECT * "
        . "FROM personas "
        . "WHERE id= $id " ;
   
    $stmt = $pdo->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchall(); 
        
    return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros de login: ' . $e->getMessage();
    }
}

function buscarUsuario($id){
    try {
    $pdo = conectar();
    $sql = "SELECT * "
        . "FROM usuarios"
        . "WHERE id= $id " ;
   
    $stmt = $pdo->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchall(); 
        
    return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros de login: ' . $e->getMessage();
    }
}



function borrar($id){
        $pdo = conectar();
         $consulta = $pdo->prepare("DELETE FROM personas WHERE id = '$id';");         
         $consulta->execute();
}

function Nacionalidad(){
    try {
        $pdo = conectar();
    $stmt=$pdo->prepare("SELECT * FROM nacionalidad");
    $stmt->execute();
    $results = $stmt->fetchall(); 
        return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros de Nacionalidad: ' . $e->getMessage();
    }
}

