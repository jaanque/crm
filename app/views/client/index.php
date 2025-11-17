<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió de Clients</title>
</head>
<body>
    <h1>Gestió de Clients</h1>
    <a href="/client/create">Afegir Nou Client</a>

    <!-- Formulari de cerca -->
    <form action="/client/search" method="get">
        <input type="text" name="terme" placeholder="Cercar per nom o empresa...">
        <button type="submit">Cercar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom Complet</th>
                <th>Correu Electrònic</th>
                <th>Telèfon</th>
                <th>Empresa</th>
                <th>Responsable</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['clients'] as $client): ?>
                <tr>
                    <td><?php echo $client->id_client; ?></td>
                    <td><?php echo $client->nom_complet; ?></td>
                    <td><?php echo $client->email; ?></td>
                    <td><?php echo $client->telefon; ?></td>
                    <td><?php echo $client->empresa; ?></td>
                    <td><?php echo $client->usuari_responsable; ?></td>
                    <td>
                        <a href="/client/edit/<?php echo $client->id_client; ?>">Editar</a>
                        <a href="/client/delete/<?php echo $client->id_client; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
