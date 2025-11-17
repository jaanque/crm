<?php require 'vista/includes/header.php'; ?>

<h2>Gestió d'Oportunitats</h2>

<!-- Formulari de filtres -->
<form action="index.php" method="get">
    <input type="hidden" name="c" value="oportunitats">
    <input type="hidden" name="m" value="index">

    <label for="estat">Estat:</label>
    <select name="estat" id="estat">
        <option value="">-- Tots --</option>
        <option value="progres">Progrés</option>
        <option value="guanyada">Guanyada</option>
        <option value="perduda">Perduda</option>
    </select>

    <label for="id_client">Client:</label>
    <select name="id_client" id="id_client">
        <option value="">-- Tots --</option>
        <?php foreach($data['clients'] as $client): ?>
            <option value="<?php echo $client['id_client']; ?>">
                <?php echo htmlspecialchars($client['nom_complet']); ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Filtrar</button>
</form>
<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Títol</th>
            <th>Client</th>
            <th>Valor Estimat (€)</th>
            <th>Estat</th>
            <th>Responsable</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['oportunitats'])): ?>
            <?php foreach ($data['oportunitats'] as $oportunitat): ?>
                <tr>
                    <td><?php echo $oportunitat['id_oportunitat']; ?></td>
                    <td><?php echo htmlspecialchars($oportunitat['titol']); ?></td>
                    <td><?php echo htmlspecialchars($oportunitat['nom_client']); ?></td>
                    <td><?php echo $oportunitat['valor_estimat']; ?></td>
                    <td><?php echo htmlspecialchars($oportunitat['estat']); ?></td>
                    <td><?php echo htmlspecialchars($oportunitat['nom_responsable']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">No s'han trobat oportunitats.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require 'vista/includes/footer.php'; ?>
