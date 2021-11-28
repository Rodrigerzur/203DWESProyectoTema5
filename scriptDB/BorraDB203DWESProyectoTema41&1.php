<?php
require_once '../config/confDBPDO.php';
try {
    $miDB = new PDO(HOST, USER, PASSWORD);
    $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consulta = <<<CONSULTA
                DROP TABLE IF EXISTS T01_Usuario;
                DROP TABLE IF EXISTS T02_Departamento;
                CONSULTA;
    $miDB->exec($consulta);

    echo 'Todo correcto';
} catch (PDOException $excepcion) {//Codigo que se ejecuta si hay algun error
    $errorExcepcion = $excepcion->getCode(); //Obtengo el codigo del error y lo almaceno en la variable errorException
    $mensajeException = $excepcion->getMessage(); //Obtengo el mensaje del error y lo almaceno en la variable mensajeException
    echo "<span style='color: red'>Codigo del error: </span>" . $errorExcepcion; //Muestro el codigo del error
    echo "<span style='color: red'>Mensaje del error: </span>" . $mensajeException; //Muestro el mensaje del error
} finally {
    //Cierro la conexion
    unset($miDB);
}
?>