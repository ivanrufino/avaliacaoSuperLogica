CREATE TABLE usuario (
	id INT UNSIGNED auto_increment NOT NULL,
	cpf varchar(11) NOT NULL,
	nome varchar(100) NULL,
	CONSTRAINT usuarios_PK PRIMARY KEY (id),
	CONSTRAINT usuarios_UN UNIQUE KEY (cpf)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;



