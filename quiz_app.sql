CREATE DATABASE cuestionario_db;
USE cuestionario_db;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE cuestionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT
);

CREATE TABLE preguntas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cuestionario_id INT,
    pregunta TEXT NOT NULL,
    opcion_a VARCHAR(255) NOT NULL,
    opcion_b VARCHAR(255) NOT NULL,
    opcion_c VARCHAR(255) NOT NULL,
    opcion_d VARCHAR(255) NOT NULL,
    respuesta_correcta CHAR(1) NOT NULL,
    FOREIGN KEY (cuestionario_id) REFERENCES cuestionarios(id) ON DELETE CASCADE
);


INSERT INTO quizzes (title, description) VALUES 
('Examen de PHP Básico', 'Pon a prueba tus conocimientos de los fundamentos de PHP'),
('Examen de Desarrollo Web', 'Un examen que abarca diversos temas de desarrollo web');

