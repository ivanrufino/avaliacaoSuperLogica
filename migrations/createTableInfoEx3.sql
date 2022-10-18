CREATE TABLE info (
	id INT UNSIGNED auto_increment NOT NULL,
	cpf varchar(11) NOT NULL,
	genero varchar(1) NOT NULL,
	ano_nascimento INT UNSIGNED NOT NULL,
	CONSTRAINT Info_PK PRIMARY KEY (id),
	CONSTRAINT Info_UN UNIQUE KEY (cpf)
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_0900_ai_ci;

