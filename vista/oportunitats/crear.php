<?php require 'vista/includes/header.php'; ?>

<h2>Crear Nova Oportunitat</h2>

<form action="index.php?c=oportunitats&m=guardar" method="post">
    <p>
        <label for="id_client">Client:</label><br>
        <select name="id_client" id="id_client" required style="width: 100%;">
            <?php foreach ($data['clients'] as $client): ?>
                <option value="<?php echo $client['id_client']; ?>"><?php echo htmlspecialchars($client['nom_complet']); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="titol">Títol:</label><br>
        <input type="text" name="titol" id="titol" required style="width: 100%;">
    </p>
    <p>
        <label for="descripcio">Descripció:</label><br>
        <textarea name="descripcio" id="descripcio" style="width: 100%;"></textarea>
    </p>
    <p>
        <label for="valor_estimat">Valor Estimat:</label><br>
        <input type="number" step="0.01" name="valor_estimat" id="valor_estimat" style="width: 100%;">
    </p>
    <p>
        <label for="estat">Estat:</label><br>
        <select name="estat" id="estat" required style="width: 100%;">
            <option value="progres">Progrés</option>
            <option value="guanyada">Guanyada</option>
            <option value="perduda">Perduda</option>
        </select>
    </p>
    <button type="submit" style="width: 100%;">Guardar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
