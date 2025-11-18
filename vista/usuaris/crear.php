<?php require 'vista/includes/header.php'; ?>

<h2>Crear Nou Usuari</h2>

<form action="index.php?c=usuaris&m=guardar" method="post">
    <p>
        <label for="nom_complet">Nom Complet:</label><br>
        <input type="text" name="nom_complet" id="nom_complet" required style="width: 100%;">
    </p>
    <p>
        <label for="email">Correu Electrònic:</label><br>
        <input type="email" name="email" id="email" required style="width: 100%;">
    </p>
    <p>
        <label for="password">Contrasenya:</label><br>
        <input type="password" name="password" id="password" required style="width: 100%;">
    </p>
    <p>
        <label for="rol">Rol:</label><br>
        <select name="rol" id="rol" required style="width: 100%;">
            <option value="venedor">Venedor</option>
            <option value="administrador">Administrador</option>
        </select>
    </p>
    <button type="submit" style="width: 100%;">Guardar</button>
</form>

