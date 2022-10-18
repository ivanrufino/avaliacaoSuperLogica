CREATE TABLE usuario (
    id_usuario INT UNSIGNED auto_increment NOT NULL,
	name varchar(100) NULL,
	userName varchar(50) NULL,
	zipCode varchar(9) NULL,
	email varchar(100) NULL,
	password varchar(32) NULL,
	ativo varchar(1) DEFAULT 1 NULL,
	
	CONSTRAINT usuarios_PK PRIMARY KEY (id_usuario)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;
