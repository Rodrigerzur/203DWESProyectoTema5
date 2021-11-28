<?php

require_once '../config/confDBPDO.php';

try {
    $miDB = new PDO(HOST, USER, PASSWORD);
    $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $consulta = <<<CONSULTA
                USE dbs4868791;
                CREATE TABLE IF NOT EXISTS T01_Usuario(
                    T01_CodUsuario varchar(10) PRIMARY KEY,
                    T01_Password varchar(64) NOT NULL,
                    T01_DescUsuario varchar(255) NOT NULL,
                    T01_NumConexiones int DEFAULT 0,
                    T01_FechaHoraUltimaConexion int,
                    T01_Perfil enum('administrador', 'usuario') DEFAULT 'usuario',
                    T01_ImagenUsuario mediumblob NULL
                )engine=innodb;
            
                CREATE TABLE IF NOT EXISTS T02_Departamento(
                    T02_CodDepartamento varchar(3) PRIMARY KEY,
                    T02_DescDepartamento varchar(255) NOT NULL,
                    T02_FechaCreacionDepartamento int NULL,
                    T02_VolumenDeNegocio float NULL,
                    T02_FechaBajaDepartamento date NULL
                )engine=innodb;
                CONSULTA;

    $miDB->exec($consulta); //Ejecuto la consulta

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