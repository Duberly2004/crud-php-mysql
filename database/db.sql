DROP DATABASE php_mysql_crud;
CREATE DATABASE IF NOT EXISTS php_mysql_crud;

USE php_mysql_crud;

CREATE TABLE IF NOT EXISTS tasks(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tasks (title,description) VALUES ("Salir a patinar","Tengo que salir a patinar");

SELECT * FROM tasks;