<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sessió</title>
    <link rel="stylesheet" href="vista/css/estil.css">
</head>
<body>
    <div class="auth-container">
        <h2>Iniciar Sessió al CRM</h2>

        <?php if (isset($_GET['registre']) && $_GET['registre'] == 'exit'): ?>
            <p style="color: green; text-align: center;">T'has registrat correctament! Si us plau, inicia sessió.</p>
        <?php endif; ?>

        <form action="index.php?c=usuaris&m=login" method="post">
            <div class="form-group">
                <label for="email">Correu Electrònic:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Entrar</button>
            <?php if (isset($data['error'])): ?>
                <p style="color: red; margin-top: 1em; text-align: center;"><?php echo $data['error']; ?></p>
            <?php endif; ?>
        </form>

        <div class="auth-link">
            <p>No tens un compte? <a href="index.php?c=usuaris&m=registre">Registra't aquí</a>.</p>
        </div>
    </div>
</body>
</html>
