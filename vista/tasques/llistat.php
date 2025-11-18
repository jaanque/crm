<?php require 'vista/includes/header.php'; ?>

<h2>Llistat de Totes les Tasques</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Oportunitat</th>
            <th>Descripció</th>
            <th>Data</th>
            <th>Estat</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['tasques'])): ?>
            <?php foreach ($data['tasques'] as $tasca): ?>
                <tr>
                    <td><?php echo $tasca['id_tasca']; ?></td>
                    <td><?php echo htmlspecialchars($tasca['titol_oportunitat']); ?></td>
                    <td><?php echo htmlspecialchars($tasca['descripcio']); ?></td>
                    <td><?php echo htmlspecialchars($tasca['data']); ?></td>
                    <td><?php echo htmlspecialchars($tasca['estat']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No s'han trobat tasques.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<br>
<a href="index.php?c=tasques&m=index">Tornar a les meves tasques pendents</a>

<?php require 'vista/includes/footer.php'; ?>
