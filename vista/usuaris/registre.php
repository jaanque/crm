<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Crear un Compte</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f0f0f0; }
        .register-container { background: white; padding: 2em; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); width: 300px; }
        .form-group { margin-bottom: 1em; }
        label { display: block; margin-bottom: 0.5em; }
        input { width: 100%; padding: 0.5em; box-sizing: border-box; }
        button { width: 100%; padding: 0.7em; background-color: #28a745; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-top: 1em; }
        .login-link { text-align: center; margin-top: 1em; }
    </style>
</head>
<body>
    <div class="register-container">
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
            <button type="submit">Registrar-se</button>
            <?php if (isset($data['error'])): ?>
                <p class="error"><?php echo $data['error']; ?></p>
            <?php endif; ?>
        </form>
        <div class="login-link">
            <p>Ja tens un compte? <a href="index.php?c=usuaris&m=login">Inicia sessió aquí</a>.</p>
        </div>
    </div>
</body>
</html>
