<?php require 'vista/includes/header.php'; ?>

<h2>Les Meves Tasques Pendents</h2>

<a href="index.php?c=tasques&m=crear">Crear Nova Tasca</a> |
<a href="index.php?c=tasques&m=llistat">Veure Totes les Tasques</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>Descripció</th>
            <th>Oportunitat Associada</th>
            <th>Data Límit</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['tasques'])): ?>
            <?php foreach ($data['tasques'] as $tasca): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tasca['descripcio']); ?></td>
                    <td><?php echo htmlspecialchars($tasca['titol_oportunitat']); ?></td>
                    <td><?php echo $tasca['data']; ?></td>
                    <td>
                        <a href="index.php?c=tasques&m=completar&id=<?php echo $tasca['id_tasca']; ?>">Marcar com a Completada</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No tens tasques pendents. Bona feina!</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

