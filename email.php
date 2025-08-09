<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Correo</title>
</head>
<body>
    <form action="email_envio.php" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>