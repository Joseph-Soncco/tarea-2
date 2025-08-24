CREATE DATABASE mangas_db;
USE mangas_db;

CREATE TABLE mangas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descripcion TEXT,
    genero VARCHAR(100),
    imagen VARCHAR(255),
    precio DECIMAL(10,2) NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

SELECT * FROM mangas;