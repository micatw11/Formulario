<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

   // require_once '../Procesar.php';
//include_once '../login/variables.php';

function conectar() {
    try {
        
        $pdo = new PDO('mysql:host=localhost;dbname=Base_Datos', 'root', 'udc');
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
        
        $sql2 = "INSERT INTO persona_cliente ("
                . "apellido, "
                . "nombre,"
                . "documento, "
                . "fecha_nac,"
                . "edad, "
                . "nacionalidades_id)"
                . "VALUES ('".$_SESSION['apellido']."','"
                . $_SESSION['nombre'] . "','" 
                 . $_SESSION['documento'] . "','"
                . $_SESSION['fechaNacimiento'] . "','" 
                . $_SESSION['edad'] . "','"
                .$_SESSION['nacionalidad']."')";
        $pdo->exec($sql2);
       
        $pdo->commit();
        return $pdo;
    } catch (PDOException $e) {

        //echo 'Error de insercion de archivos: ' . $e->getMessage();
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
        $sql = "SELECT * FROM persona_cliente LIMIT " . $inicio . "," . $TAMANO_PAGINA;
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
        $sql = "SELECT * FROM persona_usuario WHERE nombre = '$username'";

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
         $sql = $pdo->prepare('UPDATE `persona_cliente`  '
                 . 'SET '
                 . 'nombre=:nombre, '
                 . 'apellido=:apellido,'
                 . 'documento=:documento,'
                 . 'edad=:edad,'
                 . 'fecha_nac=:fecha_nacimiento,'
                 . 'nacionalidades_id=:nacionalidad_id,'
                 . 'activo=:activo '
                 . 'WHERE id = :id;');
         $sql->bindParam(':nombre', $_SESSION['nombre']);
         $sql->bindParam(':apellido', $_SESSION['apellido']);
         $sql->bindParam(':documento', $_SESSION['documento']);
         $sql->bindParam(':edad', $_SESSION['edad']);
         $sql->bindParam(':fecha_nacimiento', $_SESSION['fechaNacimiento']);
         $sql->bindParam(':nacionalidad_id', $_SESSION['nacionalidad']);
         $sql->bindParam(':activo', $_SESSION['activo']);
         $sql->bindParam(':id', $id);
         $sql->executeUpdate();
         
    
}


function buscarPersonas($id){
    try {
    $pdo = conectar();
    $sql = "SELECT * "
        . "FROM persona_cliente "
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
        . "FROM persona_usuario"
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
         $consulta = $pdo->prepare("DELETE FROM persona_cliente WHERE id = '$id';");         
         $consulta->execute();
}

function Nacionalidad(){
    try {
        $pdo = conectar();
    $stmt=$pdo->prepare("SELECT * FROM nacionalidades");
    $stmt->execute();
    $results = $stmt->fetchall(); 
        return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros de Nacionalidad: ' . $e->getMessage();
    }
}

