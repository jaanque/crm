-- Base de dades per al CRM (Versió en Català)

-- Taula d'usuaris
CREATE TABLE usuaris (
    id_usuari INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasenya VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'venedor') NOT NULL,
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Taula de clients
CREATE TABLE clients (
    id_client INT AUTO_INCREMENT PRIMARY KEY,
    nom_complet VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    telefon VARCHAR(20),
    empresa VARCHAR(100),
    data_registre TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuari_responsable INT,
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
    data_creacio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
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
