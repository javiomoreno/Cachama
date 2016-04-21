CREATE TABLE cac_tiposUsuarios (
  tiusiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  tiusnomb VARCHAR(50)  NULL  ,
  tiusdesc VARCHAR(200)  NULL    ,
PRIMARY KEY(tiusiden));



CREATE TABLE cac_sexos (
  sexoiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  sexonomb VARCHAR(50)  NULL  ,
  sexodesc VARCHAR(200)  NULL    ,
PRIMARY KEY(sexoiden));



CREATE TABLE cac_usuarios (
  usuaiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_sexos_sexoiden INTEGER UNSIGNED  NOT NULL  ,
  cac_tiposUsuarios_tiusiden INTEGER UNSIGNED  NOT NULL  ,
  usuanomb VARCHAR(50)  NULL  ,
  usuaapel VARCHAR(50)  NULL  ,
  usuacedu VARCHAR(50)  NULL  ,
  usuatele VARCHAR(50)  NULL  ,
  usuadire VARCHAR(200)  NULL  ,
  usuauser VARCHAR(50)  NULL  ,
  useapass VARCHAR(250)  NULL    ,
PRIMARY KEY(usuaiden)  ,
INDEX mid_usuarios_FKIndex1(cac_tiposUsuarios_tiusiden)  ,
INDEX mid_usuarios_FKIndex2(cac_sexos_sexoiden),
  FOREIGN KEY(cac_tiposUsuarios_tiusiden)
    REFERENCES cac_tiposUsuarios(tiusiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_sexos_sexoiden)
    REFERENCES cac_sexos(sexoiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);




