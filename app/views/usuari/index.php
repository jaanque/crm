<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió d'Usuaris</title>
</head>
<body>
    <h1>Gestió d'Usuaris</h1>
    <a href="/usuari/create">Crear Nou Usuari</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Correu Electrònci</th>
                <th>Rol</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['usuaris'] as $usuari): ?>
                <tr>
                    <td><?php echo $usuari->id_usuari; ?></td>
                    <td><?php echo $usuari->nom_complet; ?></td>
                    <td><?php echo $usuari->email; ?></td>
                    <td><?php echo $usuari->rol; ?></td>
                    <td>
                        <a href="/usuari/edit/<?php echo $usuari->id_usuari; ?>">Editar</a>
                        <a href="/usuari/delete/<?php echo $usuari->id_usuari; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
