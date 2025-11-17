<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Crear un Compte</title>
    <link rel="stylesheet" href="vista/css/estil.css">
</head>
<body style="text-align: center; padding-top: 50px;">

    <h2>Crear un Compte Nou</h2>

    <form action="index.php?c=usuaris&m=registre" method="post" style="width: 300px; margin: auto; text-align: left;">
        <p>
            <label for="nom_complet">Nom Complet:</label><br>
            <input type="text" name="nom_complet" id="nom_complet" required style="width: 100%;">
        </p>
        <p>
            <label for="email">Correu Electrònic:</label><br>
            <input type="email" name="email" id="email" required style="width: 100%;">
        </p>
        <p>
            <label for="password">Contrasenya:</label><br>
            <input type="password" name="password" id="password" required style="width: 100%;">
        </p>
        <button type="submit" style="width: 100%;">Registrar-se</button>
        <?php if (isset($data['error'])): ?>
            <p style="color: red;"><?php echo $data['error']; ?></p>
        <?php endif; ?>
    </form>

    <p>Ja tens un compte? <a href="index.php?c=usuaris&m=login">Inicia sessió aquí</a>.</p>

</body>
</html>
