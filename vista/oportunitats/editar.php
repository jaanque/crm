<?php require 'vista/includes/header.php'; ?>

<h2>Editar Oportunitat</h2>

<form action="index.php?c=oportunitats&m=actualitzar&id=<?php echo $data['oportunitat']['id_oportunitat']; ?>" method="post">
    <p>
        <label for="id_client">Client:</label><br>
        <select name="id_client" id="id_client" required style="width: 100%;">
            <?php foreach ($data['clients'] as $client): ?>
                <option value="<?php echo $client['id_client']; ?>" <?php echo ($client['id_client'] == $data['oportunitat']['id_client']) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($client['nom_complet']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="titol">Títol:</label><br>
        <input type="text" name="titol" id="titol" value="<?php echo htmlspecialchars($data['oportunitat']['titol']); ?>" required style="width: 100%;">
    </p>
    <p>
        <label for="descripcio">Descripció:</label><br>
        <textarea name="descripcio" id="descripcio" style="width: 100%;"><?php echo htmlspecialchars($data['oportunitat']['descripcio']); ?></textarea>
    </p>
    <p>
        <label for="valor_estimat">Valor Estimat:</label><br>
        <input type="number" step="0.01" name="valor_estimat" id="valor_estimat" value="<?php echo htmlspecialchars($data['oportunitat']['valor_estimat']); ?>" style="width: 100%;">
    </p>
    <p>
        <label for="estat">Estat:</label><br>
        <select name="estat" id="estat" required style="width: 100%;" <?php echo ($_SESSION['rol'] != 'administrador') ? 'disabled' : ''; ?>>
            <option value="progres" <?php echo ($data['oportunitat']['estat'] == 'progres') ? 'selected' : ''; ?>>Progrés</option>
            <option value="guanyada" <?php echo ($data['oportunitat']['estat'] == 'guanyada') ? 'selected' : ''; ?>>Guanyada</option>
            <option value="perduda" <?php echo ($data['oportunitat']['estat'] == 'perduda') ? 'selected' : ''; ?>>Perduda</option>
        </select>
    </p>
    <button type="submit" style="width: 100%;">Actualitzar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
