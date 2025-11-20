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

    /*
        🔹 Foreach (PHP) — què fa i com s'usa
        - Propòsit: recórrer tots els elements d'un array o d'un objecte iterable (implements Traversable)
            de manera senzilla, sense manipular índexs manualment.
        - Sintaxi bàsica:
            foreach ($array as $valor) {
                // codi per cada element
            }
            Quan usar-la:
            * Quan només necessites el valor i no la clau.
            * Quan fas lectures o càlculs simples sobre cada element.
            Per què:
            * Més clara i lleugera; evita gestionar índexs manualment.
            * Suficient per arrays numerats i per associatius si la clau no importa.

            Sintaxi amb clau:
            foreach ($array as $clau => $valor) {
                // codi per cada element i la seva clau
            }
            Quan usar-la:
            * Quan necessites la clau per a la lògica (p. ex. eliminar segons clau, construir altres estructures, o mostrar índex).
            * Quan l'ordenació o la relació clau→valor és rellevant.
            Per què:
            * Accés directe a clau i valor sense variables addicionals.
            * Ideal per arrays associatius i operacions dependents de la clau.

            Per referència (modificar els valors originals):
            foreach ($array as &$valor) {
                $valor = ...; // modifica l'element dins $array
            }
            unset($valor); // IMPORTANT: desfer la referència després del foreach
            Quan usar-la:
            * Quan vols modificar l'array "in-place" (transformacions, normalitzacions, etc.).
            * Quan vols evitar còpies temporals per raons de rendiment amb arrays grans.
            Per què:
            * Modifica directament els elements, més eficient per algunes operacions.
            * Perill: deixa una referència a l'últim element si no fas unset(); pot provocar efectes col·laterals si la mateixa variable s'utilitza després.
            * Evita usar referència si només llegeixes; preferible per a claredat i seguretat.
                
        - Notes i bones pràctiques:
            * Foreach funciona amb arrays i amb objectes iterables (Iterator, IteratorAggregate).
            * Quan s'usa per referència, cal fer unset() de la variable de bucle després per evitar efectes col·laterals
                amb el següent ús de la mateixa variable.
            * Foreach és preferible per arrays associatius o quan no necessites controlar explícitament l'índex.
            * Pots fer break/continue dins del foreach per controlar el flux.
            * Evita modificar l'estructura de l'array (afegir o eliminar clau) dins del foreach si la lògica depèn
                de la longitud/ordre originals; el comportament pot ser confús.
        - Exemples:
                // per cada valor
                foreach ($items as $v) { echo $v; }

                // per clau i valor
                foreach ($items as $k => $v) { echo "$k => $v\n"; }

                // modificar en lloc
                foreach ($items as &$v) { $v *= 2; }
                unset($v);

        🔹 For — ús i consideracions
        - Propòsit: repetir codi un nombre determinat de vegades amb control explícit d'un comptador/condició.
        - Sintaxi:
                for (inicialització; condició; increment) {
                        // codi a executar cada iteració
                }
            Exemple bàsic:
                for ($i = 0; $i < 10; $i++) { ... }
        - Ús típic:
            * Quan necessites un índex numèric (p. ex. recorregut invers, salts de 2 en 2, accés per posició).
            * Quan vols combinar diverses variables de control: for ($i = 0, $j = 10; $i < $j; $i++, $j--) { ... }
        - Rendiment i consells:
            * Evita cridar count($array) a cada iteració; millor emmagatzemar-lo: $n = count($array); for ($i=0;$i<$n;$i++) { ... }
            * Per arrays associatius és més net utilitzar foreach; for s'ajusta millor a arrays indexats per posició.
            * Tingues cura amb bucles infinits (condició mai falsa) i amb l'actualització de l'índex.
        - Exemples:
                // iterar sobre un array indexat
                $n = count($arr);
                for ($i = 0; $i < $n; $i++) {
                        echo $arr[$i];
                }

        🔹 Quan triar cada un
        - Usa foreach per llegibilitat i per treballar amb arrays/col·leccions on no necessites l'índex numèric.
        - Usa for quan necessitis control explícit de l'índex, recorregut invers, o passos personalitzats.
        - Si tens bucles aniuats o manipulacions complexes d'índexs, documenta clarament la intenció.

        🔹 Resum curt
        - Foreach = "per a cada element de la col·lecció, fes-ho" (més segur i clar per a col·leccions).
        - For = "comença, comprova condició, incrementa" (control explícit del comptador).


        🔹 Notes addicionals:
        - PHP no es un llenguatge tipable ja que no defineixes quin tipos de variables utilitzes.

    */
?>