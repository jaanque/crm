<?php
// Cargar la configuració i iniciar sessió
require_once 'config.php';
session_start();

// Obtenir controlador y métode
$controlador = isset($_GET['c']) ? $_GET['c'] : CONTROLADOR_PRINCIPAL;
$metodo       = isset($_GET['m']) ? $_GET['m'] : METODE_PRINCIPAL;

$archivo = 'controlador/' . $controlador . '_controlador.php';

// Comprobacions i inclusió
if (!file_exists($archivo)) {
    die("Error: el archivo del controlador '$archivo' no existe.");
}
require_once $archivo;

//  Inici de la instància i crida al mètode
$clase = ucwords($controlador) . 'Controlador';
if (!class_exists($clase)) {
    die("Error: la clase del controlador '$clase' no se encontró.");
}

// Crear instancia y trucar al metode
$instancia = new $clase();
if (!method_exists($instancia, $metodo)) {
    die("Error: el método '$metodo' no existe en '$clase'.");
}

$instancia->$metodo();
?>
