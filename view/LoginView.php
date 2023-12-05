<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../model/css/style.css">

    <link rel="icon" href="../img/icono.png" type="image/png">
    <title>CURRITER</title>
</head>

<body>

    <div class="credenciales">
        <form class="formularios_credenciales" action="../model/LoginDAO.php" method="post">
            <p>Usuario</p>
            <input class="imp_espaciado" type="text" name="username">
            <p>Contraseña</p>
            <input class="imp_espaciado" type="password" name="password">
            <input class="botones" id="centrar_boton" type="submit" value="Entrar">
        </form>
        <p id="quest">You do not have an account?<a href="RegisterController.php" class="botones"><strong>Sign up</strong></a></p>
    </div>
</body>

</html>