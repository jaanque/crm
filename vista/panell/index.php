<?php require 'vista/includes/header.php'; ?>

<h2>Panell Principal</h2>

<?php if ($_SESSION['rol'] == 'administrador'): ?>
    <h3>Resum del Sistema</h3>
    <p><strong>Total de Clients:</strong> <?php echo $data['total_clients']; ?></p>

    <h4>Oportunitats per Estat:</h4>
    <ul>
        <?php foreach ($data['oportunitats_per_estat'] as $estat): ?>
            <li><?php echo ucfirst($estat['estat']); ?>: <strong><?php echo $estat['total']; ?></strong></li>
        <?php endforeach; ?>
    </ul>

    <p><strong>Total de Tasques Pendents:</strong> <?php echo $data['total_tasques_pendents']; ?></p>

<?php else: ?>
    <p>Benvingut/da al CRM, <?php echo $_SESSION['nom_complet']; ?>!</p>
    <p>Fes servir el menú de navegació per a gestionar la teva feina.</p>
<?php endif; ?>

<?php require 'vista/includes/footer.php'; ?>
