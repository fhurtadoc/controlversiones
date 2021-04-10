CREATE USER 'pruebaversion'   IDENTIFIED BY '123';

GRANT ALL PRIVILEGES ON *.* TO 'pruebaversion' WITH GRANT OPTION;
FLUSH PRIVILEGES;
EXIT;

CREATE DATABASE versionesPrueba;

USE versionesPrueba;

CREATE TABLE borrador(
    id INT(100) NOT NULL AUTO_INCREMENT, 
    radicado varchar (100),
    version_radicado JSON NULL,
    PRIMARY KEY (id)
);


INSERT INTO borrador (id, radicado) values( 1, 123456789  );
INSERT INTO borrador (id, radicado) values( 2, 12345645845  );
INSERT INTO borrador (id, radicado) values( 3, 123451654  );
INSERT INTO borrador (id, radicado values( 4, 1234545454  );
INSERT INTO borrador (id, radicado) values( 5, 12345461  );
INSERT INTO borrador (id, radicado) values( 6, 1234566514  );
INSERT INTO borrador (id, radicado) values( 7, 12345549871  );

