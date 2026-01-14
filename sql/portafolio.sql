-- COMANDO SQL PARA ELIMINAR TODAS LAS TABLAS DE LA BD
SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE galeria;
DROP TABLE portafolio_tecnologias;
DROP TABLE portafolio;
DROP TABLE usuarios;
DROP TABLE tipo_portafolio;
DROP TABLE estados;
DROP TABLE tecnologias;
DROP TABLE roles;
SET FOREIGN_KEY_CHECKS = 1;

-- COMANDO SQL PARA LIMPIAR CONTENIDOS DE LA TABLAS PERO NO REINICIA CON 1
DELETE FROM galeria;
DELETE FROM portafolio;
DELETE FROM usuarios;
DELETE FROM estados;
DELETE FROM roles;
DELETE FROM tecnologias;
DELETE FROM tipo_portafolio;
DELETE FROM portafolio_tecnologias;

-- COMANDO SQL PARA LIMPIAR LAS TABLAS
TRUNCATE TABLE roles;
TRUNCATE TABLE galeria;
TRUNCATE TABLE portafolio;
TRUNCATE TABLE tipo_portafolio;
TRUNCATE TABLE estados;

-- COMANDO SQL PARA CREAR TABLAS DEL PROYECTO
CREATE TABLE estados (
    est_id INT AUTO_INCREMENT PRIMARY KEY,
    est_descripcion TEXT
);

CREATE TABLE roles (
	rol_id INT AUTO_INCREMENT PRIMARY KEY,
    rol_descripcion TEXT
);

CREATE TABLE tecnologias (
	tec_id INT AUTO_INCREMENT PRIMARY KEY,
    tec_descripcion TEXT
);

CREATE TABLE tipo_portafolio (
	tp_id INT AUTO_INCREMENT PRIMARY KEY,
    tp_descripcion TEXT
);

CREATE TABLE usuarios (
    us_id INT AUTO_INCREMENT PRIMARY KEY,
    us_nombre TEXT,
    us_usuario TEXT,
    us_contrasena VARCHAR(255),
    us_id_rol INT,
    FOREIGN KEY (us_id_rol) REFERENCES roles(rol_id)
);

CREATE TABLE portafolio (
    port_id INT AUTO_INCREMENT PRIMARY KEY,
    port_titulo TEXT,
    port_resumen TEXT,
    port_descripcion TEXT,
    port_foto VARCHAR(255),
    port_link VARCHAR(255),
    port_id_tipo INT,
    port_id_estado INT,
    port_id_usuario INT,
    port_fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    port_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (port_id_tipo) REFERENCES tipo_portafolio(tp_id),
    FOREIGN KEY (port_id_usuario) REFERENCES usuarios(us_id),
    FOREIGN KEY (port_id_estado) REFERENCES estados(est_id)
);

CREATE TABLE portafolio_tecnologias (
    portec_id INT AUTO_INCREMENT PRIMARY KEY,
    portec_id_portafolio INT,
    portec_id_tecnologia INT,
    FOREIGN KEY (portec_id_portafolio) REFERENCES portafolio(port_id),
    FOREIGN KEY (portec_id_tecnologia) REFERENCES tecnologias(tec_id),
    UNIQUE (portec_id_portafolio, portec_id_tecnologia)
);

CREATE TABLE galeria (
    gale_id INT AUTO_INCREMENT PRIMARY KEY,
    gale_id_portafolio INT,
    gale_titulo_img TEXT,
    gale_descripcion TEXT,
    gale_foto VARCHAR(255),
    gale_fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    gale_fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (gale_id_portafolio) REFERENCES portafolio(port_id)
);

-- COMANDO SQL PARA INSERTAR TECNOLOGIAS
INSERT INTO tecnologias (tec_descripcion)
VALUES
    ('HTML5'),
    ('CSS3'),
    ('JavaScript'),
    ('PHP8'),
    ('React.js'),
    ('Vue.js'),
    ('Node.js'),
    ('Express.js'),
    ('Python'),
    ('Django'),
    ('PostgreSQL'),
    ('MySQL'),
    ('MongoDB'),
    ('Docker'),
    ('AWS');

-- COMANDO SQL PARA ALTERAR LAS COLUMNAS DE COTEJAMIENTO DE LAS TABLAS DE UNA BASE DE DATOS
ALTER TABLE tecnologias CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE usuarios CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE estados CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE galeria CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE portafolio_tecnologias CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE portafolio CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE tipo_portafolio CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
ALTER TABLE roles CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- COMANDO SQL PARA ALTERAR LAS COLUMNAS DE TIPO DE LAS TABLAS DE UNA BASE DE DATOS
ALTER TABLE tecnologias ENGINE = InnoDB;
ALTER TABLE usuarios ENGINE = InnoDB;
ALTER TABLE estados ENGINE = InnoDB;
ALTER TABLE galeria ENGINE = InnoDB;
ALTER TABLE portafolio_tecnologias ENGINE = InnoDB;
ALTER TABLE portafolio ENGINE = InnoDB;
ALTER TABLE tipo_portafolio ENGINE = InnoDB;
ALTER TABLE roles ENGINE = InnoDB;
