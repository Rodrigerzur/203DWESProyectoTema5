<?php
    if ($_SERVER['PHP_AUTH_USER']!='admin' || $_SERVER['PHP_AUTH_PW']!='paso') { //Si el usuario introducido no es el hardcodeado
        header('WWW-Authenticate: Basic Realm="Contenido no accesible"'); //Vuelve a mostrar la cabecera
        header('HTTP/1.0 401 Unauthorized'); //Unauthorized
        echo "Usuario incorrecto"; //Mensaje de error
        exit;
    }
?>