<?php require 'vista/includes/header.php'; ?>

<h2>Crear Nou Client</h2>

<form action="index.php?c=clients&m=guardar" method="post">
    <p>
        <label for="nom_complet">Nom Complet:</label><br>
        <input type="text" name="nom_complet" id="nom_complet" required style="width: 100%;">
    </p>
    <p>
        <label for="email">Correu Electrònic:</label><br>
        <input type="email" name="email" id="email" style="width: 100%;">
    </p>
    <p>
        <label for="telefon">Telèfon:</label><br>
        <input type="text" name="telefon" id="telefon" style="width: 100%;">
    </p>
    <p>
        <label for="empresa">Empresa:</label><br>
        <input type="text" name="empresa" id="empresa" style="width: 100%;">
    </p>
    <button type="submit" style="width: 100%;">Guardar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
