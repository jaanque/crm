<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panell d'Administrador</title>
</head>
<body>
    <h1>Panell d'Administrador</h1>

    <h2>Resum del Sistema</h2>

    <div>
        <h3>Total de Clients Registrats</h3>
        <p><?php echo $data['total_clients']; ?></p>
    </div>

    <div>
        <h3>Oportunitats per Estat</h3>
        <ul>
            <?php foreach ($data['oportunitats_per_estat'] as $estat): ?>
                <li><strong><?php echo ucfirst($estat->estat); ?>:</strong> <?php echo $estat->total; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div>
        <h3>Total de Tasques Pendents</h3>
        <p><?php echo $data['tasques_pendents']; ?></p>
    </div>

    <hr>

    <h2>Accessos Directes</h2>
    <ul>
        <li><a href="/usuari">Gestionar Usuaris</a></li>
        <li><a href="/client">Gestionar Clients</a></li>
        <li><a href="/oportunitat">Gestionar Oportunitats</a></li>
        <li><a href="/tasca">Gestionar Tasques</a></li>
    </ul>
</body>
</html>
