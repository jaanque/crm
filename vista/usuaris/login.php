<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sessió</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f0f0; }
        .login-container { background: white; padding: 2em; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 1em; }
        label { display: block; margin-bottom: 0.5em; }
        input { width: 100%; padding: 0.5em; }
        button { width: 100%; padding: 0.7em; background-color: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-top: 1em; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sessió al CRM</h2>
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
                <p class="error"><?php echo $data['error']; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
