DROP DATABASE IF EXISTS rescate;
CREATE DATABASE rescate;
USE rescate;

CREATE TABLE personas(
    idpersona   INT AUTO_INCREMENT  PRIMARY KEY,
    dni         CHAR        (8)     UNIQUE NOT NULL,
    nombres     VARCHAR     (60)    NOT NULL,
    apellidos   VARCHAR     (60)    NOT NULL,
    telefono    CHAR        (9)     NULL,
    email       VARCHAR     (80)    NULL,
    activo      CHAR        (1)     NOT NULL DEFAULT '1',
    created     DATETIME            NOT NULL DEFAULT now() COMMENT "Campo de fecha de creación",
    updated     DATETIME            NULL COMMENT "Se agrega al detectar un cambio"
)ENGINE=Innodb;

CREATE TABLE animales(
    idanimal        INT AUTO_INCREMENT PRIMARY KEY,
    idpersona       INT NOT NULL,
    nombre          VARCHAR(40) NULL, 
    especie         ENUM('Perro','Gato','Ave','Conejo','Otro') NOT NULL,
    sexo            ENUM("M","F") NOT NULL,
    condicion       ENUM("Rescatado","Tratamiento","Adopcion","Adoptado") NOT NULL DEFAULT "Rescatado",
    fecharescate    DATE NOT NULL,
    lugar           VARCHAR(70) NOT NULL,
    observaciones   TEXT,
    foto            VARCHAR(225),
    activo          CHAR        (1)     NOT NULL DEFAULT '1',
    created         DATETIME            NOT NULL DEFAULT now() COMMENT "Campo de fecha de creación",
    updated         DATETIME            NULL COMMENT "Se agrega al detectar un cambio",
    FOREIGN KEY (idpersona) REFERENCES personas(idpersona)
)ENGINE=Innodb;

INSERT INTO personas(dni, nombres, apellidos, telefono, email, activo) VALUES
("61298242","Melanie Elizabeth","Tello Carbajal","987654321","melanie@gmail.com",'1'),
("60786100","Pepe","Peñaloza Vasquez","912345678","pepe@gmail.com",'1'),
("70981234","Ana Lucía","Ramírez Soto","956123789","ana.ramirez@gmail.com",'1'),
("74829103","Carlos Alberto","Huamán Torres","934567812","carlos.huaman@gmail.com",'1');


INSERT INTO animales
(idpersona, nombre, especie, sexo, condicion, fecharescate, lugar, observaciones, foto, activo)
VALUES
(1,'Michi','Gato','F','Tratamiento','2025-12-20','Chincha Alta',
 'Presenta desnutrición y una pata lesionada',
 'imagenes/animales/michi.jpg',1),

(1,'Rocky','Perro','M','Adopcion','2025-12-10','Centro Poblado Magdalena',
 'Animal dócil y sociable',
 'imagenes/animales/rocky.jpg',1),

(2,'Luna','Perro','F','Adoptado','2025-11-05','Pisco',
 'Fue rescatada de la calle, ya esterilizada',
 'imagenes/animales/luna.jpg',1),

(3,'Copito','Gato','M','Tratamiento','2025-12-01','Ica',
 'Infección respiratoria severa',
 'imagenes/animales/copito.jpg',1),

(4,NULL,'Ave','F','Rescatado','2025-12-18','Nazca',
 'Ave encontrada con ala lastimada',
 'imagenes/animales/ave001.jpg',1);


SELECT 
    animal.idanimal,
    persona.nombres AS Rescatista,
    animal.nombre,
    animal.especie,
    animal.sexo,
    animal.condicion,
    animal.fecharescate, 
    animal.lugar,
    animal.observaciones,
    animal.foto 
FROM animales AS animal
INNER JOIN personas AS persona
    ON animal.idpersona = persona.idpersona
WHERE animal.activo ='1'
ORDER BY animal.idanimal DESC;

SELECT idpersona, dni, nombres, apellidos, telefono,email 
FROM personas
ORDER BY idpersona DESC;