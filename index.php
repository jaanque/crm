<?php
// Controlador Frontal (index.php)

// Carregar la configuració
require_once 'config.php';

// Iniciar la sessió
session_start();

// Lògica d'enrutament
$controlador_nom = isset($_GET['c']) ? $_GET['c'] : CONTROLADOR_PRINCIPAL;
$metode_nom = isset($_GET['m']) ? $_GET['m'] : METODE_PRINCIPAL;

// Formar el nom del fitxer del controlador
$fitxer_controlador = 'controlador/' . $controlador_nom . '_controlador.php';

// Comprovar si el fitxer del controlador existeix
if (file_exists($fitxer_controlador)) {
    // Carregar el controlador
    require_once $fitxer_controlador;

    // Formar el nom de la classe del controlador
    $classe_controlador = ucwords($controlador_nom) . 'Controlador';

    // Comprovar si la classe existeix
    if (class_exists($classe_controlador)) {
        // Instanciar el controlador
        $controlador = new $classe_controlador();

        // Comprovar si el mètode existeix
        if (method_exists($controlador, $metode_nom)) {
            // Cridar al mètode
            $controlador->$metode_nom();
        } else {
            die("Error: El mètode '$metode_nom' no existeix al controlador '$classe_controlador'.");
        }
    } else {
        die("Error: La classe del controlador '$classe_controlador' no s'ha trobat.");
    }
} else {
    die("Error: El fitxer del controlador '$fitxer_controlador' no existeix.");
}

?>
