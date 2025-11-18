<?php require 'vista/includes/header.php'; ?>

<h2>Crear Nova Tasca</h2>

<form action="index.php?c=tasques&m=guardar" method="post">
    <p>
        <label for="id_oportunitat">Oportunitat:</label><br>
        <select name="id_oportunitat" id="id_oportunitat" required style="width: 100%;">
            <?php foreach ($data['oportunitats'] as $oportunitat): ?>
                <option value="<?php echo $oportunitat['id_oportunitat']; ?>"><?php echo htmlspecialchars($oportunitat['titol']); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <p>
        <label for="descripcio">Descripció:</label><br>
        <textarea name="descripcio" id="descripcio" required style="width: 100%;"></textarea>
    </p>
    <p>
        <label for="data_tasca">Data:</label><br>
        <input type="date" name="data_tasca" id="data_tasca" required style="width: 100%;">
    </p>
    <button type="submit" style="width: 100%;">Guardar</button>
</form>

<?php require 'vista/includes/footer.php'; ?>
