<?php require 'vista/includes/header.php'; ?>

<h2>Detalls de l'Oportunitat</h2>

<div>
    <h3><?php echo htmlspecialchars($data['oportunitat']['titol']); ?></h3>
    <p><strong>Client:</strong> <?php echo htmlspecialchars($data['oportunitat']['nom_client']); ?></p>
    <p><strong>Descripció:</strong> <?php echo nl2br(htmlspecialchars($data['oportunitat']['descripcio'])); ?></p>
    <p><strong>Valor Estimat:</strong> <?php echo htmlspecialchars($data['oportunitat']['valor_estimat']); ?> &euro;</p>
    <p><strong>Estat:</strong> <?php echo htmlspecialchars($data['oportunitat']['estat']); ?></p>
    <p><strong>Responsable:</strong> <?php echo htmlspecialchars($data['oportunitat']['nom_responsable']); ?></p>
</div>
<br>
<a href="index.php?c=oportunitats&m=index">Tornar a la llista</a>

