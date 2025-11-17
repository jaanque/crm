# Prototip de CRM Funcional (Versió en Català)

Aquest és un prototip d'una aplicació de CRM (Customer Relationship Management) desenvolupada en PHP, seguint el patró d'arquitectura Model-Vista-Controlador (MVC).

## Funcionalitats Implementades

*   **Gestió d'usuaris i rols:** Registre, inici de sessió i tancament de sessió. CRUD d'usuaris per a administradors.
*   **Mòdul de clients:** Llistat i cerca de clients.
*   **Mòdul d'oportunitats:** Llistat i filtratge d'oportunitats per estat i client.
*   **Mòdul de tasques:** Llistat de tasques i l'opció de marcar-les com a completades.
*   **Panell d'administrador:** Una vista de resum amb les mètriques clau del sistema.

## Instruccions d'Instal·lació

1.  **Base de Dades:**
    *   Assegura't de tenir un servidor de base de dades MySQL en funcionament (per exemple, XAMPP, WAMP, MAMP).
    *   Importa el fitxer `database_catala.sql` al teu gestor de base de dades per crear les taules necessàries.
    *   Configura les dades d'accés a la base de dades al fitxer `config/database.php`.

2.  **Servidor Web:**
    *   Copia tots els fitxers del projecte a la carpeta arrel del teu servidor web (per exemple, `htdocs` a XAMPP).
    *   Assegura't que el mòdul `mod_rewrite` d'Apache estigui activat perquè l'enrutament funcioni correctament.

3.  **Accés a l'Aplicació:**
    *   Obre el teu navegador i accedeix a la URL del teu servidor local (ex: `http://localhost/`). L'aplicació s'hauria de carregar.

## Estructura de Fitxers (MVC)

*   `app/`: Conté el nucli de l'aplicació.
    *   `controllers/`: Gestionen la lògica de les peticions.
    *   `models/`: S'encarreguen de la interacció amb la base de dades.
    *   `views/`: Contenen el codi HTML i la presentació.
*   `config/`: Fitxers de configuració, com la connexió a la base de dades.
*   `public/`: El punt d'entrada de l'aplicació (`index.php`) i els fitxers públics (CSS, JS, imatges).
*   `.htaccess`: Redirigeix totes les peticions a `public/index.php`.
*   `database_catala.sql`: Script per a la creació de la base de dades en català.

Aquest prototip és una base sòlida sobre la qual els alumnes poden continuar construint i aprenent. Espero que sigui de gran ajuda!
