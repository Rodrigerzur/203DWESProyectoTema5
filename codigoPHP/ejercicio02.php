<?php
//Incluir fichero con variables de conexion
require_once '../config/confDBPDO.php';

//si no nos hemos autentificado todavia
if (!isset($_SERVER['PHP_AUTH_USER']) || (!isset($_SERVER['PHP_AUTH_PW']))) {
    header('WWW-Authenticate: Basic Realm="Contenido no accesible"'); //Vuelve a mostrar la cabecera
    header('HTTP/1.0 401 Unauthorized'); //Unauthorized
    echo "Usuario incorrecto"; //Mensaje de error
    exit;
} else {//Una vez enviados los datos, los pasamos para comprobacion con la base de datos
    try {
        /* Establecemos la connection con pdo */
        $miDB = new PDO(HOST, USER, PASSWORD);
        /* configurar las excepcion */
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $usuario = $_SERVER['PHP_AUTH_USER']; //Guardo en una variable los datos pasados por teclado del usuario
        $password = $_SERVER['PHP_AUTH_PW']; //Guardo en una variable los datos pasados por teclado de la password

        $consulta = "SELECT T01_CodUsuario, T01_Password FROM T01_Usuario WHERE T01_CodUsuario=:CodUsuario"; //Creacion de la consulta sql
        $resultadoConsulta = $miDB->prepare($consulta); // Preparacion de la consulta
        $aParametros = [':CodUsuario' => $usuario]; //Almacenaje de los parametros en un array 
        $resultadoConsulta->execute($aParametros); //Ejecutar la consulta sql con los parametros anteriores 

        $oUsuario = $resultadoConsulta->fetchObject(); //Objeto en el que introduzco el resultado de la consulta
        if (($oUsuario->T01_CodUsuario == $usuario) && ($oUsuario->T01_Password == hash('sha256', $password))) { //Comprobamos si los datos introducidos en el log in coinciden con los de la base de datos
            echo "Usuario y password correctos." . "<br/>"; //Si coinciden se muestra este mensaje
            echo "Nombre de usuario: " . $_SERVER['PHP_AUTH_USER'] . "<br/>"; //Usuario
            echo "Password: " . $_SERVER['PHP_AUTH_PW']; //Contraseña
        } else { // Si no existe o no coinciden se pide que vuelvan a ser introducidos
            header('WWW-Authenticate: Basic Realm="Contenido no accesible"'); //Vuelve a mostrar la cabecera
            header('HTTP/1.0 401 Unauthorized'); //Unauthorized
            exit;
        }
    } catch (PDOException $excepcion) {//Codigo que se ejecuta si hay algun error
        $errorExcepcion = $excepcion->getCode(); //Obtengo el codigo del error y lo almaceno en la variable errorException
        $mensajeException = $excepcion->getMessage(); //Obtengo el mensaje del error y lo almaceno en la variable mensajeException
        echo "<p style='color: red'>Codigo del error: </p>" . $errorExcepcion; //Muestro el codigo del error
        echo "<p style='color: red'>Mensaje del error: </p>" . $mensajeException; //Muestro el mensaje del error
    } finally {
        //Cierro la conexion
        unset($miDB);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 02 </title>
    </head>
</html>