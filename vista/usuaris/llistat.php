<?php require 'vista/includes/header.php'; ?>

<h2>Gestió d'Usuaris</h2>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['usuaris'])): ?>
            <?php foreach ($data['usuaris'] as $usuari): ?>
                <tr>
                    <td><?php echo $usuari['id_usuari']; ?></td>
                    <td><?php echo htmlspecialchars($usuari['nom_complet']); ?></td>
                    <td><?php echo htmlspecialchars($usuari['email']); ?></td>
                    <td><?php echo htmlspecialchars($usuari['rol']); ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No s'han trobat usuaris.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require 'vista/includes/footer.php'; ?>
