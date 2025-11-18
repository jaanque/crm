<?php require 'vista/includes/header.php'; ?>

<h2>Gestió d'Usuaris</h2>

<a href="index.php?c=usuaris&m=crear">Crear Nou Usuari</a>
<br><br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Rol</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['usuaris'])) {
            foreach ($data['usuaris'] as $usuari) { ?>
                <tr>
                    <td><?php echo $usuari['id_usuari']; ?></td>
                    <td><?php echo htmlspecialchars($usuari['nom_complet']); ?></td>
                    <td><?php echo htmlspecialchars($usuari['email']); ?></td>
                    <td><?php echo htmlspecialchars($usuari['rol']); ?></td>
                    <td>
                        <a href="index.php?c=usuaris&m=editar&id=<?php echo $usuari['id_usuari']; ?>">Editar</a> |
                        <a href="index.php?c=usuaris&m=eliminar&id=<?php echo $usuari['id_usuari']; ?>" onclick="return confirm('Estàs segur que vols eliminar aquest usuari?');">Eliminar</a>
                    </td>
                </tr>
            <?php }
        } else { ?>
            <tr>
                <td colspan="5">No s'han trobat usuaris.</td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php require 'vista/includes/footer.php'; ?>
