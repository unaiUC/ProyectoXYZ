CREATE DATABASE proyectoXYZ;

CREATE TABLE loginsXYZ (
    loginid int NOT NULL AUTO_INCREMENT,
    loginname varchar(16),
    loginpass varchar(255),
    PRIMARY KEY (loginid)
); 

CREATE USER 'userlog'@'localhost' IDENTIFIED BY '****************';

GRANT SELECT ON proyectoXYZ.loginsXYZ TO 'userlog'@'localhost';

CREATE USER 'userreg'@'localhost' IDENTIFIED BY '****************';
GRANT INSERT, SELECT ON proyectoXYZ.loginsXYZ TO 'userreg'@'localhost';

CREATE TABLE historias (
    idhistoria INT AUTO_INCREMENT,
    titulo VARCHAR(255),
    texto MEDIUMTEXT,
    Organizacion VARCHAR(255),
    Classification VARCHAR(255),
    fecha DATE,
    usuario VARCHAR(255),
    PRIMARY KEY (idhistoria)
);
