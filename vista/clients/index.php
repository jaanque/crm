<?php require 'vista/includes/header.php'; ?>

<h2>Gestió de Clients</h2>

<!-- Formulari de cerca -->
<form action="index.php" method="get">
    <input type="hidden" name="c" value="clients">
    <input type="hidden" name="m" value="index">
    <input type="text" name="cerca" placeholder="Cercar per nom o empresa..." value="<?php echo isset($_GET['cerca']) ? htmlspecialchars($_GET['cerca']) : ''; ?>">
    <button type="submit">Cercar</button>
</form>
<br>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom Complet</th>
            <th>Email</th>
            <th>Telèfon</th>
            <th>Empresa</th>
            <th>Responsable</th>
            <th>Accions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($data['clients'])): ?>
            <?php foreach ($data['clients'] as $client): ?>
                <tr>
                    <td><?php echo $client['id_client']; ?></td>
                    <td><?php echo htmlspecialchars($client['nom_complet']); ?></td>
                    <td><?php echo htmlspecialchars($client['email']); ?></td>
                    <td><?php echo htmlspecialchars($client['telefon']); ?></td>
                    <td><?php echo htmlspecialchars($client['empresa']); ?></td>
                    <td><?php echo htmlspecialchars($client['nom_responsable']); ?></td>
                    <td>
                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador'): ?>
                            <a href="index.php?c=clients&m=editar&id=<?php echo $client['id_client']; ?>">Editar</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7">No s'han trobat clients.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?php require 'vista/includes/footer.php'; ?>
