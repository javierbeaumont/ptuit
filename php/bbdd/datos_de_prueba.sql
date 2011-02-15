use ptuit;

TRUNCATE seguirusuario;
TRUNCATE mensaje;
TRUNCATE usuario;

ALTER TABLE mensaje ENGINE = InnoDB;
ALTER TABLE usuario ENGINE = InnoDB;
ALTER TABLE seguirusuario ENGINE = InnoDB;


/* TABLA DE USUARIOS */

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"maria","maria@maria.com");

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"jose","jose@jose.com");

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"jesus","jesus@jesus.com");

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"felix","felix@felix.com");

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"ana","ana@ana.com");

INSERT INTO `usuario` (password,nombre,correo)
VALUES (password("clave"),"manu","manu@manu.com");


/* TABLA DE MENSAJES */

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 1","1","2");

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 2","2","");

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 3","3","3");

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 4","4","");

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 5","5","5");

INSERT INTO `mensaje` (mensaje,usuario,tipo)
VALUES ("Mensaje 6","6","");


/* TABLA DE SEGUIMIENTOS */

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("6","5");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("6","4");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("6","1");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("1","3");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("1","4");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("1","5");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("2","6");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("3","5");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("3","4");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("4","3");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("4","2");

INSERT INTO `seguirusuario` (idseguido, idseguidor)
VALUES ("5","1");

ALTER TABLE seguirusuario ADD FOREIGN KEY (idseguido) REFERENCES usuario (id);
ALTER TABLE seguirusuario ADD FOREIGN KEY (idseguidor) REFERENCES usuario (id);
ALTER TABLE mensaje ADD FOREIGN KEY (usuario) REFERENCES usuario (id);

select * from usuario;
select * from mensaje;
select * from seguirusuario;
