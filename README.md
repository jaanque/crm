# Prototip de CRM amb Arquitectura MVC Clàssica

Aquest és un prototip funcional d'una aplicació CRM desenvolupada en PHP, seguint un patró d'arquitectura Model-Vista-Controlador (MVC) clàssic i fàcil d'entendre, ideal per a estudiants.

## Arquitectura

El projecte segueix l'estructura MVC sol·licitada:

*   **`index.php` (Controlador Frontal):** És l'únic punt d'entrada a l'aplicació. S'encarrega de rebre totes les peticions i de carregar el controlador i el mètode adequats.
*   **`config.php`:** Conté la configuració de la base de dades i altres paràmetres de l'aplicació.
*   **`controlador/`:** Aquesta carpeta conté les classes dels controladors (ex: `usuaris_controlador.php`). La seva funció és rebre les dades de l'usuari, interactuar amb el model i carregar la vista corresponent.
*   **`modelo/`:** Aquesta carpeta conté les classes dels models (ex: `usuaris_modelo.php`). S'encarreguen de tota la interacció amb la base de dades (consultes, insercions, etc.).
*   **`vista/`:** Aquesta carpeta conté els fitxers de la interfície d'usuari.
    *   `css/estil.css`: Un fitxer CSS amb estils mínims, gairebé sense disseny.
    *   `includes/`: Parts comunes de la interfície com la capçalera i el peu de pàgina.

## Funcionalitats Implementades

*   **Gestió d'usuaris:** Sistema d'inici de sessió i registre de nous usuaris.
*   **Panell Principal:** Vista de resum per a l'administrador.
*   **Gestió de Clients:** Llistat i cerca de clients.
*   **Gestió d'Oportunitats:** Llistat i filtratge.
*   **Gestió de Tasques:** Llistat de tasques pendents i opció per a completar-les.
*   **Gestió d'Usuaris:** Llistat d'usuaris per a l'administrador.

## Instruccions d'Instal·lació

1.  **Base de Dades:**
    *   Assegura't de tenir un servidor de base de dades MySQL (com XAMPP, WAMP, etc.).
    *   Importa el fitxer `crm_mvc.sql` per a crear la base de dades (`crm_mvc_db`) i les taules. Aquest script també crea un usuari administrador per defecte (`admin@crm.com` / `admin`).
    *   Ajusta, si cal, les credencials de la base de dades al fitxer `config.php`.

2.  **Servidor Web:**
    *   Copia tots els fitxers del projecte a la carpeta arrel del teu servidor web (p. ex., `htdocs`).

3.  **Accés:**
    *   Obre el navegador i ves a `http://localhost/` o `http://localhost/index.php`. Seràs redirigit a la pàgina de login.

Espero que aquest projecte sigui una excel·lent eina d'aprenentatge!
