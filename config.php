<?php
// Fitxer de Configuració

// Configuració de la Base de Dades
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'crm_mvc_db');

// Funció per a connectar a la BBDD
function conectar() {
    $connexio = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if ($connexio->connect_error) {
        die("Error de connexió: " . $connexio->connect_error);
    }
    return $connexio;
}

// Configuració de l'aplicació
define('CONTROLADOR_PRINCIPAL', 'usuaris');
define('METODE_PRINCIPAL', 'index');
?>
