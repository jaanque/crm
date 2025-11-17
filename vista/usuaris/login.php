<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sessió</title>
    <link rel="stylesheet" href="vista/css/estil.css">
</head>
<body style="text-align: center; padding-top: 50px;">

    <h2>Iniciar Sessió al CRM</h2>

    <?php if (isset($_GET['registre']) && $_GET['registre'] == 'exit'): ?>
        <p style="color: green;">T'has registrat correctament! Si us plau, inicia sessió.</p>
    <?php endif; ?>

    <form action="index.php?c=usuaris&m=login" method="post" style="width: 300px; margin: auto; text-align: left;">
        <p>
            <label for="email">Correu Electrònic:</label><br>
            <input type="email" name="email" id="email" required style="width: 100%;">
        </p>
        <p>
            <label for="password">Contrasenya:</label><br>
            <input type="password" name="password" id="password" required style="width: 100%;">
        </p>
        <button type="submit" style="width: 100%;">Entrar</button>
        <?php if (isset($data['error'])): ?>
            <p style="color: red;"><?php echo $data['error']; ?></p>
        <?php endif; ?>
    </form>

    <p>No tens un compte? <a href="index.php?c=usuaris&m=registre">Registra't aquí</a>.</p>

</body>
</html>
