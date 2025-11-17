<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Crear un Compte</title>
    <link rel="stylesheet" href="vista/css/estil.css">
</head>
<body>
    <div class="auth-container">
        <h2>Crear un Compte Nou</h2>
        <form action="index.php?c=usuaris&m=registre" method="post">
            <div class="form-group">
                <label for="nom_complet">Nom Complet:</label>
                <input type="text" name="nom_complet" id="nom_complet" required>
            </div>
            <div class="form-group">
                <label for="email">Correu Electrònic:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit" style="background-color: #28a745;">Registrar-se</button>
            <?php if (isset($data['error'])): ?>
                <p style="color: red; margin-top: 1em; text-align: center;"><?php echo $data['error']; ?></p>
            <?php endif; ?>
        </form>
        <div class="auth-link">
            <p>Ja tens un compte? <a href="index.php?c=usuaris&m=login">Inicia sessió aquí</a>.</p>
        </div>
    </div>
</body>
</html>
