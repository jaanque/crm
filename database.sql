-- Base de datos para el CRM

-- Tabla de usuarios
CREATE TABLE usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    rol ENUM('administrador', 'vendedor') NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla de clientes
CREATE TABLE clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre_completo VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    tlf VARCHAR(20),
    empresa VARCHAR(100),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuario_responsable INT,
    FOREIGN KEY (usuario_responsable) REFERENCES usuarios(id_usuario)
);

-- Tabla de oportunidades
CREATE TABLE oportunidades (
    id_oportunidad INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    titulo VARCHAR(100) NOT NULL,
    descripcion TEXT,
    valor_estimado DECIMAL(10, 2),
    estado ENUM('progreso', 'ganada', 'perdida') NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuario_responsable INT,
    FOREIGN KEY (id_cliente) REFERENCES clientes(id_cliente),
    FOREIGN KEY (usuario_responsable) REFERENCES usuarios(id_usuario)
);

-- Tabla de tareas
CREATE TABLE tareas (
    id_tarea INT AUTO_INCREMENT PRIMARY KEY,
    id_oportunidad INT,
    descripcion TEXT NOT NULL,
    fecha DATE,
    estado ENUM('pendiente', 'completada') NOT NULL,
    FOREIGN KEY (id_oportunidad) REFERENCES oportunidades(id_oportunidad)
);
