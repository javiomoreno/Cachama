CREATE TABLE cac_tiposUsuarios (
  tiusiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  tiusnomb VARCHAR(50)  NULL  ,
  tiusdesc VARCHAR(200)  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechamodi DATE  NULL    ,
PRIMARY KEY(tiusiden));



CREATE TABLE cac_lagunas (
  laguiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  lagunomb VARCHAR(50)  NULL  ,
  lagutama VARCHAR(50)  NULL  ,
  lagucapa INTEGER UNSIGNED  NULL  ,
  laguimag LONGBLOB  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(laguiden));



CREATE TABLE cac_tipoProveedores (
  tipriden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  tiprnomb VARCHAR(50)  NULL  ,
  tiprdesc VARCHAR(200)  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(tipriden));



CREATE TABLE cac_sexos (
  sexoiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  sexonomb VARCHAR(50)  NULL  ,
  sexodesc VARCHAR(200)  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi INTEGER UNSIGNED  NULL    ,
PRIMARY KEY(sexoiden));



CREATE TABLE cac_proveedores (
  providen INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_tipoProveedores_tipriden INTEGER UNSIGNED  NOT NULL  ,
  provnomb VARCHAR(50)  NULL  ,
  provrif VARCHAR(20)  NULL  ,
  provdire VARCHAR(200)  NULL  ,
  provtele VARCHAR(50)  NULL  ,
  provemai VARCHAR(50)  NULL  ,
  provimag LONGBLOB  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(providen)  ,
INDEX cac_proveedores_FKIndex1(cac_tipoProveedores_tipriden),
  FOREIGN KEY(cac_tipoProveedores_tipriden)
    REFERENCES cac_tipoProveedores(tipriden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_alimentos (
  alimiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_proveedores_providen INTEGER UNSIGNED  NOT NULL  ,
  alimnomb VARCHAR(50)  NULL  ,
  alimdesc VARCHAR(200)  NULL  ,
  alimimag LONGBLOB  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(alimiden)  ,
INDEX cac_alimentos_FKIndex1(cac_proveedores_providen),
  FOREIGN KEY(cac_proveedores_providen)
    REFERENCES cac_proveedores(providen)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_especies (
  espeiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_proveedores_providen INTEGER UNSIGNED  NOT NULL  ,
  espenomb VARCHAR(50)  NULL  ,
  especara VARCHAR(300)  NULL  ,
  espeimag LONGBLOB  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(espeiden)  ,
INDEX cac_especies_FKIndex1(cac_proveedores_providen),
  FOREIGN KEY(cac_proveedores_providen)
    REFERENCES cac_proveedores(providen)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_equipos (
  equiiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_proveedores_providen INTEGER UNSIGNED  NOT NULL  ,
  equinomb VARCHAR(50)  NULL  ,
  equidesc VARCHAR(200)  NULL  ,
  equiimag LONGBLOB  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(equiiden)  ,
INDEX cac_equipos_FKIndex1(cac_proveedores_providen),
  FOREIGN KEY(cac_proveedores_providen)
    REFERENCES cac_proveedores(providen)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_usuarios (
  usuaiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_sexos_sexoiden INTEGER UNSIGNED  NOT NULL  ,
  cac_tiposUsuarios_tiusiden INTEGER UNSIGNED  NOT NULL  ,
  usuanomb VARCHAR(50)  NULL  ,
  usuaapel VARCHAR(50)  NULL  ,
  usuacedu VARCHAR(50)  NULL  ,
  usuatele VARCHAR(50)  NULL  ,
  usuadire VARCHAR(200)  NULL  ,
  usuaimag LONGBLOB  NULL  ,
  usuauser VARCHAR(50)  NULL  ,
  usuapass VARCHAR(250)  NULL    ,
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



CREATE TABLE cac_lagunas_especies (
  laesinde INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_especies_espeiden INTEGER UNSIGNED  NOT NULL  ,
  cac_lagunas_laguiden INTEGER UNSIGNED  NOT NULL  ,
  laestota INTEGER UNSIGNED  NULL  ,
  laesdisp INTEGER UNSIGNED  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(laesinde)  ,
INDEX cac_lagunas_especies_FKIndex1(cac_lagunas_laguiden)  ,
INDEX cac_lagunas_especies_FKIndex2(cac_especies_espeiden),
  FOREIGN KEY(cac_lagunas_laguiden)
    REFERENCES cac_lagunas(laguiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_especies_espeiden)
    REFERENCES cac_especies(espeiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_ventas (
  ventiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_lagunas_especies_laesinde INTEGER UNSIGNED  NOT NULL  ,
  cac_usuarios_usuaiden_cl INTEGER UNSIGNED  NOT NULL  ,
  cac_usuarios_usuaiden_us INTEGER UNSIGNED  NOT NULL  ,
  ventfech DATE  NULL  ,
  vanttota FLOAT  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(ventiden)  ,
INDEX cac_ventas_FKIndex1(cac_usuarios_usuaiden_us)  ,
INDEX cac_ventas_FKIndex2(cac_usuarios_usuaiden_cl)  ,
INDEX cac_ventas_FKIndex3(cac_lagunas_especies_laesinde),
  FOREIGN KEY(cac_usuarios_usuaiden_us)
    REFERENCES cac_usuarios(usuaiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_usuarios_usuaiden_cl)
    REFERENCES cac_usuarios(usuaiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_lagunas_especies_laesinde)
    REFERENCES cac_lagunas_especies(laesinde)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);



CREATE TABLE cac_compras (
  compiden INTEGER UNSIGNED  NOT NULL   AUTO_INCREMENT,
  cac_usuarios_usuaiden INTEGER UNSIGNED  NOT NULL  ,
  cac_alimentos_alimiden INTEGER UNSIGNED  NOT NULL  ,
  cac_especies_espeiden INTEGER UNSIGNED  NOT NULL  ,
  cac_equipos_equiiden INTEGER UNSIGNED  NOT NULL  ,
  compfech DATE  NULL  ,
  comptota FLOAT  NULL  ,
  compcant INTEGER UNSIGNED  NULL  ,
  usuamodi INTEGER UNSIGNED  NULL  ,
  fechmodi DATE  NULL    ,
PRIMARY KEY(compiden)  ,
INDEX cac_compras_FKIndex1(cac_equipos_equiiden)  ,
INDEX cac_compras_FKIndex2(cac_especies_espeiden)  ,
INDEX cac_compras_FKIndex3(cac_alimentos_alimiden)  ,
INDEX cac_compras_FKIndex4(cac_usuarios_usuaiden),
  FOREIGN KEY(cac_equipos_equiiden)
    REFERENCES cac_equipos(equiiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_especies_espeiden)
    REFERENCES cac_especies(espeiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_alimentos_alimiden)
    REFERENCES cac_alimentos(alimiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(cac_usuarios_usuaiden)
    REFERENCES cac_usuarios(usuaiden)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION);




