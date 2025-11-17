<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió de Tasques</title>
</head>
<body>
    <h1>Gestió de Tasques</h1>
    <a href="/tasca/create">Afegir Nova Tasca</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripció</th>
                <th>Oportunitat</th>
                <th>Data</th>
                <th>Estat</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['tasques'] as $tasca): ?>
                <tr>
                    <td><?php echo $tasca->id_tasca; ?></td>
                    <td><?php echo $tasca->descripcio; ?></td>
                    <td><?php echo $tasca->id_oportunitat; ?></td>
                    <td><?php echo $tasca->data; ?></td>
                    <td><?php echo $tasca->estat; ?></td>
                    <td>
                        <?php if ($tasca->estat == 'pendent'): ?>
                            <a href="/tasca/complete/<?php echo $tasca->id_tasca; ?>">Marcar com a Completada</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
