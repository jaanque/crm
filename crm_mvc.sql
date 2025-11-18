-- Base de dades per al CRM (Versió MVC)
CREATE DATABASE IF NOT EXISTS crm_db;
USE crm_mvc_db;

-- Taula d'usuaris
CREATE TABLE usuaris (
    id_usuari INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasenya VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'venedor') NOT NULL
);

-- Taula de clients
CREATE TABLE clients (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefon VARCHAR(20),
    empresa VARCHAR(100),
    usuari_responsable INT,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuari_responsable) REFERENCES usuaris(id_usuari)
);

-- Taula d'oportunitats
CREATE TABLE oportunitats (
    id_oportunitat INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    titol VARCHAR(100) NOT NULL,
    descripcio TEXT,
    valor_estimat DECIMAL(10, 2),
    estat ENUM('progres', 'guanyada', 'perduda') NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuari_responsable INT,
    FOREIGN KEY (id_client) REFERENCES clients(id_client),
    FOREIGN KEY (usuari_responsable) REFERENCES usuaris(id_usuari)
);

-- Taula de tasques
CREATE TABLE tasques (
    id_tasca INT AUTO_INCREMENT PRIMARY KEY,
    id_oportunitat INT,
    descripcio TEXT NOT NULL,
    data DATE,
    estat ENUM('pendent', 'completada') NOT NULL,
    FOREIGN KEY (id_oportunitat) REFERENCES oportunitats(id_oportunitat)
);

-- Inserir un usuari administrador per defecte
INSERT INTO usuaris (nom_complet, email, contrasenya, rol) VALUES ('Admin', 'admin@crm.com', 'admin', 'administrador');
