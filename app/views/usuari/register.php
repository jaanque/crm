<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre d'Usuari</title>
</head>
<body>
    <h2>Registre d'Usuari</h2>
    <form action="" method="post">
        <div>
            <label for="nombre_completo">Nom Complet:</label>
            <input type="text" name="nombre_completo" id="nombre_completo" required>
        </div>
        <div>
            <label for="email">Correu Electrònic:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">Contrasenya:</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <button type="submit">Registrar-se</button>
        </div>
    </form>
    <?php if (isset($data['error']) && !empty($data['error'])): ?>
        <p style="color: red;"><?php echo $data['error']; ?></p>
    <?php endif; ?>
</body>
</html>
