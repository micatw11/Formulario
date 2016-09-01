<?php

error_reporting(E_ALL);
ini_set("display_errors", true);

function conectar() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=clientes_db', 'root', ' ');
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, TRUE);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec("SET NAMES UTF8");
        return $pdo;
    } catch (PDOException $e) {

        echo 'Error de conexion: ' . $e->getMessage();
    }
}

function ingresar_variables($pdo, $datos) {
    try {
        $sql = "INSERT INTO clientes (apellido, nombre , activo,fecha_nac,nacionalidad_id)"
                . "VALUES ('" . $datos['apellido'] . "','" . $datos['nombre'] . "','1','" . $datos['fechaNacimiento'] . "','1')";
        $pdo->exec($sql);
        $pdo->commit();
        return $pdo;
    } catch (PDOException $e) {

        echo 'Error de insercion de archivos: ' . $e->getMessage();
    }
}

function datos_bd($pdo) {
    try {
        $sql = "SELECT * FROM clientes";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC); //especificamos la salida como un array
        //  //podria ser PDO::FECH_OBJ con  $fila->apellido; var_dump($fila);$stmt->fetchall();
        return $results;
    } catch (PDOException $e) {
      
        echo 'Error de peticion de registros: ' . $e->getMessage();
    }
}

function datos_limitados($pdo, $inicio, $TAMANO_PAGINA) {
    try {
        $sql = "SELECT * FROM clientes LIMIT " . $inicio . "," . $TAMANO_PAGINA;
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        echo 'Error de peticion de registros: ' . $e->getMessage();
    }
}
