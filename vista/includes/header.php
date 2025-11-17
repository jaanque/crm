<?php
// vista/includes/header.php
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>CRM - MVC</title>
    <style>
        body { font-family: sans-serif; margin: 0; }
        .navbar { background: #333; overflow: hidden; }
        .navbar a { float: left; display: block; color: white; text-align: center; padding: 14px 20px; text-decoration: none; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .container { padding: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<div class="navbar">
    <a href="index.php?c=panell&m=index">Inici</a>
    <a href="index.php?c=clients&m=index">Clients</a>
    <a href="index.php?c=oportunitats&m=index">Oportunitats</a>
    <a href="index.php?c=tasques&m=index">Tasques</a>
    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'administrador'): ?>
        <a href="index.php?c=usuaris&m=llistat">Usuaris</a>
    <?php endif; ?>
    <a href="index.php?c=usuaris&m=logout" style="float: right;">Tancar Sessió</a>
</div>

<div class="container">
