<?php
// vista/includes/header.php
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>CRM - MVC</title>
    <link rel="stylesheet" href="vista/css/estil.css">
</head>
<body>

<nav>
    <a href="index.php?c=panell&m=index">Inici</a> |
    <a href="index.php?c=clients&m=index">Clients</a> |
    <a href="index.php?c=oportunitats&m=index">Oportunitats</a> |
    <a href="index.php?c=tasques&m=index">Tasques</a> |
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador'): ?>
        <a href="index.php?c=usuaris&m=llistat">Usuaris</a> |
    <?php endif; ?>
    <a href="index.php?c=usuaris&m=logout">Tancar Sessió</a>
</nav>
<hr>
