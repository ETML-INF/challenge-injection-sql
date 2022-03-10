CREATE TABLE t_user (
  idUser int(11) NOT NULL AUTO_INCREMENT,
  useLogin varchar(20) NOT NULL,
  usePassword varchar(255) NOT NULL,
  useAdministrator int(2) NOT NULL,
  PRIMARY KEY (idUser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO t_user (idUser, useLogin, usePassword, useAdministrator) VALUES (DEFAULT, 'toto', 'toto', 0);
INSERT INTO t_user (idUser, useLogin, usePassword, useAdministrator) VALUES (DEFAULT, 'administrator', 'administrator', 1);
