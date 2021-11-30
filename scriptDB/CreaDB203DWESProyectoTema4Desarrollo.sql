/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  daw2
 * Created: 4 nov. 2021
 */
create database if not exists DB203DWESProyectoTema4;
USE DB203DWESProyectoTema4;

create user 'User203DWESProyectoTema4'@'%' IDENTIFIED BY 'P@ssw0rd';
grant all privileges on DB203DWESProyectoTema4.* to 'User203DWESProyectoTema4'@'%';

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

