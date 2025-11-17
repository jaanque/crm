<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestió d'Oportunitats</title>
</head>
<body>
    <h1>Gestió d'Oportunitats</h1>
    <a href="/oportunitat/create">Afegir Nova Oportunitat</a>

    <!-- Filtres -->
    <form action="/oportunitat/filter" method="get">
        <select name="estat">
            <option value="">Tots els estats</option>
            <option value="progres">Progrés</option>
            <option value="guanyada">Guanyada</option>
            <option value="perduda">Perduda</option>
        </select>
        <input type="text" name="client" placeholder="Filtrar per client...">
        <button type="submit">Filtrar</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Títol</th>
                <th>Client</th>
                <th>Valor Estimat</th>
                <th>Estat</th>
                <th>Responsable</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['oportunitats'] as $oportunitat): ?>
                <tr>
                    <td><?php echo $oportunitat->id_oportunitat; ?></td>
                    <td><?php echo $oportunitat->titol; ?></td>
                    <td><?php echo $oportunitat->id_client; ?></td>
                    <td><?php echo $oportunitat->valor_estimat; ?></td>
                    <td><?php echo $oportunitat->estat; ?></td>
                    <td><?php echo $oportunitat->usuari_responsable; ?></td>
                    <td>
                        <a href="/oportunitat/edit/<?php echo $oportunitat->id_oportunitat; ?>">Editar</a>
                        <a href="/oportunitat/delete/<?php echo $oportunitat->id_oportunitat; ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
