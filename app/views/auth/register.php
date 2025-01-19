<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Mesas</title>
    <link rel="stylesheet" href="/restaurante_app/public/styles.css">
</head>

<body>
    <h1>Registrar Usuario</h1>
    <form method="POST" action="/restaurante_app/public/index.php?action=register">
    <input type="text" name="nombre" placeholder="Nombre completo" required>
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="password" placeholder="Contraseña" required>
    <button type="submit">Registrar</button>
</form>

    <a href="/restaurante_app/public/index.php?action=login">Ir al Login</a>

</body>
</html>
