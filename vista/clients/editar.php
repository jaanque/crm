<?php require 'vista/includes/header.php'; ?>

<h2>Editar Client</h2>

<form action="index.php?c=clients&m=actualitzar&id=<?php echo $data['client']['id_client']; ?>" method="post">
    <p>
        <label for="nom_complet">Nom Complet:</label><br>
        <input type="text" name="nom_complet" id="nom_complet" value="<?php echo htmlspecialchars($data['client']['nom_complet']); ?>" required style="width: 100%;">
    </p>
    <p>
        <label for="email">Correu Electrònic:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($data['client']['email']); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="telefon">Telèfon:</label><br>
        <input type="text" name="telefon" id="telefon" value="<?php echo htmlspecialchars($data['client']['telefon']); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="empresa">Empresa:</label><br>
        <input type="text" name="empresa" id="empresa" value="<?php echo htmlspecialchars($data['client']['empresa']); ?>" style="width: 100%;">
    </p>
    <button type="submit" style="width: 100%;">Actualitzar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
