<?php require 'vista/includes/header.php'; ?>

<h2>Editar Usuari</h2>

<form action="index.php?c=usuaris&m=actualitzar&id=<?php echo $data['usuari']['id_usuari']; ?>" method="post">
    <p>
        <label for="nom_complet">Nom Complet:</label><br>
        <input type="text" name="nom_complet" id="nom_complet" value="<?php echo htmlspecialchars($data['usuari']['nom_complet']); ?>" required style="width: 100%;">
    </p>
    <p>
        <label for="email">Correu Electrònic:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['usuari']['email']); ?>" required style="width: 100%;">
    </p>
    <p>
        <label for="rol">Rol:</label><br>
        <select name="rol" id="rol" required style="width: 100%;">
            <option value="venedor" <?php if ($data['usuari']['rol'] == 'venedor') { echo 'selected'; } ?>>Venedor</option>
            <option value="administrador" <?php if ($data['usuari']['rol'] == 'administrador') { echo 'selected'; } ?>>Administrador</option>
        </select>
    </p>
    <button type="submit" style="width: 100%;">Actualitzar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
