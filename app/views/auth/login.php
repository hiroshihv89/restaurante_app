<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Mesas</title>
    <link rel="stylesheet" href="/restaurante_app/public/styles.css">
</head>

<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST" action="/restaurante_app/public/index.php?action=login">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        
        <button type="submit">Iniciar sesión</button>
    </form>

    <a href="/restaurante_app/public/index.php?action=register">Registrarse</a>

</body>
</html>
